<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $guarded = [];


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'imageable_id', 'id')->where('imageable_type', 'App\Models\Product');
    }



    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }



    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    public function color_product()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }

    public function size_product()
    {
        return $this->belongsToMany(Size::class, 'size_product', 'product_id', 'size_id');
    }
}
