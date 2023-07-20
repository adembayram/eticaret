<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Models\Category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    //

    public function index($categorySlug){

         $category = Category::whereSlug($categorySlug)->firstOrFail();
        

        $products = $category->products()
            ->where('stock','>',0)
            ->orderBy('created_at','desc')
            ->paginate(12);

        $productCount = $category->products()->count();


        return view('frontend.shop.index',compact('category','products','productCount'));

    }

}
