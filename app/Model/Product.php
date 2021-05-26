<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'categoryId',
        'name',
        'slug',
        'shortDescription',
        'longDescription',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'categoryId','id');
    }

    public function productRatings()
    {
        return $this->hasMany(ProductRating::class,'product_id','id');
    }
}
