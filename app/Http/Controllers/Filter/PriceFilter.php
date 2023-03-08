<?php

namespace App\Http\Controllers\Filter;

use App\Models\Product;

class PriceFilter
{

    public function filter(string $value)
    {
        $value=explode('to',$value);
        return Product::whereBetween('price',[$value[0]*1000,$value[1]*1000])->get();
    }

    public function all()
    {
        return Product::all();

    }

}
