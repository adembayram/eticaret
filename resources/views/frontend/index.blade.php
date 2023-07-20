@extends('frontend.layout')

@section('content')
<!-- SLIDER START -->
<div class="product-categories-area pt-10 pb-25">
    <div class="container">
        <div class="section-title-btn-wrap border-bottom-3 mb-25 pb-10">
            <div class="section-title-6">
                <h2>Popüler Kategoriler</h2>
            </div>

        </div>
        <div class="product-categories-slider-1 nav-style-3">
            @foreach($menus as $menu)

            @foreach($menu->baseCategory as $base_category)
            @foreach($base_category->category as $category)
            <div class="product-plr-1">
                <div class="single-product-wrap">
                    <div class="product-img product-img-border border-blue mb-20">
                        <a href="{{ route('shop.index',$category->slug) }}">
                            <img src="{{ $category->image }}" alt="">
                        </a>
                    </div>
                    <div class="product-content-categories-2 product-content-blue text-center">
                        <h5><a href="{{ route('shop.index',$category->slug) }}">{{ $category->name }}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach 
            @endforeach 

        </div>
    </div>
</div>

<div class="slider-area">
    <div class="hero-slider-active-1 nav-style-1 dot-style-2 dot-style-2-position-2 dot-style-2-active-black">
        @foreach ($sliders as $slider)      
        <div class="single-hero-slider single-animation-wrap slider-height-2 custom-d-flex custom-align-item-center bg-img hm2-slider-bg res-white-overly-xs " style="background-image:url({{ $slider->image }} ); background-repeat: no-repeat; background-size: contain;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-content-4 slider-animated-1">                            
                            <h1 class="animated text-white">{{ $slider->title }}</h1>
                            <p class="animated text-white">{{ $slider->description }}</p>
                            @if($slider->link)
                            <div class="btn-style-1">
                                <a class="animated btn-1-padding-1" href="{{ $slider->link }}">Hemen Git</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- SLIDER END -->

<div class="product-area pt-115 pb-80">
    <div class="container">
        <div class="section-title-tab-wrap mb-55">
            <div class="section-title-4">
                <h2>Ürünler</h2>
            </div>
            <div class="tab-btn-wrap-2">
                <div class="tab-style-5 nav">
                    <a class="active" href="#product-1" data-toggle="tab">Hepsi </a>
                </div>
            </div>
        </div>
        <div class="tab-content jump">
            <div id="product-1" class="tab-pane active">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="{{ route('shop.product.detail',$product->slug) }}">
                                    <img data-src="{{ asset($product->productDetail->product_image) }}" class="lazy" alt="">
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
                                <h3><a href="product-details.html">{{ $product->product_name }}</a></h3>

                                <div class="product-price-2">
                                    <span class="new-price">{{ round((float)$product->price - ((float)$product->price * (float)$product->discount / 100),2) }} TL</span>
                                    <span class="old-price">{{ round($product->price,2) }} TL</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                {{-- <div class="product-img product-img-zoom mb-15">
                                    <a href="{{ route('shop.product.detail',$product->slug) }}">
                                        <img data-src="{{ asset($product->productDetail->product_image_to) }}" class="lazy" alt="">
                                    </a>

                                </div> --}}
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