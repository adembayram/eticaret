@extends('frontend.layout')

@section('content')
<div class="my-account-wrapper pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="alert alert-info text-left font-weight-bold">
                    Hoşgeldin {{ $user->name }} !
                </div>
                <div class="pb-3">
                     @if(\Illuminate\Support\Facades\Auth::user()->type == "admin")
                                <a href="{{ route('admin.index') }}" target="_blank">
                                    <button class="btn btn-dark ml-1">
                                        YÖNETİM PANELİ
                                    </button>
                                </a>
                              @endif
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="d-flex align-items-start">
                    
                        <div class="col-md-12 row">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills font-weight-bold" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="true">Siparişlerim</a>
                                    <a class="nav-link" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address" role="tab" aria-controls="v-pills-address" aria-selected="false">Adres Bilgilerim</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Hesap Bilgilerim</a>

                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">

                                        <table class="table table-bordered table-hover table-responsive-lg col-md-12">
                                            <thead>
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Tutar</th>
                                                    <th>Toplam Ürün</th>
                                                    <th>Durum</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order as $order)
                                                <tr>
                                                    <td>{{ $order->order_code }}</td>
                                                    <td>{{ round($order->order_price,2) }} TL</td>
                                                    <td>{{ $order->shopping_cart->shoppingCartProductCount() }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td><button id="detail" value="{{ $order->id }}" class="btn btn-sm btn-success">Detay</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-v-tab">
                                        <div class="col-md-12 order-md-1">
                                            <h3 class="mb-3 text-center">Fatura Adresi</h3>
                                            <form action="{{route('shop.user.profile.address.update',$address->id)}}" method="POST">
                                                @method("PUT")
                                                @CSRF
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name">Adınız Soyadınız</label>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ old('name',$address->name) }}" required="">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">E-Posta<span class="text-muted"></span></label>
                                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email',$address->mail) }}" placeholder="you@example.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address">Adres</label>
                                                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address',$address->address) }}" required="">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5 mb-3">
                                                        <label for="country">Ülke</label>
                                                        <select class="custom-select d-block w-100" id="country" name="country" required="">
                                                            <option value="">Seç</option>
                                                            <option {{ old('city',$address->country) != null ? 'selected hidden' : '' }}>{{ old('city',$address->country) }}</option>
                                                            <option selected>Turkiye</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="state">Şehir</label>
                                                        <select class="custom-select d-block w-100" id="city" name="city" required="">
                                                            <option {{ old('city',$address->city) != null ? 'selected hidden' : '' }}>{{ old('city',$address->city) }}</option>
                                                            <option value="">Seç</option>
                                                            <option>Adana</option>
                                                            <option>Adıyaman</option>
                                                            <option>Afyonkarahisar</option>
                                                            <option>Ağrı</option>
                                                            <option> Aksaray </option>
                                                            <option> Amasya </option>
                                                            <option> Ankara </option>
                                                            <option> Antalya </option>
                                                            <option> Ardahan </option>
                                                            <option> Artvin </option>
                                                            <option> Aydın </option>
                                                            <option> Balıkesir</option>
                                                            <option> Bartın </option>
                                                            <option> Batman </option>
                                                            <option> Bayburt </option>
                                                            <option> Bilecik </option>
                                                            <option> Bingöl </option>
                                                            <option> Bitlis </option>
                                                            <option> Bolu </option>
                                                            <option> Burdur </option>
                                                            <option> Bursa </option>
                                                            <option> Çanakkale</option>
                                                            <option> Çankırı </option>
                                                            <option> Çorum </option>
                                                            <option> Denizli </option>
                                                            <option> Diyarbakır</option>
                                                            <option> Düzce </option>
                                                            <option> Edirne </option>
                                                            <option> Elâzığ </option>
                                                            <option> Erzincan</option>
                                                            <option> Erzurum </option>
                                                            <option> Eskişehir</option>
                                                            <option> Gaziantep </option>
                                                            <option> Giresun </option>
                                                            <option> Gümüşhane </option>
                                                            <option> Hakkâri </option>
                                                            <option> Hatay </option>
                                                            <option> Iğdır </option>
                                                            <option> Isparta </option>
                                                            <option> İstanbul </option>
                                                            <option> İzmir </option>
                                                            <option> Kahramanmaraş </option>
                                                            <option> Karabük </option>
                                                            <option> Karaman </option>
                                                            <option> Kars </option>
                                                            <option> Kastamonu </option>
                                                            <option> Kayseri </option>
                                                            <option> Kırıkkale </option>
                                                            <option> Kırklareli </option>
                                                            <option> Kırşehir </option>
                                                            <option> Kilis </option>
                                                            <option> Kocaeli </option>
                                                            <option> Konya </option>
                                                            <option> Kütahya </option>
                                                            <option> Malatya </option>
                                                            <option> Manisa </option>
                                                            <option> Mardin </option>
                                                            <option> Mersin </option>
                                                            <option> Muğla </option>
                                                            <option> Muş </option>
                                                            <option> Nevşehir </option>
                                                            <option> Niğde </option>
                                                            <option> Ordu </option>
                                                            <option> Osmaniye </option>
                                                            <option> Rize </option>
                                                            <option> Sakarya </option>
                                                            <option> Samsun </option>
                                                            <option> Siirt </option>
                                                            <option> Sinop </option>
                                                            <option> Sivas </option>
                                                            <option> Şanlıurfa </option>
                                                            <option> Şırnak </option>
                                                            <option> Tekirdağ </option>
                                                            <option> Tokat </option>
                                                            <option> Trabzon </option>
                                                            <option> Tunceli </option>
                                                            <option> Uşak </option>
                                                            <option> Van </option>
                                                            <option> Yalova </option>
                                                            <option> Yozgat </option>
                                                            <option> Zonguldak </option>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="postcode">Posta Kodu</label>
                                                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="" value="{{ old('postcode',$address->postcode) }}" required="">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Güncelle</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                                        <h4 class="card-title">Kullanıcı Bilgilerim</h4>
                                        <hr>
                                        <form method="POST" action="{{ route('shop.user.profile.update',$user->id) }}" class="my-login-validation" novalidate="">
                                            @method('PUT')
                                            @CSRF
                                            <div class="form-group">
                                                <label for="name">Adınız Soyadınız *</label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">E-Posta *</label>
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Şifre <smal>(Boş bırakılırsa şifre güncelleme işlemi yapılmaz.)</smal></label>
                                                <input id="password" type="password" class="form-control" name="password" required>
                                                <smal>**Şifreniz Değiştirildikten sonra tekrar giriş yapmanız için yönlendirileceksiniz.</smal>
                                            </div>
                                            <div class="form-group m-0">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Güncelle
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="orderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sipariş Detayları</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordererd table-hover">
                        <tr>
                            <th colspan="2">Ürün</th>
                            <th>Tutar</th>
                            <th>Adet</th>
                            <th>Ara Toplam</th>
                            <th>Durum</th>
                        </tr>
                        <tbody id="table-detail">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {

        $('#detail').on('click', function() {

            let detail = $('#detail').val();
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({

                data: {
                    detail: detail,
                    _token: _token,
                },
                type: "POST",
                url: "{{route('api.order.details')}}",
                success: function(data) {
                    $('#table-detail').html(data);
                    $('#orderDetails').modal('show');
                }

            });

        });


    });
</script>

@endsection