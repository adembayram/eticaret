@extends('frontend.layout')


@section('content')

<div class="my-account-wrapper pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-12">

                @if(ShoppingCart::countRows() > 0)
                <div class="myaccount-table table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ürün</th>
                                <th>Miktar</th>
                                <th>Beden</th>
                                <th>Renk</th>
                                <th class="text-center">Fiyat</th>
                                <th class="text-center">Toplam</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>



                            @foreach(ShoppingCart::all() as $productCartItem)
                            <tr>
                                <td class="col-sm-4 col-md-4">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="{{ route('shop.product.detail',$productCartItem->slug) }}"> <img class="media-object" src="{{ asset($productCartItem->image) }}" style="width: 72px; height: 72px;"> </a>
                                        <div class="media-body ml-4">
                                            <h4 class="media-heading"><a href="#">{{ $productCartItem->name }}</a></h4>
                                            <h5 class="media-heading"> by <a href="#">Marka İsmi</a></h5>
                                            <span>Ürün Kodu: </span><span class="text-success"><strong>{{ $productCartItem->product_code }}</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="email" class="form-control col-md-12" id="exampleInputEmail1" value="{{ $productCartItem->qty }}">
                                </td>
                                <td>{{ $productCartItem->size }}</td>
                                <td>{{ $productCartItem->color }}</td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>{{ round($productCartItem->price,2) }} TL</strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>{{ round($productCartItem->qty * $productCartItem->price,2) }} TL </strong></td>
                                <td class="col-sm-1 col-md-1">
                                    <form action="{{ route('shop.cart.remove',$productCartItem->rawId()) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Çıkar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <form action="{{ route('shop.cart.delete') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-dark">Sepeti Temizle</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                
                                <td>
                                    <h5>Ürün Fiyatı<br>KDV + Kargo ({{ config('cart.cargo_price') }} TL) </h5>
                                    <small>Kapıda Ödeme Kargo 15 TL Olarak alınmaktadır.</small>
                                    <h3>Toplam Tutar</h3>
                                </td>

                                @php

                                if(ShoppingCart::total() >= 200){

                                    $cargo = 10;

                                }else{

                                    $cargo = 0;

                                }

                                @endphp

                                <td class="text-right">
                                    <h5><strong>{{ round(ShoppingCart::total(),2) }}₺<br>{{ round(ShoppingCart::total()+config('cart.cargo_price')-$cargo,2) }}₺</strong></h5>
                                    <h3>
                                        {{ round(ShoppingCart::total()+config('cart.cargo_price')-$cargo,2) }}₺
                                    </h3>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="7"><br><br></td>
                            </tr>

                            <form action="{{ route('shop.order.payment')}}" method="POST">

                                @CSRF

                                <tr style="text-align: center;">
                                    <td colspan="7"><b>ALICI BİLGİLERİ</b></td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <label for="" class="form-label"><b>AD :</b></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname">
                                        </div>
                                    </td>
                                    <td colspan="4">
                                        <div class="form-group">
                                            <label for="" class="form-label"><b>SOYAD :</b></label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" >
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <label for="" class="form-label"><b>TELEFON :</b></label>
                                            <input type="text" class="form-control" id="phone" name="phone">
                                        </div>
                                    </td>
                                    <td colspan="4">
                                        <div class="form-group">
                                            <label for="" class="form-label"><b>GSM :</b></label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" >
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <label for="" class="form-label"><b>İL :</b></label>
                                            <input type="text" required="" class="form-control" id="city" name="city">
                                        </div>
                                    </td>
                                    <td colspan="4">
                                        <div class="form-group">
                                            <label for="" class="form-label"><b>İLÇE :</b></label>
                                            <input type="text" required="" class="form-control" id="county" name="county" >
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="7">
                                        <div class="form-group">
                                            <label for=""><b>Gönderimin Yapılacağı Adres :</b></label>
                                            <textarea name="address" id="address" class="form-control" rows="5">{{ $address->address }}</textarea> 
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="7" style="text-align: center;"><b>Ödeme Yöntemi</b></td>
                                </tr>

                                <tr style="text-align: center; font-weight: bold;">
                                    <td colspan="3"><input type="radio" name="payment" id="payment" checked=""  value="paytr" class="form-control"> ONLINE ÖDEME ( PAYTR )</td> 
                                    <td colspan="4"><input type="radio" name="payment" id="payment" class="form-control" value="0"> KAPIDA ÖDEME</td> 
                                </tr>


                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>
                                        <a href="{{ route('index') }}">
                                            <button type="button" class="btn btn-default">
                                                <span class="glyphicon glyphicon-shopping-cart"></span> Alışverişe Devam Et
                                            </button></a>
                                        </td>
                                        <td>

                                            <button  type="submit" class="btn btn-success">
                                                Ödeme Adımına Geç <span class="glyphicon glyphicon-play"></span>
                                            </button>
                                        </td>
                                    </tr>


                                </tfoot>

                            </form>
                        </table>
                    </div>
                    @else
                    <div class="col-md-12 row">
                        <div class="col-md-12 alert alert-info text-center font-weight-bold">
                            Sepetinizde Herhangi Bir Ürün Bulunmadı.
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endsection
