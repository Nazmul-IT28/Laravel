<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function Category(){
        return $this->belongsTo(Category::Class, 'category_id');
    }

    function SubCategory(){
        return $this->belongsTo(SubCategory::Class, 'subcategory_id');
    }

    // function productGallery(){
    //     return $this->hasMany(ProductGallery::Class, 'product_id');
    // }
}
