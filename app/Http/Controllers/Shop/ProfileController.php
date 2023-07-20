<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileAdressRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $order = Order::with('shopping_cart')
            ->whereHas('shopping_cart',function ($query){
                $query->where('user_id',auth()->id());
            })
            ->orderByDesc('created_at')
            ->get();

        $address = Address::where('user_id',auth()->id())->first();
        $user = User::where('id',auth()->id())->first();


        return view('frontend.profile.index',compact('order','address','user'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(!empty($request->password)){

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                ];

        }else{
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

        }

        $update = User::find($id)->update($data);

        return redirect()->route('shop.user.profile.index')->withSuccess("İşlem Başarılı Bir Şekilde Gerçekleştirildi.");

    }

    public  function address_update(ProfileAdressRequest $request, $id){

        //echo $request->post();

       Address::find($id)
            ->update([
                 'name' => $request->name,
                'mail' => $request->email,
                'country' => $request->country,
                'city' => $request->city,
                'postcode' => $request->postcode
            ]);

        return redirect()->route('shop.user.profile.index')->withSuccess("İşlem Başarılı Bir Şekilde Gerçekleştirildi.");
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
    }
}
