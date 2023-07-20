@extends('frontend.layout')

@section('content')

    <div class="container">
        <h3 class="h4">Arama Sonucu :</h3>
        <hr>
        <div class="col-md-12">
            <div class="row">
                @if (count($products)==0)
                    <div class="col-md-12 text-center">
                        Herhangi bir ürün bulunamadı!
                    </div>
                @endif
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="product-grid8">
                            <div class="product-image8">
                                <a href="{{ route('shop.product.detail',$product->slug) }}">
                                    <img class="pic-1"
                                         src="{{ asset($product->productDetail->product_image) }}">
                                    <img class="pic-2"
                                         src="{{ asset($product->productDetail->product_image_to) }}">
                                </a>
                                <ul class="social">
                                    <li><a href="" class="fa fa-shopping-bag"></a></li>
                                    <li><a href="" class="fa fa-shopping-cart"></a></li>
                                </ul>
                                @if($product->discount!= null)
                                    <span class="product-discount-label">% {{$product->discount}}</span>
                                @endif
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#">{{ $product->product_name }}</a></h3>
                                <div
                                    class="price">{{ round((float)$product->price - ((float)$product->price * (float)$product->discount / 100),2) }}
                                    ₺
                                    <span>{{ round($product->price,2) }}₺</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>
@endsection
