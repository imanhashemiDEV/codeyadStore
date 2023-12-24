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
        Route::get('/product/comment/{product_id}',[\App\Http\Controllers\FrontEnd\ProductController::class,'productComment'])->name('product.comment');
        Route::get('/profile',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profile'])->name('profile');
        Route::post('/profile_update',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileUpdate'])->name('profile.update');
        Route::get('/profile/orders',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileOrders'])->name('profile.orders');
        Route::get('/profile/order_details/{order_id}',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileOrderDetails'])->name('profile.order.details');
        Route::get('/profile/comments',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileComments'])->name('profile.comments');
        Route::get('/profile/favorites',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileFavorites'])->name('profile.favorites');
        Route::get('/profile/addresses',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileAddresses'])->name('profile.addresses');
        Route::get('/profile/user_company',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileUserCompany'])->name('profile.user.company');
    Route::post('/profile/seller_update',[\App\Http\Controllers\FrontEnd\ProfileController::class,'profileSellerUpdate'])->name('profile.seller.update');
    });






