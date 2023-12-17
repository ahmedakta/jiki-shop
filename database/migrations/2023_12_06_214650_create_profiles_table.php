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
            $table->string('profile_phone');
            $table->string('profile_photo');
            $table->string('profile_bio');
            $table->string('profile_country');
            $table->string('profile_city');
            $table->string('profile_address_1');
            $table->string('profile_address_2');
            $table->string('profile_address_3');
            $table->boolean('profile_emailme');
            $table->integer('profile_newsltter')->comment('Newsltter subsrcription');
            $table->integer('profile_zip_code');
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
