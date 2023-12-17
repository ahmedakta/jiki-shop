<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'parent_id',
        'category_name',
        'category_slug',
        'category_desc',
        'category_configs',
        'status',
    ];

    // set products relationship
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
