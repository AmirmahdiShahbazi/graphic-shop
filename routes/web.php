<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Home\BasketController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PaymentController;
use \App\Http\Controllers\Home\ProductsController as HomeProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(callback: function () {
    Route::get('', [HomeProductController::class, 'index'])->name('home.products.all');
    Route::get('show/{product_id}', [HomeProductController::class, 'show'])->name('home.show');
    Route::get('category/{category_id}', [HomeProductController::class, 'filterByCategory'])->name('home.filterByCategory');
    Route::get('addToBasket/{product_id}', [BasketController::class, 'addToBasket'])->name('home.addToBasket');
    Route::prefix('basket')->group(function () {
        Route::get('', [BasketController::class, 'items'])->name('home.basket.items');
        Route::get('removeFromBasket/{product_id}', [BasketController::class, 'removeFromBasket'])->name('home.basket.removeFromBasket');
    });
});


Route::prefix('admin-panel')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('all', [CategoriesController::class, 'all'])->name('admin-panel.category.all');
        Route::get('create', [CategoriesController::class, 'create'])->name('admin-panel.category.create');
        Route::post('', [CategoriesController::class, 'store'])->name('admin-panel.categories.store');
        Route::delete('delete/{category_id}', [CategoriesController::class, 'delete'])->name('admin-panel.categories.delete');
        Route::get('edit/{category_id}', [CategoriesController::class, 'edit'])->name('admin-panel.categories.edit');
        Route::put('update/{category_id}', [CategoriesController::class, 'update'])->name('admin-panel.categories.update');
    });
    Route::prefix('products')->group(function () {
        Route::get('', [ProductsController::class, 'all'])->name('admin-panel.products.all');
        Route::get('create', [ProductsController::class, 'create'])->name('admin-panel.products.create');
        Route::post('', [ProductsController::class, 'store'])->name('admin-panel.products.store');
        Route::get('download/demo/{demo_id}', [ProductsController::class, 'downloadDemo'])->name('admin-panel.products.downloadDemo');
        Route::get('download/{source_id}', [ProductsController::class, 'downloadSource'])->name('admin-panel.products.downloadSource');
        Route::delete('delete/{product_id}', [ProductsController::class, 'delete'])->name('admin-panel.products.delete');
        Route::get('edit/{product_id}', [ProductsController::class, 'edit'])->name('admin-panel.products.edit');
        Route::put('update/{product_id}', [ProductsController::class, 'update'])->name('admin-panel.products.update');
    });
    Route::prefix('users')->group(function () {
        Route::get('', [UsersController::class, 'all'])->name('admin-panel.users.all');
        Route::get('create', [UsersController::class, 'create'])->name('admin-panel.users.create');
        Route::post('', [UsersController::class, 'store'])->name('admin-panel.users.store');
        Route::delete('delete/{user_id}', [UsersController::class, 'delete'])->name('admin-panel.users.delete');
        Route::get('edit/{user_id}', [UsersController::class, 'edit'])->name('admin-panel.users.edit');
        Route::put('update/{user_id}', [UsersController::class, 'update'])->name('admin-panel.users.update');
    });
    Route::prefix('orders')->group(function () {
        Route::get('', [OrdersController::class, 'all'])->name('admin-panel.orders.all');
    });
    Route::prefix('payments')->group(function () {
        Route::get('', [PaymentsController::class, 'all'])->name('admin-panel.payments.all');
    });
});

Route::prefix('payment')->group(function(){
    Route::post('pay',[PaymentController::class,'pay'])->name('payment.pay');
    Route::get('callback',[PaymentController::class,'callback']);
});
