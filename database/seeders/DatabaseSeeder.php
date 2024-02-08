<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\OfferProduct;
use App\Models\Comment;
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
        \App\Models\Profile::create([
            'user_id' => 1,
            'profile_address_1' => 'Test Test 1',
            'profile_address_2' => 'Test Test 2',
            'profile_address_3' => 'Test Test 3',
        ]);
        // Fixed Main Categories
        // 1 - Products 
            // - Category
            // - Brand
            // - Color
        // 2 - Pages 
        // 3 - Offers 


        // Payment
        \App\Models\PaymentCard::create([
            'user_id' => 1,
            'card_number' => 4012888888881881,
            'card_holder_name' => 'Mr Jackson',
            'card_expiration_date' => '27.03.2029',
            'card_cvv' => 352, 
            'isdefault' => 0, 
            'status' => 1, 
        ]);
        // For Products
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
            'status' => 0,
        ]);
        // Home page slider offers
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 4,
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
            'category_configs' => '[{"icon":"f-icon1.png"}]', 
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Return Policy',
            'category_slug' => 'return-policy',
            'category_desc' => 'Free Shipping on all order', 
            'category_configs' => '[{"icon":"f-icon2.png"}]', 
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Secure Payment',
            'category_slug' => 'secure-payment',
            'category_desc' => 'Free Shipping on all order',
            'category_configs' => '[{"icon":"f-icon3.png"}]', 
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 3,
            'category_name' => 'Free Delivery',
            'category_slug' => 'free-delivery',
            'category_desc' => 'Free Shipping on all order',
            'category_configs' => '[{"icon":"f-icon4.png"}]',  
            'status' => 1, 
        ]);


        // Category For Products.
        \App\Models\Category::factory()->create([ // 11
            'language_id' => 0,
            'parent_id' => 1,
            'category_name' => 'CATEGORY',
            'category_slug' => 'category',
            'category_desc' => 'Category Of Product.',
            'category_configs' => '[{"icon":"c1.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([ // 12
            'language_id' => 0,
            'parent_id' => 1,
            'category_name' => 'BRAND',
            'category_slug' => 'brand',
            'category_desc' => 'Brand Of Product.',
            'category_configs' => '[{"icon":"c1.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([ // 13
            'language_id' => 0,
            'parent_id' => 1,
            'category_name' => 'COLOR',
            'category_slug' => 'color',
            'category_desc' => 'Color Of Product.',
            'category_configs' => '[{"icon":"c1.jpg"}]',  
            'status' => 1, 
        ]);

        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 11,
            'category_name' => 'SNEAKER FOR SPORTS',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c1.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 11,
            'category_name' => 'SNEAKER FOR SPORTS',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c2.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 11,
            'category_name' => 'PRODUCT FOR COUPLE',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c3.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 11,
            'category_name' => 'SNEAKER FOR SPORTS',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);
        // Brands
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 12,
            'category_name' => 'Woodland',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 12,
            'category_name' => 'Nike',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 12,
            'category_name' => 'Adidas',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 12,
            'category_name' => 'Puma',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 12,
            'category_name' => 'Reebok',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);

        // Colors
        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 13,
            'category_name' => 'Black',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);

        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 13,
            'category_name' => 'Blue',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);

        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 13,
            'category_name' => 'Red',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);

        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 13,
            'category_name' => 'Brown',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);

        \App\Models\Category::factory()->create([
            'language_id' => 0,
            'parent_id' => 13,
            'category_name' => 'Gray',
            'category_slug' => '',
            'category_desc' => '',
            'category_configs' => '[{"icon":"c4.jpg"}]',  
            'status' => 1, 
        ]);


        // Some Categories
        Category::factory()->count(5)->create();

        // Some Products
        $products = Product::factory()->count(50)->create();

        // Some Offers
        Offer::factory()->count(5)->create();
        \App\Models\Offer::factory()->create([
            'category_id' => 3,
            'offer_title' => 'Awesome Shoes',
            'offer_desc' => 'Slider Offers Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);
        \App\Models\Offer::factory()->create([
            'category_id' => 3,
            'offer_title' => 'Sport Shoe',
            'offer_desc' => 'Slider Offers Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);
        \App\Models\Offer::factory()->create([
            'category_id' => 3,
            'offer_title' => 'Run Far Away!',
            'offer_desc' => 'Slider Offers Category', //asdasdasd
            'status' => 1, //asdasdasd
        ]);
        // Offers For Test
        $offer_one = Offer::find(6);
        $offer_two = Offer::find(7);
        $offer_three  = Offer::find(8);
        // Create Product Offers For Home Slider
        // Attach Products 
        $offer_one->products()->attach(1);
        $offer_two->products()->attach(2);
        $offer_three->products()->attach(3);


        // attach comments to the products
            // Create 10 records of customers
        $products->each(function ($product) {
            // Seed the relation with one address
            $comments = Comment::factory()->count(2)->create();
            $product->comments()->saveMany($comments);
        });
        // $products = Product::first()->attac('Hi' , 1);

    }
}
