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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('payment_cards_id');

            $table->integer('order_total_amount')->nullable();
            $table->string('order_shipping_address')->nullable();
            $table->string('order_configs')->nullable();
            $table->string('order_details')->nullable();
            $table->integer('status')->default(0);
            $table->integer('payment_status')->default(0);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('payment_cards_id')->references('id')->on('payment_cards')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
