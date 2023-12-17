<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create();
        \App\Models\User::factory()->create([
            'name' => 'Ahmed',
            'email' => 'ahmdekta@gmail.com',
            'password' => '$2y$12$R5BH3mRKYOKr3RUhpoZ/1.tzsYrtvdQSRUooZqObEuf7YbrM849a2', //asdasdasd
            'role' => 1, //asdasdasd
        ]);


        // Some Products
        Product::factory()->count(20)->create();
    }
}
