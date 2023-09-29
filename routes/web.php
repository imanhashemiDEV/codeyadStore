<?php

use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

    //--- Main Route --//

    Route::get('/',[\App\Http\Controllers\FrontEnd\HomeController::class,'home'])->name('home');
    Route::get('/product_details/{slug}',[\App\Http\Controllers\FrontEnd\HomeController::class,'singleProduct'])->name('single.product');

    Route::middleware('auth')->group(function (){
        Route::get('/cart',[\App\Http\Controllers\FrontEnd\HomeController::class,'cart'])->name('user.cart');
        Route::get('/shipping',[\App\Http\Controllers\FrontEnd\HomeController::class,'shipping'])->name('user.shipping');
        Route::get('/shipping_payment',[\App\Http\Controllers\FrontEnd\HomeController::class,'shippingPayment'])->name('user.shipping.payment');
    });






