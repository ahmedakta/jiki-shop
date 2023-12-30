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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id')->default(1);
            $table->unsignedBigInteger('category_id')->default(0);
            $table->integer('currency_id')->default(1);
            $table->string('product_title');
            $table->longText('product_desc');
            $table->integer('product_price');
            $table->string('product_photos')->nullable()->default('[{"name":"theme/img/banner/banner-product.png","isfeatured":"1"},{"name":"theme/img/banner/banner-img.png","isfeatured":"0"}]');
            $table->string('product_keywords')->nullable();
            $table->string('product_configs')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
