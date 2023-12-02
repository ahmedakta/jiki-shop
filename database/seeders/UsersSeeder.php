<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
        // Admin User Seed
        \App\Models\User::factory()->create([
            'name' => 'Ahmed',
            'email' => 'ahmdekta@gmail.com',
            'password' => '$2y$12$R5BH3mRKYOKr3RUhpoZ/1.tzsYrtvdQSRUooZqObEuf7YbrM849a2', //asdasdasd
            'role' => 1, //asdasdasd
        ]); 
    }
}
