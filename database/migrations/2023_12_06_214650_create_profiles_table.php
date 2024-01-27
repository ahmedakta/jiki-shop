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
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('profile_phone')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('profile_bio')->nullable();
            $table->string('profile_country')->nullable();
            $table->string('profile_city')->nullable();
            $table->string('profile_address_1')->nullable();
            $table->string('profile_address_2')->nullable();
            $table->string('profile_address_3')->nullable();
            $table->boolean('profile_emailme')->default(0)->nullable();
            $table->boolean('profile_newsletter')->default(0)->nullable()->comment('Newsltter subsrcription');
            $table->integer('profile_zip_code')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
