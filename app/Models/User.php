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

    // User Shopping Cart relation
    public function paymentCards()
    {
        return $this->hasMany(PaymentCard::class); // we are getting the added to cart products with their quantity
    }

    // comments made by user
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // favorited products
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

     // favorited products
     public function favoritedProducts()
     {
         return $this->belongsToMany(Product::class , 'favorites' , 'user_id' , 'product_id');
     }

    //  user Orders
    public function orders()
    {
        return $this->belongsToMany(Order::class , 'order_products' , 'user_id');
    }
}
