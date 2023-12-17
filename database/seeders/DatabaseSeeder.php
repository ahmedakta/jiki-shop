<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Offer;

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
        // Fixed Main Categories
        // 1 - Products 
        // 2 - Pages 
        // 3 - Offers 

        // Fore Products
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 0,
            'category_name' => 'PRODUCTS',
            'category_slug' => 'products',
            'category_desc' => 'Products Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);
        // For Pages
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 0,
            'category_name' => 'PAGES',
            'category_slug' => 'pages',
            'category_desc' => 'Pages Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);
        // For Offers
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 0,
            'category_name' => 'OFFERS',
            'category_slug' => 'offers',
            'category_desc' => 'Offers Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);


        // Some Categories
        Category::factory()->count(5)->create();

        // Some Products
        Product::factory()->count(50)->create();

        // Some Offers
        Offer::factory()->count(5)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $offers = Offer::all();

        // Populate the pivot table
        Product::all()->each(function ($product) use ($offers) { 
            $product->offers()->attach(
                $offers->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
