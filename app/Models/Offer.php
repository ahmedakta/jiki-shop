<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'category_id',
        'offer_title',
        'offer_desc',
        'offer_configs',
        'status',
    ];


    public function category()
    {
        $this->belongsTo(Category::class , 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
