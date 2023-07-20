<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [

        'order_code',
        'shoppingcart_id',
        'name',
        'order_price',
        'status',
        'address',
        'phone',
        'mobile',
        'cargo_name',
        'cargo_code',
        'bank',
        'installment'

    ];

    public function shopping_cart(){

        return $this->belongsTo(ShoppingCards::class,'shoppingcart_id');

    }

}
