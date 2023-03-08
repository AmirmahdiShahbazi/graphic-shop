<?php

namespace App\Http\Controllers\Filter;

use App\Models\Product;

class OrderbyFilter
{

    public function newest()
    {
        return Product::orderBy('created_at', 'DESC')->get();
    }

    public function lowtohigh()
    {
        return Product::orderBy('price', 'ASC')->get();

    }

    public function hightolow()
    {
        return Product::orderBy('price', 'DESC')->get();

    }

}
