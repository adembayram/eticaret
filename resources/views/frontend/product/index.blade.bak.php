@extends('frontend.layout')

@section('css')

<style>
  /**
 * Helper Styles
 */
  .ir {
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
  }

  /**
 * Gallery Styles
 * 1. Enable fluid images
 */
  .gallery {
    overflow: hidden;
  }

  .gallery__hero {
    overflow: hidden;
    position: relative;
    padding: 2em;
    margin: 0 0 0.3333333333em;
    background: #fff;
  }

  .is-zoomed .gallery__hero {
    cursor: move;
  }

  .is-zoomed .gallery__hero img {
    max-width: none;
    position: absolute;
    z-index: 0;
    top: -50%;
    left: -50%;
  }

  .gallery__hero-enlarge {
    position: absolute;
    right: 0.5em;
    bottom: 0.5em;
    z-index: 1;
    width: 30px;
    height: 30px;
    opacity: 0.5;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMCIgaGVpZ2h0PSIzMCIgdmlld0JveD0iNS4wIC0xMC4wIDEwMC4wIDEzNS4wIiBmaWxsPSIjMzRCZjQ5Ij48cGF0aCBkPSJNOTMuNTkzIDg2LjgxNkw3Ny4wNDUgNzAuMjY4YzUuNDEzLTYuODczIDguNjQyLTE1LjUyNiA4LjY0Mi0yNC45MTRDODUuNjg3IDIzLjEwNCA2Ny41OTMgNSA0NS4zNDMgNVM1IDIzLjEwNCA1IDQ1LjM1NGMwIDIyLjI0IDE4LjA5NCA0MC4zNDMgNDAuMzQzIDQwLjM0MyA5LjQgMCAxOC4wNjItMy4yNCAyNC45MjQtOC42NTNsMTYuNTUgMTYuNTZjLjkzNy45MjcgMi4xNjIgMS4zOTYgMy4zODggMS4zOTYgMS4yMjUgMCAyLjQ1LS40NyAzLjM5LTEuMzk2IDEuODc0LTEuODc1IDEuODc0LTQuOTEyLS4wMDItNi43ODh6bS00OC4yNS0xMC43MWMtMTYuOTU0IDAtMzAuNzUzLTEzLjc5OC0zMC43NTMtMzAuNzUyIDAtMTYuOTY0IDEzLjgtMzAuNzY0IDMwLjc1My0zMC43NjQgMTYuOTY0IDAgMzAuNzUzIDEzLjggMzAuNzUzIDMwLjc2NCAwIDE2Ljk1NC0xMy43ODggMzAuNzUzLTMwLjc1MyAzMC43NTN6TTYzLjAzMiA0NS4zNTRjMCAyLjM0NC0xLjkwNyA0LjI2Mi00LjI2MiA0LjI2MmgtOS4xNjR2OS4xNjRjMCAyLjM0NC0xLjkwNyA0LjI2Mi00LjI2MiA0LjI2Mi0yLjM1NSAwLTQuMjYyLTEuOTE4LTQuMjYyLTQuMjYydi05LjE2NGgtOS4xNjRjLTIuMzU1IDAtNC4yNjItMS45MTgtNC4yNjItNC4yNjIgMC0yLjM1NSAxLjkwNy00LjI2MiA0LjI2Mi00LjI2Mmg5LjE2NHYtOS4xNzVjMC0yLjM0NCAxLjkwNy00LjI2MiA0LjI2Mi00LjI2MiAyLjM1NSAwIDQuMjYyIDEuOTE4IDQuMjYyIDQuMjYydjkuMTc1aDkuMTY0YzIuMzU1IDAgNC4yNjIgMS45MDcgNC4yNjIgNC4yNjJ6Ii8+PC9zdmc+);
    background-repeat: no-repeat;
    transition: opacity 0.3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
  }

  .gallery__hero-enlarge:hover {
    opacity: 1;
  }

  .is-zoomed .gallery__hero-enlarge {
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMCIgaGVpZ2h0PSIzMCIgdmlld0JveD0iNS4wIC0xMC4wIDEwMC4wIDEzNS4wIiBmaWxsPSIjMzRCZjQ5Ij48cGF0aCBkPSJNOTMuNTkzIDg2LjgxNkw3Ny4wNDUgNzAuMjY4YzUuNDEzLTYuODczIDguNjQyLTE1LjUyNiA4LjY0Mi0yNC45MTRDODUuNjg3IDIzLjEwNCA2Ny41OTMgNSA0NS4zNDMgNVM1IDIzLjEwNCA1IDQ1LjM1NGMwIDIyLjI0IDE4LjA5NCA0MC4zNDMgNDAuMzQzIDQwLjM0MyA5LjQgMCAxOC4wNjItMy4yNCAyNC45MjQtOC42NTNsMTYuNTUgMTYuNTZjLjkzNy45MjcgMi4xNjIgMS4zOTYgMy4zODggMS4zOTYgMS4yMjUgMCAyLjQ1LS40NyAzLjM5LTEuMzk2IDEuODc0LTEuODc1IDEuODc0LTQuOTEyLS4wMDItNi43ODh6TTE0LjU5IDQ1LjM1NGMwLTE2Ljk2NCAxMy44LTMwLjc2NCAzMC43NTMtMzAuNzY0IDE2Ljk2NCAwIDMwLjc1MyAxMy44IDMwLjc1MyAzMC43NjQgMCAxNi45NTQtMTMuNzkgMzAuNzUzLTMwLjc1MyAzMC43NTMtMTYuOTUzIDAtMzAuNzUzLTEzLjgtMzAuNzUzLTMwLjc1M3pNNTguNzcyIDQ5LjYxSDMxLjkyYy0yLjM1NSAwLTQuMjYzLTEuOTA3LTQuMjYzLTQuMjZzMS45MDgtNC4yNjMgNC4yNjItNC4yNjNINTguNzdjMi4zNTQgMCA0LjI2MiAxLjkwOCA0LjI2MiA0LjI2MnMtMS45MSA0LjI2LTQuMjYyIDQuMjZ6Ii8+PC9zdmc+);
  }

  .gallery__thumbs {
    text-align: center;
    background: #fff;
  }

  .gallery__thumbs a {
    display: inline-block;
    width: 20%;
    padding: 0.5em;
    opacity: 0.75;
    transition: opacity 0.3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
  }

  .gallery__thumbs a:hover {
    opacity: 1;
  }

  .gallery__thumbs a.is-active {
    opacity: 0.2;
  }
