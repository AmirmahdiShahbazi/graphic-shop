<?php

use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::prefix('admin-panel')->group(function (){
   Route::prefix('category')->group(function (){
       Route::get('create',[CategoriesController::class,'create']);
   }) ;
});

