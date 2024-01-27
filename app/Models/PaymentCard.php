<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'card_number',
        'card_holder_name',
        'card_expiration_date',
        'card_cvv',
        'isdefault',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
