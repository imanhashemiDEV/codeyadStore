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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('order_code');
            $table->string('status')->default(\App\Enums\OrderStatus::WaitForPayment->value);
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('transaction_id')->nullable();
            $table->double('total_price')->default(0);
            $table->timestamp('receive_date');
            $table->string('receive_time');
            $table->string('send_type');
            $table->double('discount_price')->nullable();
            $table->string('discount_code')->nullable();
            $table->double('gift_cart_price')->nullable();
            $table->string('gift_cart_code')->nullable();
            $table->integer('post_number')->nullable();
            $table->string('payment_type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
