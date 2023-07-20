<x-app-layout>

    <x-slot name="header">Siparis Güncelle</x-slot>

    <x-slot name="js">
        <script>
            $(document).ready(function () {

                $('#status').on('change',function () {

                    if($('#status').val() == 'Kargoya Verildi'){

                        console.log($('#status').val());
                        $('#cargo').show();

                    }else{
                        $('#cargo').hide();
                    }

                });

            });
        </script>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Sipariş Güncelle ( #{{ $order->order_code }} )
            </h5>
            <hr>
            <form method="POST" action="{{route('order.update',$order->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="">AD SOYAD :</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$order->name) }}">
                </div>

                <div class="form-group">
                    <label for="">TELEFON :</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone',$order->phone) }}">

                </div>


                <div class="form-group">
                    <label for="">CEP TELEFON :</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile',$order->mobile) }}">

                </div>

                <div class="form-group">
                    <label for="">ADRES :</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="10">{{ old('address',$order->address) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">SİPARİŞ DURUMU :</label>
                    <select name="status" id="status" class="form-control" >
                        <option {{ old('status',$order->status) == 'Siparişiniz Alındı' ? 'selected' : '' }}>Siparişiniz Alındı</option>
                        <option {{ old('status',$order->status) == 'Ödeme Onaylandı' ? 'selected' : '' }}>Ödeme Onaylandı</option>
                        <option {{ old('status',$order->status) == 'Kargoya Verildi' ? 'selected' : '' }}>Kargoya Verildi</option>
                        <option {{ old('status',$order->status) == 'Sipariş tamamlandı' ? 'selected' : '' }}>Sipariş tamamlandı</option>
                    </select>
                </div>

                <div id="cargo" style="display: none">
                    <div class="form-group">
                        <label for="">KARGO FİRMASI :</label>
                        <select name="cargo_name" id="cargo_name" class="form-control">
                            <option value="">Lütfen Seçim Yapınız...</option>
                            <option value="MNG Kargo">MNG Kargo</option>
                            <option value="Yurtiçi Kargo">Yurtiçi Kargo</option>
                            <option value="Aras Kargo">Aras Kargo</option>
                            <option value="PTT Kargo">PTT Kargo</option>
                            <option value="UPS Kargo">UPS Kargo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">KARGO TAKİP NUMARASI :</label>
                        <input type="text" name="cargo_code" id="cargo_code" class="form-control">
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Ürün Kodu</th>
                        <th>Ürün Resmi</th>
                        <th>Ürün Adı</th>
                        <th>Tutar</th>
                        <th>Adet</th>
                        <th>Ara Toplam</th>
                        <th>Durum</th>
                    </tr>
                    </thead>
                        <tbody>
                            @php
                            $total_price = 0;
                            @endphp
                        @foreach($order->shopping_cart->shoppingCartProduct as $cartProduct)

                            <tr>
                                <td>#{{ $cartProduct->product->product_code }}</td>
                                <td style="width:120px"><a href=""><img style="height: 70px;" src="{{ $cartProduct->product->productDetail->product_image != null ? asset($cartProduct->product->productDetail->product_image) : '' }}" alt=""></a></td>
                                <td>{{ $cartProduct->product->product_name }}</td>
                                <td>{{ $cartProduct->price }} TRY</td>
                                <td>{{ $cartProduct->number }}</td>
                                <td>{{ $cartProduct->number * $cartProduct->price }}</td>
                                <td>{{ $cartProduct->status }}</td>
                            </tr>
                            @php 
                            $total_price += $cartProduct->number * $cartProduct->price;
                            @endphp
                        @endforeach
                        <tr>
                            <th colspan="5" class="text-right">TOPLAM TUTAR :</th>
                            <td colspan="2">{{ $total_price }} TRY</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">KDV DAHİL</th>
                            <td colspan="2">{{ $order->order_price }} TRY</td>
                        </tr>

                        <tr>
                            <th colspan="5" class="text-right">SİPARİŞ DURUMU</th>
                            <td colspan="2">{{ $order->status }}</td>
                        </tr>
                        </tbody>


                </table>

                <div class="form-group">
                    <button class="btn btn-primary form-control"><i class="fa fa-pen"></i> GÜNCELLE</button>
                </div>

            </form>
        </div>
    </div>


</x-app-layout>
