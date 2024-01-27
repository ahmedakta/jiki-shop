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
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id'); // Foreign key to associate with a user
            $table->string('card_number'); // You may want to use a more secure data type or consider encryption
            $table->string('card_holder_name');
            $table->string('card_expiration_date');
            $table->string('card_cvv'); // Card Verification Value
            $table->boolean('isdefault')->default(0)->nullable(); // Card Verification Value
            $table->integer('status'); // Card Verification Value
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_cards');
    }
};
