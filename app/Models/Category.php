<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['base_id','name','slug','image'];

    public function base_category(){

        return $this->belongsTo(BaseCategory::class,'base_id');
}

    public function products(){

        return $this->belongsToMany(Product::class,'category_products');
    }
}
