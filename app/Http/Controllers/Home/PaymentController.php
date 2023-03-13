<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PayRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Services\Payment\PaymentService;
use App\Services\Payment\Requests\IDPayRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function pay(PayRequest $request)
    {
        $validatedData=$request->validated();
        
        $user=User::firstOrCreate([
            'mobile'=>$validatedData['mobile'],
            'email'=>$validatedData['email'],

        ],[
            'name'=>$validatedData['name'],
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
                'res_id'=>$refId,
                'ref_id'=>$refId,
                'status'=>'unpaid'
            ]);

            $request=new IDPayRequest([
                                        'user'=>$user,
                                    'amount'=>$totalPrice,
                                    'orderId'=>$ref_code,
                                'apiKey'=>config('services.gatewayes.id_pay.api_key')]);

            $service=new PaymentService(PaymentService::IDPAY,$request);

            $service->pay();
            
        }catch(Exception $e)
        {
            return back()->with('failed',$e->getMessage());    
        }

        
    }


    
}
