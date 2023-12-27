<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // User Shopping Cart relation
    public function cartProducts()
    {
        return $this->belongsToMany(Product::class , 'shopping_carts' , 'user_id' , 'product_id')->withPivot('quantity'); // we are getting the added to cart products with their quantity
    }

    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class ,  'user_id'); // we are getting the added to cart products with their quantity
    }
}
