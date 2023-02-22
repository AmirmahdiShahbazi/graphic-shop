<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::prefix('admin-panel')->group(function (){
   Route::prefix('category')->group(function (){
       Route::get('all',[CategoriesController::class,'all'])->name('admin-panel.category.all');
       Route::get('create',[CategoriesController::class,'create'])->name('admin-panel.category.create');
       Route::post('',[CategoriesController::class,'store'])->name('admin-panel.categories.store');
   }) ;
});

