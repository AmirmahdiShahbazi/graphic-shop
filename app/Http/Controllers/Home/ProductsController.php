<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {

        $products=[];
        if($request->has('search'))
        {
            $products=Product::where('title','LIKE','%'.$request->input('search').'%')->get();
        }else{

            $products = Product::all();
        }
        $categories=Category::all();
        return view('frontend.products.master', compact('products','categories'));

    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        $similarProducts = Product::where('id', '<>', $product->id)->where('category_id', $product->category_id)->take(3)->get();
//        dd($similarProducts);
        return view('frontend.single.master', compact('product', 'similarProducts'));

    }

    public function filterByCategory($category_id)
    {
        $products=Product::where('category_id',$category_id)->get();
        $categories=Category::all();

        return view('frontend.products.master',compact('products','categories','category_id'));


    }
}
