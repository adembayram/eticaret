@extends('frontend.layout')


@section('content')
<div class="product-details-area pt-120 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div class="pro-dec-big-img-slider">
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="{{ asset($product->productDetail->product_image) }}">
                                    <img src="{{ asset($product->productDetail->product_image) }}" alt="">
                                </a>
                            </div>
                            <a class="easyzoom-pop-up img-popup" href="{{ asset($product->productDetail->product_image) }}"><i class="icon-size-fullscreen"></i></a>
                        </div>
                        @foreach($product->productDetail->productImage as $productImage)
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="{{ asset($productImage->image) }}">
                                    <img src="{{ asset($productImage->image) }}" alt="">
                                </a>
                            </div>
                            <a class="easyzoom-pop-up img-popup" href="{{ asset($productImage->image) }}"><i class="icon-size-fullscreen"></i></a>
                        </div>
                        @endforeach

                    </div>
                    <div class="product-dec-slider-small product-dec-small-style1">
                        @foreach($product->productDetail->productImage as $productImage)
                        <div class="product-dec-small {{ $loop->first ? 'is-active' : '' }}">
                            <img src="{{ asset($productImage->image) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content pro-details-content-mrg">
                    <h2>{{ $product->product_name }}</h2>

                    <div class="pro-details-price">
                        <span class="new-price">{{ round((float)$product->price - ((float)$product->price * (float)$product->discount / 100),2) }} TL</span>
                        <span class="old-price">{{ round($product->price,2) }} TL</span>
                    </div>

                    <div class="product-details-meta">
                        <ul>
                            <li><span>Ürün Kodu:</span> {{ $product->product_code }}</li>
                            <li><span>İndirim : </span> % {{ $product->discount }}</li>
                        </ul>
                    </div>
                    <form id="AddToCartForm" method="POST" action="{{ route('shop.shoppingcart.product.add') }}">

                    
                        <div class="pro-details-quality">
                            <span>ADET:</span>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="quantity" value="1">
                            </div>
                        </div>

                        @CSRF
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="product_cart_add" name="product_cart_add" value="1">
                        <div class="pro-details-action-wrap mt-2">
                            <div class="pro-details-add-to-cart">
                                <button class="btn btn-dark">Sepete Ekle</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="description-review-wrapper pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dec-review-topbar nav mb-45">
                    <a class="active" data-toggle="tab" href="#des-details1">Açıklama</a>
                </div>
                <div class="tab-content dec-review-bottom">
                    <div id="des-details1" class="tab-pane active">
                        <div class="description-wrap">
                            {{ $product->description }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="related-product pb-115">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>Çok Satan Ürünler</h2>
        </div>
        <div class="related-product-active">

            @foreach ($bestSeller as $product)
            <div class="product-plr-1">
                <div class="single-product-wrap">
                    <div class="product-img product-img-zoom mb-15">
                        <a href="{{ route('shop.product.detail',$product->slug) }}">
                            <img src="{{ asset($product->productDetail->product_image) }}" alt="">
                        </a>
                        @if($product->discount!= null)
                        <span class="pro-badge left bg-red">- {{$product->discount}} %</span>
                        @endif

                    </div>
                    <div class="product-content-wrap-2 text-center">
                        <div class="product-rating-wrap">
                            <div class="product-rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>

                        </div>
                        <h3><a href="{{ route('shop.product.detail',$product->slug) }}">{{ $product->product_name }}</a></h3>

                        <div class="product-price-2">
                            <span class="new-price">{{ round((float)$product->price - ((float)$product->price * (float)$product->discount / 100),2) }} TL</span>
                            <span class="old-price">{{ round($product->price,2) }} TL</span>
                        </div>
                    </div>
                    <div class="product-content-wrap-2 product-content-position text-center">
                        <div class="product-img product-img-zoom mb-15">
                            <a href="{{ route('shop.product.detail',$product->slug) }}">
                                <img src="{{ asset($product->productDetail->product_image_to) }}" alt="">
                            </a>

                        </div>
                        <div class="product-rating-wrap">
                            <div class="product-rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>

                        </div>
                        <h3><a href="product-details.html">{{ $product->product_name }}</a></h3>
                        <div class="product-price-2">
                            <span class="new-price">{{ round((float)$product->price - ((float)$product->price * (float)$product->discount / 100),2) }} TL</span>
                            <span class="old-price">{{ round($product->price,2) }} TL</span>
                        </div>
                        <div class="pro-add-to-cart">
                            <button title="Add to Cart">Sepete Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection