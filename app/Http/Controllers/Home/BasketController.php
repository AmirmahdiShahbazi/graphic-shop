<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BasketController extends Controller
{
    public int $minutes=600;
    public function addToBasket($product_id)
    {
        $product=Product::find($product_id);
        $basket=json_decode(Cookie::get('basket'),true);
        if(!$basket){
            $basket=[
               $product->id=>[
                   'title'=>$product->title,
                   'demo_url'=>$product->demo_url,
                   'price'=>$product->price,
               ]
            ];
            Cookie::queue('basket',json_encode($basket),$this->minutes);
            return back()->with('success','محصول به سبد خرید اضافه شد');
        }
        if(isset($basket[$product->id])){
            return back()->with('success','محصول به سبد خرید اضافه شد');

        }

        $basket[$product->id]=[
            'title'=>$product->title,
            'demo_url'=>$product->demo_url,
            'price'=>$product->price,
        ];
        Cookie::queue('basket',json_encode($basket),$this->minutes);
        return back()->with('success','محصول به سبد خرید اضافه شد');





    }

    public function items()
    {
        return view('frontend.basket.master');

    }

    public function removeFromBasket($product_id)
    {
        $basket=json_decode(Cookie::get('basket'),true);
        if(isset($basket[$product_id])){
            unset($basket[$product_id]);
        }
        Cookie::queue('basket',json_encode($basket),$this->minutes);
        return back()->with('success');
    }
}
