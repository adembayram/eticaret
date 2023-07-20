<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //public $timestamps = true;
    protected $fillable = [
        'product_code',
        'product_name',
        'slug',
        'description',
        'price',
        'stock',
        'discount'

    ];
    use HasFactory;

    public function productDetail(){
        return $this->hasOne(ProductDetail::class);
    }

    public function productCategories(){

        return $this->hasMany(CategoryProduct::class);

    }

    public function bodies(){
        return $this->hasMany(Bodies::class);
    }

    public function colors(){
        return $this->hasMany(Color::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_products');
    }
}
