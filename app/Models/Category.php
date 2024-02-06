<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    const PARENT_ID = 0;
    const PRODUCT_CATEGORIES = 1;
    const PAGES_CATEGORIES = 2;
    const FEATURES_CATEGORIES = 3;
    const OFFER_CATEGORIESORIES = 4;

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

    public function productsCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('parent_id', 1);
    }

    public function pagesCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('parent_id', 2);
    }

    public function featuresCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('parent_id', 3);
    }

    public function offersCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('parent_id', 4);
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


}
