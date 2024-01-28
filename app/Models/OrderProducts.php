<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    protected $table = 'order_products';
    protected $fillable = [
        'order_id',
        'product_id',
    ];

    public function order()
    {
        return $this->hasOne(Order::class , 'order_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class , 'product_id');
    }
}
