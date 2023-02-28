<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::prefix('admin-panel')->group(function (){
   Route::prefix('category')->group(function (){
       Route::get('all',[CategoriesController::class,'all'])->name('admin-panel.category.all');
       Route::get('create',[CategoriesController::class,'create'])->name('admin-panel.category.create');
       Route::post('',[CategoriesController::class,'store'])->name('admin-panel.categories.store');
       Route::delete('delete/{category_id}',[CategoriesController::class,'delete'])->name('admin-panel.categories.delete');
       Route::get('edit/{category_id}',[CategoriesController::class,'edit'])->name('admin-panel.categories.edit');
       Route::put('update/{category_id}',[CategoriesController::class,'update'])->name('admin-panel.categories.update');
   }) ;
   Route::prefix('products')->group(function (){
      Route::get('create',[ProductsController::class,'create'])->name('admin-panel.products.create');
      Route::post('',[ProductsController::class,'store'])->name('admin-panel.products.store');
   });
});

