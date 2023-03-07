<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.products.master', compact('products'));

    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        $similarProducts = Product::where('id', '<>', $product->id)->where('category_id', $product->category_id)->take(3)->get();
//        dd($similarProducts);
        return view('frontend.single.master', compact('product', 'similarProducts'));

    }
}
