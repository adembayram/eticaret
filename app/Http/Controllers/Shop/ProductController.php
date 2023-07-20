<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\BaseCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function product_detail($productSlug){

            $product = Product::whereSlug($productSlug)->firstOrFail();
           
            $bestSeller = Product::select('products.*')
            ->join('product_details','product_details.product_id','products.id')
            ->where('enable_bestseller',1)
            ->orderBy('updated_at','desc')
            ->get();

        return view('frontend.product.index',compact('product','bestSeller'));
    }

    public function product_search(Request $request){

       
        $search_key = $request->input('search');
        $products = Product::where('stock','>',0)
            ->where('product_name','like',"%$search_key%")
            ->orWhere('product_code','like',"%$search_key%")
            ->get();

        $request->flash();
        return view('frontend.shop.search',compact('products'));

    }
}
