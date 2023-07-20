<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ShoppingCards extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id'];

    public function user(){

        return $this->belongsTo(User::class,'user_id');

    }

    public function shoppingCartProduct(){

        return $this->hasMany(ShoppingCartProduct::class,'shoppingcart_id');

    }

    public function shoppingCartProductCount(){

        return DB::table('shopping_cart_products')
            ->whereRaw('deleted_at is null')
            ->where('shoppingcart_id',$this->id)
            ->sum('number');

    }
}
