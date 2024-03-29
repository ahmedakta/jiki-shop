<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'parent_id',
        'product_id',
        'user_id',
        'comment_message',
        'comment_rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Cateogry::class , 'category_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class , 'parent_id');
    }


}
