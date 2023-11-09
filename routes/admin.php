<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\GiftCartController;
use App\Http\Controllers\Admin\GuarantyController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGuarantyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


//--- Main Route --//
Route::get('/', [PanelController::class, 'index'])->name('panel');

//Admin routes
//-- Users Routes --//
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::get('create_user_role/{id}', [UserController::class, 'createUserRole'])->name('create.user.role');
Route::post('store_user_role/{id}', [UserController::class, 'storeUserRole'])->name('store.user.role');

//-- Store Routes --//
Route::resource('categories', CategoryController::class);
Route::get('trashed_category', [CategoryController::class, 'trashed'])->name('categories.trashed');

Route::resource('brands', BrandController::class);

Route::resource('banners', BannerController::class);

Route::resource('colors', ColorController::class);

Route::resource('tags', TagController::class);

Route::resource('products', ProductController::class);
Route::get('trashed_product', [ProductController::class, 'trashed'])->name('products.trashed');

Route::get('create_product_properties/{product}', [ProductController::class, 'createProductProperties'])->name('create.product.properties');

Route::resource('guarantees', GuarantyController::class);

Route::get('product_guarantees/{id}', [ProductGuarantyController::class, 'index'])->name('product.guarantees');
Route::get('create_product_guarantees/{product_id}', [ProductGuarantyController::class, 'create'])->name('create.product.guarantees');
Route::post('store_product_guarantees/{product_id}', [ProductGuarantyController::class, 'store'])->name('store.product.guarantees');
Route::get('edit_product_guarantees/{id}/{product_id}', [ProductGuarantyController::class, 'edit'])->name('edit.product.guarantees');
Route::put('update_product_guarantees/{id}/{product_id}', [ProductGuarantyController::class, 'update'])->name('update.product.guarantees');

Route::get('create_product_gallery/{id}', [ProductController::class, 'addGallery'])->name('add.product.gallery');
Route::post('store_product_gallery/{id}', [ProductController::class, 'storeGallery'])->name('store.product.gallery');
Route::post('upload_ckeditor_image',[ProductController::class,'ckeditor_image'])->name('ckeditor.upload');

Route::resource('property_groups', PropertyGroupController::class);

Route::resource('sliders', SliderController::class);

Route::get('users_comments', [\App\Http\Controllers\Admin\CommentController::class,'userComments'])->name('users.comments');

Route::resource('provinces', ProvinceController::class);

Route::resource('cities', CityController::class);

Route::resource('discounts', DiscountController::class);

Route::resource('gift_carts', GiftCartController::class);

