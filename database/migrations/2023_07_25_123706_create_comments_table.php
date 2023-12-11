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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->text('body');
            $table->string('advantage');
            $table->string('disadvantage');
            $table->boolean('is_buyer');
            $table->boolean('suggestion');
            $table->integer('liked')->default(0);
            $table->integer('disliked')->default(0);
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->string('status')->default(\App\Enums\QuestionStatus::Draft->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
