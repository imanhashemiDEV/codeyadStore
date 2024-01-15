<?php


use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerTransactionController;
use Illuminate\Support\Facades\Route;


Route::get('seller_products', [SellerProductController::class, 'sellerProducts'])->name('seller.products');
Route::get('seller_transactions', [SellerTransactionController::class, 'sellerTransactions'])->name('seller.transactions');




//Route::get('product_guarantees/{id}', [ProductGuarantyController::class, 'index'])->name('product.guarantees');
//Route::get('create_product_guarantees/{product_id}', [ProductGuarantyController::class, 'create'])->name('create.product.guarantees');
//Route::post('store_product_guarantees/{product_id}', [ProductGuarantyController::class, 'store'])->name('store.product.guarantees');
//Route::get('edit_product_guarantees/{id}/{product_id}', [ProductGuarantyController::class, 'edit'])->name('edit.product.guarantees');
//Route::put('update_product_guarantees/{id}/{product_id}', [ProductGuarantyController::class, 'update'])->name('update.product.guarantees');
