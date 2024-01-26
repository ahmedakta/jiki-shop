<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile_photo',
        'profile_bio',
        'profile_country',
        'profile_city',
        'profile_phone',
        'profile_address_1',
        'profile_address_2',
        'profile_address_3',
        'profile_emailme',
        'profile_newsletter',
        'profile_zip_code',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
