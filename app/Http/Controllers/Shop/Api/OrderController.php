<?php

namespace App\Http\Controllers\Shop\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function details(Request $request)
    {


        $orders = Order::with('shopping_cart.shoppingCartProduct.product')
            ->whereHas('shopping_cart', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('orders.id', $request->detail)
            ->firstOrFail();

        $data = '';

        $total_price = 0;

        foreach ($orders->shopping_cart->shoppingCartProduct as $cartProduct) {

            $data .= '<tr>';
            //$data .= '<td><a href="'.route('shop.product.detail',$cartProduct->product->slug).'"><img src="'. $cartProduct->product->productDetail->product_image .'"></a></td>';
            $data .= '<td></td>';
            $data .= '<td><a href="' . route('shop.product.detail', $cartProduct->product->slug) . '">' . $cartProduct->product->product_name . '</a></td>';
            $data .= '<td>' . $cartProduct->price . '</td>';
            $data .= '<td>' . $cartProduct->number . '</td>';
            $data .= '<td>' . $cartProduct->price * $cartProduct->number . '</td>';
            $data .= '<td>' . $cartProduct->status . '</td>';
            $data .= '</tr>';

            $total_price += $cartProduct->price * $cartProduct->number;
        }

        $data .= ' <tr>';
        $data .= '<th colspan="4" class="text-right">Toplam Tutar :</th>';
        $data .= '<td colspan="2">' . $total_price . ' TL</td>';
        $data .= '</tr>';


        $data .= ' <tr>';
        $data .= '<th colspan="4" class="text-right">Toplam Tutar (KDV Dahil) :</th>';
        $data .= '<td colspan="2">' . $orders->order_price . ' TL</td>';
        $data .= '</tr>';

        $data .= ' <tr>';
        $data .= '<th colspan="4" class="text-right">Sipariş Durumu :</th>';
        $data .= '<td colspan="2">' . $orders->status . '</td>';
        $data .= '</tr>';

        $data .= '<tr>';
        $data .= '<td colspan="6"><hr></td>';
        $data .= '</tr>';

        $data .= '<tr>';
        $data .= '<td colspan="2">Alıcı</td>';
        $data .= '<td>:</td>';
        $data .= '<td colspan="4">'.$orders->name.'</td>';
        $data .= '</tr>';

        $data .= '<tr>';
        $data .= '<td colspan="2">İletişim</td>';
        $data .= '<td>:</td>';
        $data .= '<td colspan="4">'.$orders->mobile.'</td>';
        $data .= '</tr>';

       if($orders->cargo_code != null AND $orders->cargo_name)
       {
           $data .= '<tr>';
           $data .= '<td colspan="2">Kargo Takip Numarası</td>';
           $data .= '<td>:</td>';
           $data .= '<td colspan="3">'.$orders->cargo_name.' ( '. $orders->cargo_code .' )'.'</td>';
           $data .= '</tr>';
       }
        $data .= '<tr>';
        $data .= '<td colspan="2">Teslimat Adresi :</td>';
        $data .= '<td>:</td>';
        $data .= '<td colspan="4">'.$orders->address.'</td>';
        $data .= '</tr>';

        echo $data;

    }
}
