<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PayRequest;
use App\Mail\SendSourceImages;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Services\Payment\PaymentService;
use App\Services\Payment\Requests\IDPayRequest;
use App\Services\Payment\Requests\IDPayVerifyRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function pay(PayRequest $request)
    {
        $validatedData=$request->validated();
        
        $user=User::firstOrCreate([
            
            'email'=>$validatedData['email'],

        ],[
            'name'=>$validatedData['name'],
            'mobile'=>$validatedData['mobile'],
        ]);
        try{
            $orderItems=json_decode(Cookie::get('basket'),true);

            $products=Product::findMany(array_keys($orderItems));

            $totalPrice=$products->sum('price');

            $ref_code=Str::random(30);
            
            $order=Order::create([
                'user_id'=>$user->id,
                'amount'=>$totalPrice,
                'ref_code'=>$ref_code,
                'status'=>'unpaid',
            ]);

            $createdItemsForOrder=$products->map(function($product){
                $currentProudct=$product->only('price','id');
                $currentProudct['product_id']=$currentProudct['id'];
                unset($currentProudct['id']);
                return $currentProudct;
            });

            $order->orderItems()->createMany($createdItemsForOrder->toArray());

            $refId=rand(1111,9999);

            $createdPayment=Payment::create([
                'order_id'=>$order->id,
                'gateway'=>'IDPay',
                'ref_code'=>$ref_code,
                'status'=>'unpaid'
            ]);

            $request=new IDPayRequest([
                                        'user'=>$user,
                                    'amount'=>$totalPrice,
                                    'orderId'=>$ref_code,
                                'apiKey'=>config('services.gatewayes.id_pay.api_key')]);

            $service=new PaymentService(PaymentService::IDPAY,$request);

            return $service->pay();
            
        }catch(Exception $e)
        {
            return back()->with('failed',$e->getMessage());    
        }

        
    }
    public function callback(Request $request)
    {
        $verifyRequest=new IDPayVerifyRequest(['id'=>$request->id,'orderId'=>$request->order_id,'apiKey'=>config('services.gatewayes.id_pay.api_key')]);
        $service=new PaymentService(PaymentService::IDPAY,$verifyRequest);
        $result=$service->verify();
        if(!$result['status'])
        {
            return redirect()->route('home.basket.items')->with('failed',$result['msg']);
        }
        if($result['status_code']=='101')
        {
            return redirect()->route('home.basket.items')->with('success','پرداخت شما قبلا انجام شده است');

        }


        $currentPayment=Payment::where('ref_code',$result['data']['order_id'])->first();
        $currentPayment->update([
            'status'=>'paid',
            'res_id'=>$result['data']['track_id'],
        ]);
        $currentPayment->order()->update(['status'=>'paid']);
        $currentUser=$currentPayment->order->user;
        $resourceImages=$currentPayment->order->orderItems->map(function($orderItem){
            return $orderItem->product->source_url;
        });
        set_time_limit(0);
        ini_set('max_execution_time', '0');
    
        Mail::to($currentUser->email)->send(new SendSourceImages($currentUser,$resourceImages->toArray()));
        Cookie::queue('basket',null);
  
        return redirect()->route('home.products.all')->with('success','پرداخت شما با موفقیت انجام شده و تصاویر برای شما ایمیل شدند');

        

    }


    
}
