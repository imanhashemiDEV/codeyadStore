<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GiftCartController;
use App\Http\Controllers\Admin\GuarantyController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGuarantyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorController;
use Illuminate\Support\Facades\Route;


//--- Main Route --//
Route::get('/', [PanelController::class, 'index'])->name('panel');

//Admin routes
//-- Users Routes --//
//Route::group(['middleware' => ['can:لیست کاربران']], function () {
//    Route::resource('users', UserController::class);
//});

// imo_developer
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::get('create_user_role/{id}', [UserController::class, 'createUserRole'])->name('create.user.role');
Route::post('store_user_role/{id}', [UserController::class, 'storeUserRole'])->name('store.user.role');
Route::resource('permissions', PermissionController::class);
Route::get('create_role_permissions/{id}', [RoleController::class, 'createRolePermissions'])->name('create.role.permissions');
Route::post('store_role_permissions/{id}', [RoleController::class, 'storeRolePermissions'])->name('store.role.permissions');
Route::resource('provinces', ProvinceController::class);
Route::resource('cities', CityController::class);
Route::get('sellers', [UserController::class,'sellers'])->name('panel.sellers');

//-- Store Routes --//
Route::resource('categories', CategoryController::class);
Route::get('livewire/getCategory', [CategoryController::class, 'livewireCategory'])->name('livewire.category');
Route::get('trashed_category', [CategoryController::class, 'trashed'])->name('categories.trashed');
Route::resource('brands', BrandController::class);
Route::resource('banners', BannerController::class);
Route::resource('colors', ColorController::class);
Route::resource('tags', TagController::class);
Route::resource('products', ProductController::class);
Route::get('trashed_product', [ProductController::class, 'trashed'])->name('products.trashed');
Route::get('product_discussions/{id}', [DiscussionController::class, 'index'])->name('product.discussions');
Route::get('create_product_discussions/{product_id}', [DiscussionController::class, 'create'])->name('create.product.discussions');
Route::post('store_product_discussions/{product_id}', [DiscussionController::class, 'store'])->name('store.product.discussions');
Route::get('edit_product_discussions/{id}/{product_id}', [DiscussionController::class, 'edit'])->name('edit.product.discussions');
Route::put('update_product_discussions/{id}/{product_id}', [DiscussionController::class, 'update'])->name('update.product.discussions');
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
Route::get('users_comments', [CommentController::class,'userComments'])->name('users.comments');
Route::get('users_questions', [QuestionController::class,'userQuestions'])->name('users.questions');
Route::resource('discounts', DiscountController::class);
Route::resource('gift_carts', GiftCartController::class);
Route::post('upload_ckeditor_image',[GalleryController::class,'ckeditor_image'])->name('ckeditor.upload');
Route::resource('commissions', CommissionController::class);

//-- Order Routes --//
Route::get('orders', [OrderController::class, 'orders'])->name('panel.orders');
Route::get('order_details/{order_id}', [OrderController::class, 'orderDetails'])->name('panel.order.details');

//-- Vendor Routes --//
Route::resource('vendors', VendorController::class);
Route::get('add_product_to_vendor/{vendor_id}',[VendorController::class,'addProductToVendor'])->name('add.product.vendor');
