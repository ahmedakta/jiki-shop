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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('offer_title')->nullable();
            $table->longText('offer_desc')->nullable();
            $table->string('offer_configs')->nullable();
            $table->decimal('offer_discount_percentage', 5, 2)->nullable();
            $table->integer('status')->default('0');
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
