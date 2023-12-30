<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\OfferProduct;
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
            'category_desc' => 'Products Category', 
            'status' => 1, 
        ]);
        // For Pages
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 0,
            'category_name' => 'PAGES',
            'category_slug' => 'pages',
            'category_desc' => 'Pages Category', 
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 0,
            'category_name' => 'FEATURES',
            'category_slug' => 'features',
            'category_desc' => 'Website Features', 
            'status' => 1, 
        ]);
        // For Offers
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 0,
            'category_name' => 'OFFER_TYPES',
            'category_slug' => 'offer-types',
            'category_desc' => 'Types  Of Offers', 
            'status' => 1, 
        ]);
        // SEPERATOR ****************************************
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 0,
            'category_name' => '=SEPERATOR=',
            'category_slug' => 'seperator',
            'category_desc' => 'Seperator', 
            'status' => 1,
        ]);
        // Home page slider offers
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Slider Offers',
            'category_slug' => 'slider-offers',
            'category_desc' => 'Offers of Home slider', 
            'status' => 1, 
        ]);

        // the feautres
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Free Delivery',
            'category_slug' => 'free-delivery',
            'category_desc' => 'Free Shipping on all order', 
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Return Policy',
            'category_slug' => 'return-policy',
            'category_desc' => 'Free Shipping on all order', 
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Secure Payment',
            'category_slug' => 'secure-payment',
            'category_desc' => 'Free Shipping on all order', 
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Free Delivery',
            'category_slug' => 'free-delivery',
            'category_desc' => 'Free Shipping on all order', 
            'status' => 1, 
        ]);

        // Some Categories
        Category::factory()->count(5)->create();

        // Some Products
        Product::factory()->count(50)->create();

        // Some Offers
        Offer::factory()->count(5)->create();
        \App\Models\Offer::factory()->create([
            'category_id' => 3,
            'offer_title' => 'Slider Offers 1',
            'offer_desc' => 'Slider Offers Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);
        \App\Models\Offer::factory()->create([
            'category_id' => 3,
            'offer_title' => 'Slider Offers 2',
            'offer_desc' => 'Slider Offers Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);
        \App\Models\Offer::factory()->create([
            'category_id' => 3,
            'offer_title' => 'Slider Offers 3',
            'offer_desc' => 'Slider Offers Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);

        
        //    Create Product Offers For Home Slider
        \App\Models\OfferProduct::factory()->create([
            'product_id' => 1,
            'offer_id' => 6, //asdasdasd
        ]);
        \App\Models\OfferProduct::factory()->create([
            'product_id' => 2,
            'offer_id' => 7, //asdasdasd
        ]);
        \App\Models\OfferProduct::factory()->create([
            'product_id' => 3,
            'offer_id' => 8, //asdasdasd
        ]);
    }
}
