<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartProduct extends Model
{
    use HasFactory;
    protected $fillable = [

        'shoppingcart_id',
        'product_id',
        'number',
        'status',
        'price',
        'size',
        'color'

    ];


    public function product(){

        return $this->belongsTo(Product::class);
    }
}
