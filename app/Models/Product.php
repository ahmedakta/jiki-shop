<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'language_id',
        'category_id',
        'currency_id',
        'product_title',
        'product_desc',
        'product_price',
        'product_photos',
        'product_stocks',
        'product_keywords',
        'product_cofigs',
        'product_water_resistance',
        'product_customization',
        'status',
    ];
   
    // set category relationshp's
    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_categories')
        ->where('parent_id' , '=' , 11);
    }
    public function brand()
    {
        return $this->belongsToMany(Category::class , 'product_categories' , 'product_id' , 'category_id')
        ->where('parent_id' , '=' , 12);
    }
    public function color()
    {
        return $this->belongsToMany(Category::class, 'product_categories')
        ->where('parent_id' , '=' , 13);
    }
    
    // Set offers relation
    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    // set shopping cart relation
    public function shoppingCart()
    {
        return $this->belongsTo(shoppingCart::class , 'shopping_carts' , 'product_id' , 'user_id');
    }

    // set comments relation
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('parent_id', null);
    }


    // Product has many orders
    public function orders()
    {
        return $this->hasMany(Order::class , 'order_products' , 'product_id' , 'order_id');
    }

}
