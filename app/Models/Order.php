<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'payment_cards_id',
        'order_total_amount',
        'order_shipping_address',
        'order_details',
        'order_configs',
        'status',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function paymentCard()
    {
        return $this->belongsTo(PaymentCard::class , 'payment_card_id');
    }

    public function products(){
		return $this->belongsToMany(Product::class, 'order_products');
	}
}
