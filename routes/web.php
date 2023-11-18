<?php

use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

    //--- Main Route --//

    Route::get('/',[\App\Http\Controllers\FrontEnd\HomeController::class,'home'])->name('home');
    Route::get('/payment/callback',[\App\Http\Controllers\FrontEnd\PaymentController::class,'callback'])->name('payment');

    Route::get('/product_details/{slug}',[\App\Http\Controllers\FrontEnd\ProductController::class,'singleProduct'])->name('single.product');
    Route::get('/main/{main_category_slug}',[\App\Http\Controllers\FrontEnd\ProductController::class,'mainCategoryProductList'])->name('main.category.product.list');
    Route::get('/search/{sub_category_slug}/{child_category_slug?}',[\App\Http\Controllers\FrontEnd\ProductController::class,'searchCategoryProductList'])->name('search.category.product.list');
    Route::get('/compare_products/{product_id1}/{product_id2}',[\App\Http\Controllers\FrontEnd\ProductController::class,'compareProducts'])->name('compare.products');


Route::middleware('auth')->group(function (){
        Route::get('/cart',[\App\Http\Controllers\FrontEnd\HomeController::class,'cart'])->name('user.cart');
        Route::get('/shipping',[\App\Http\Controllers\FrontEnd\HomeController::class,'shipping'])->name('user.shipping');
        Route::get('/shipping_payment',[\App\Http\Controllers\FrontEnd\HomeController::class,'shippingPayment'])->name('user.shipping.payment');
        Route::get('/payment',[\App\Http\Controllers\FrontEnd\PaymentController::class,'payment'])->name('payment');
    });






