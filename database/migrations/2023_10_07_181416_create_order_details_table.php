<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('guaranty_id')->nullable();
            $table->double('main_price');
            $table->double('price');
            $table->double('discount')->default(0);
            $table->integer('count')->default(0);
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
