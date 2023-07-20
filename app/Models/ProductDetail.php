<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [

        'product_id',
        'unit_id',
        'enable_slider',
        'enable_opportunity',
        'enable_featured',
        'enable_bestseller',
        'enable_discounted',
        'product_image',
        'product_image_to'

    ];
    use HasFactory;

    public function productImage(){
        return $this->hasMany(ProductImage::class,'detail_id');
    }

    public function unitMeasure(){

        return $this->belongsTo(UnitMeasure::class,'unit_id');

    }
}
