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
        'product_keywords',
        'product_cofigs',
        'status',
    ];
   
    // set category relationshp
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
    // Set offers relation
    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function getFeaturedImage($query)
    {
        dd(1);
        return json_decode($query);
    }

    public function shoppingCart()
    {
        return $this->belongsTo(shoppingCart::class , 'shopping_carts' , 'product_id' , 'user_id');
    }

}
