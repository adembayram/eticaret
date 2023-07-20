<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Address;
use App\Models\ShoppingCards;
use App\Models\ShoppingCartProduct;
use Illuminate\Http\Request;

use ShoppingCart;



class ShoppingCartController extends Controller
{
    //

    public function index()
    {

      
        $address = Address::where('user_id',auth()->id())->first();
        $user = User::where('id',auth()->id())->first();

        return view('frontend.cart.index', compact('address','user'));
    }

    public function product_add(Request $request)
    {

        if (!isset($request->quantity)) {
            $request->quantity = 1;
        }


        $product = Product::find($request->product_id);

        $price = $product->price - ($product->price * $product->discount / 100);

        $cartItem = ShoppingCart::add($product->id, $product->product_name, $request->quantity, $price, ['slug' => $product->slug, 'product_code' => $product->product_code, 'image' => $product->productDetail->product_image, 'size' => $request->size, 'color' => $request->color]);

        if (auth()->check()) {

            $active_cart_id = session('active_cart_id');
            if (empty($active_cart_id)) {

                $active_cart = ShoppingCards::create([
                    'user_id' => auth()->id()
                ]);

                $active_cart_id = $active_cart->id;
                session()->put('active_cart_id', $active_cart_id);
            }

            if (!isset($request->product_cart_add)) {

                ShoppingCartProduct::updateOrCreate(
                    ['shoppingcart_id' => $active_cart_id, 'product_id' => $product->id],
                    ['number' => $cartItem->qty, 'price' => $price, 'status' => "Beklemede", 'size' => $cartItem->size, 'color' => $cartItem->color]
                );
            }else{

                ShoppingCartProduct::updateOrCreate(
                    ['shoppingcart_id' => $active_cart_id, 'product_id' => $product->id],
                    ['number' => $cartItem->qty, 'price' => $price, 'status' => "Beklemede", 'size' =>null, 'color' => null]
                );

            }

            //return ShoppingCart::all();

            return redirect()->route('shop.shoppingcart.index')->withSuccess("Ürün Sepete Eklendi");
        } else {

            return redirect()->route('login');
        }
    }

    public function removeProduct($id)
    {

        if (auth()->check()) {

            $active_cart_id = session('active_cart_id');
            $cartItem = ShoppingCart::get($id);
            ShoppingCartProduct::where('shoppingcart_id', $active_cart_id)->where('product_id', $cartItem->id)->delete();
        }

        ShoppingCart::remove($id);

        return redirect()->route('shop.shoppingcart.index')->withSuccess('Ürün Başarılı Bir Şekilde Sepetten Çıkartıldı.');
    }

    public function deleteProduct()
    {

        if (auth()->check()) {

            $active_cart_id = session('active_cart_id');
            ShoppingCartProduct::where('shoppingcart_id', $active_cart_id)->delete();
        }

        ShoppingCart::destroy();

        return redirect()->route('shop.shoppingcart.index')->withSuccess('Sepetiniz Temizlendi.');
    }
}
