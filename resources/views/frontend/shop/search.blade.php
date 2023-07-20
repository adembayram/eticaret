@extends('frontend.layout')

@section('content')

<div class="shop-area pt-120 pb-120">
    <div class="container">
        <div class="row flex-row-reverse">
            @if (count($products)==0)
            <div class="col-md-12 text-center">
                Herhangi bir ürün bulunamadı!
            </div>
            @endif
            <div class="col-lg-12">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <div class="view-mode nav">
                            <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>
                            <a href="#shop-2" data-toggle="tab"><i class="icon-menu"></i></a>
                        </div>
                        <p>{{ count($products) }} Sonuç listelenmiştir. ( Her sayfada 10 ürün gösterilmektedir.) </p>
                    </div>

                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="single-product-wrap mb-35">
                                        <div class="product-img product-img-zoom mb-15">
                                            <a href="{{ route('shop.product.detail',$product->slug) }}">
                                                <img data-src="{{ asset($product->productDetail->product_image) }}" alt="" class="lazy">
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
                                          {{--  <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ route('shop.product.detail',$product->slug) }}">
                                                    <img data-src="{{ asset($product->productDetail->product_image_to) }}" class="lazy" alt="">
                                                </a>

                                            </div>  --}}
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
                                            <form id="AddToCartForm" method="POST" action="{{ route('shop.shoppingcart.product.add') }}">
                                                <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" id="product_cart_add" name="product_cart_add" value="1">
                                                @CSRF
                                                <div class="pro-add-to-cart">
                                                    <button type="submit" title="Add to Cart">Sepete Ekle</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>


                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection


    @section('css')

<style type="text/css">


    .lazy {
        display: block;
        width: 100%;
    }

</style>

@endsection


@section('js')

<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function() {
      var lazyloadImages = document.querySelectorAll("img.lazy");    
      var lazyloadThrottleTimeout;
      
      function lazyload () {
        if(lazyloadThrottleTimeout) {
          clearTimeout(lazyloadThrottleTimeout);
      }    
      
      lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
          }
      });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
      }
  }, 20);
  }
  
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
});
</script>

@endsection