</style>

@endsection

@section('js')
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.js'></script>
<script>
  var App = (function() {

    //=== Use Strict ===//
    'use strict';

    //=== Private Variables ===//
    var gallery = $('#js-gallery');
    //('.gallery__hero').zoom();


    //=== Gallery Object ===//
    var Gallery = {
      // zoom: function(imgContainer, img) {
      //   var containerHeight = imgContainer.outerHeight(),
      //   src = img.attr('src');

      // },
      switch: function(trigger, imgContainer) {
        var src = trigger.attr('href'),
          thumbs = trigger.siblings(),
          img = trigger.parent().prev().children();

        // Add active class to thumb
        trigger.addClass('is-active');

        // Remove active class from thumbs
        thumbs.each(function() {
          if ($(this).hasClass('is-active')) {
            $(this).removeClass('is-active');
          }
        });


        // Switch image source
        img.attr('src', src);
      }
    };

    //=== Public Methods ===//
    function init() {


      // Listen for clicks on anchors within gallery
      gallery.delegate('a', 'click', function(event) {
        var trigger = $(this);
        var triggerData = trigger.data("gallery");

        if (triggerData === 'zoom') {
          var imgContainer = trigger.parent(),
            img = trigger.siblings();
          Gallery.zoom(imgContainer, img);
        } else if (triggerData === 'thumb') {
          var imgContainer = trigger.parent().siblings();
          Gallery.switch(trigger, imgContainer);
        } else {
          return;
        }

        event.preventDefault();
      });
    }

    //=== Make Methods Public ===//
    return {
      init: init
    };

  })();

  App.init();
</script>

@endsection

@section('content')
<section aria-label="Main content" role="main" class="product-detail">
  <div itemscope>
    <div class="shadow">
      <div class="_cont detail-top">
        <div class="cols">
          <div class="left-col mt-0">
            <div id="js-gallery" class="gallery mt-0">
              <!--Gallery Hero-->
              <div class="gallery__hero mt-0">
                <img height="500" src="{{ asset($product->productDetail->product_image) }}">
              </div>
              <!--Gallery Hero-->

              <!--Gallery Thumbs-->
              <div class="gallery__thumbs">
                @foreach($product->productDetail->productImage as $productImage)
                <a href="{{ asset($productImage->image) }}" data-gallery="thumb" class="{{ $loop->first ? 'is-active' : '' }}">
                  <img height="90" src="{{ asset($productImage->image) }}">
                </a>
                @endforeach

              </div>
              <!--Gallery Thumbs-->

            </div>
            <!--.gallery-->
          </div>
          <div class="right-col">
            <h1 itemprop="name">{{ $product->product_name }}</h1>
            <hr>
            <div itemprop="offers" itemscope>
              <meta itemprop="priceCurrency" content="TRY">
              <link itemprop="availability">
              <div class="price-shipping">
                <div class="price mt-2" id="price-preview" quickbeam="price" quickbeam-price="800">
                  {{ round((float)$product->price - ((float)$product->price * (float)$product->discount / 100),2) }} TL

                </div>

              </div>
              <!--   <div class="mt-2"> -->

              <!--     </div> -->

              <div class="mt-2">
                1 - 3 iş gün içerisinde kargoya verilir.
              </div>
              <form id="AddToCartForm" method="POST" action="{{ route('shop.shoppingcart.product.add') }}">
                @CSRF

                <div class="col-md-6 form-group clearfix">
                  <div class="header">BEDEN :</div>
                  <select name="size" id="size" class="form-control mt-2" required="">
                    <option value="">Lütfen Beden Seçiniz</option>
                    @foreach($product->bodies as $size)
                    <option value="{{ $size->size }}">{{ $size->size }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6 form-group clearfix">
                  <div class="header">RENK :</div>
                  <select name="color" id="color" class="form-control mt-2" required="">
                    <option value="">Lütfen Renk Seçiniz</option>
                    @foreach($product->colors as $color)
                    <option value="{{ $color->color }}">{{ $color->color }}</option>
                    @endforeach
                  </select>
                </div>
                <hr>
                <div class="btn-and-quantity-wrap mt-2">
                  <div class="btn-and-quantity">
                    <div class="spinner form-group">
                      <span class="btn minus" data-id="2721888517" id="minus"></span>
                      <input type="text" id="updates_2721888517" name="quantity" value="1" class="quantity-selector">
                      <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                      <span class="q">Adet</span>
                      <span class="btn plus" data-id="2721888517" id="plus"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">

                      Sepete Ekle
                    </button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>


    @endsection