<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::with('shopping_cart.user')
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Order::with('shopping_cart.shoppingCartProduct.product')->find($id);
        return view('admin.order.edit',compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $request, $id)
    {
        //
            $orderUpdate = Order::find($id) ?? abort(404,'Sipariş Bulunamadı.');
            $orderUpdate->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'status' => $request->status,
                'address' => $request->address,
                'cargo_name' => $request->cargo_name,
                'cargo_code' => $request->cargo_code
            ]);

            return redirect()->route('order.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $orderDelete = Order::find($id) ?? abort(404,'Sipariş Bulunamadı.');
        $orderDelete->delete();

        return redirect()->route('order.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
    }


    public function orderPrint($id){

            $order = Order::with('shopping_cart.shoppingCartProduct.product')->find($id) ?? abort(404,'Sipariş Bulunamadı.');    


        return view('frontend.page.order-content',compact('order'));

    }
}
