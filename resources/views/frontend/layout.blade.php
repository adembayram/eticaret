<!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $settings->title }}</title>
        <meta name="author" content="{{ $settings->author }}">
        <meta name="description" content="{{ $settings->description }}">
        <meta name="keywords" content="{{ $settings->seo_key }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- All CSS is here
     ============================================ -->

     <link rel="stylesheet" href="{{asset('dist/')}}/css/vendor/bootstrap.min.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/vendor/signericafat.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/vendor/cerebrisans.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/vendor/simple-line-icons.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/vendor/elegant.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/vendor/linear-icon.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/plugins/nice-select.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/plugins/easyzoom.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/plugins/slick.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/plugins/animate.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/plugins/magnific-popup.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/plugins/jquery-ui.css">
     <link rel="stylesheet" href="{{asset('dist/')}}/css/style.css">

     <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="{{asset('dist/')}}/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="{{asset('dist/')}}/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="{{asset('dist/')}}/css/style.min.css"> -->
    @yield('css')
</head>

<body>

    <div class="main-wrapper">
        <header class="header-area">
            <div class="header-large-device section-padding-2">
                @if($settings->banner_enable)
                <div class="header-top header-top-ptb-3 bg-black">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-3">
                                <div class="header-quick-contect">
                                    <ul>
                                        <li><i class="icon-phone "></i> {{ $settings->mobile }}</li>
                                        <li><i class="icon-envelope-open "></i> {{ $settings->mail }} </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="header-offer-wrap-3 text-center">
                                    <p class="text-danger">{{ $settings->banner_text }} @isset($settings->banner_link) {!! '<a href="'.$settings->banner_link.'">DAHA FAZLA</a>' !!} @endisset</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="header-top-right">
                                    <div class="social-hm4-wrap">
                                        <span>Takip Et</span>
                                        <div class="social-style-1 social-style-1-white">
                                            @isset($settings->social_twitter)
                                            <a href="{{ $settings->social_twitter }}"><i class="icon-social-twitter"></i></a>
                                            @endisset

                                            @isset($settings->social_twitter)
                                            <a href="{{ $settings->social_facebook }}"><i class="icon-social-facebook"></i></a>
                                            @endisset

                                            @isset($settings->social_twitter)
                                            <a href="{{ $settings->social_instagram }}"><i class="icon-social-instagram"></i></a>
                                            @endisset

                                            @isset($settings->social_twitter)
                                            <a href="{{ $settings->social_youtube }}"><i class="icon-social-youtube"></i></a>
                                            @endisset


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="header-bottom">
                    <div class="container-fluid">
                        <div class="border-bottom-6">
                            <div class="row align-items-center">
                                <div class="col-xl-3 col-lg-2">
                                    <div class="logo">
                                        <a href="{{ route('index') }}"><img width="250" src="{{asset('dist/')}}/images/logo.png" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-7">
                                    <div class="main-menu main-menu-padding-1 main-menu-lh-3 main-menu-hm4 main-menu-center">
                                        <nav>
                                            <ul>
                                                <li><a href="{{ route('index') }}">Anasayfa</a></li>



                                                @foreach($menus as $menu)

                                                <li><a href="javascript:;">{{ $menu->name }} </a>
                                                    <ul class="mega-menu-style mega-menu-mrg-1">
                                                        <li>
                                                            <ul>
                                                                @foreach($menu->baseCategory as $baseCategory)
                                                                <li>
                                                                    <a class="dropdown-title" href="javascript:;">{{ $baseCategory->name }}</a>
                                                                    <ul>
                                                                        @foreach($baseCategory->category as $category)
                                                                        <li><a href="{{ route('shop.index',$category->slug) }}">{{ $category->name }}</a></li>     
                                                                        @endforeach                                                                   
                                                                    </ul>
                                                                </li>

                                                                @endforeach


                                                            </ul>
                                                        </li>

                                                        <li></li>
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="header-action header-action-flex header-action-mrg-right">
                                        <div class="same-style-2 header-search-1">
                                            <a class="search-toggle" href="#">
                                                <i class="icon-magnifier s-open"></i>
                                                <i class="icon_close s-close"></i>
                                            </a>
                                            <div class="search-wrap-1">
                                                <form action="{{ route('shop.product.search') }}" method="POST">
                                                    @csrf
                                                    <input type="text" name="search" value="{{ Request::is('shop.product.search') ? old('search') : '' }}" placeholder="Ara">
                                                    <button class="button-search"><i class="icon-magnifier"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{route('shop.user.profile.index')}}"><i class="icon-user"></i></a>
                                        </div>


                                        <div class="same-style-2 same-style-2-font-inc">
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                                @CSRF
                                                <a href="javascript:;" id="logout-submit"><i class="icon-logout"></i></a>
                                            </form>
                                        </div>

                                        @else
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{route('login')}}"><i class="icon-user"></i></a>
                                        </div>
                                        @endif



                                        <div class="same-style-2 same-style-2-font-inc header-cart">
                                            <a href="{{ route('shop.shoppingcart.index') }}">
                                                <i class="icon-basket-loaded"></i> @if(ShoppingCart::countRows() > 0) <span class="pro-count black">{{ShoppingCart::countRows()}}</span> @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-small-device small-device-ptb-1 border-bottom-2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo">

                                <a href="{{ route('index') }}"><img width="150" src="{{asset('dist/')}}/images/logo.png" alt="logo"></a>
                                
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="{{route('shop.user.profile.index')}}"><i class="icon-user"></i></a>
                                </div>


                                <div class="same-style-2 same-style-2-font-inc">
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                        @CSRF
                                        <a href="javascript:;" id="logout-submit"><i class="icon-logout"></i></a>
                                    </form>
                                </div>

                                @else
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="{{route('login')}}"><i class="icon-user"></i></a>
                                </div>
                                @endif
                                
                                <div class="same-style-2 same-style-2-font-inc header-cart">
                                    <a href="{{ route('shop.shoppingcart.index') }}" class="card-active">
                                        <i class="icon-basket-loaded"></i> @if(ShoppingCart::countRows() > 0) <span class="pro-count black">{{ShoppingCart::countRows()}}</span> @endif
                                    </a>
                                </div>
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- mobile header start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
                    <div class="header-offer-wrap-3 mobile-header-padding-border-4 text-center">
                     <p class="text-dark">{{ $settings->banner_text }} @isset($settings->banner_link) {!! '<a class="text-dark" href="'.$settings->banner_link.'">DAHA FAZLA</a>' !!} @endisset</p>

                 </div>
                 <div class="mobile-search mobile-header-padding-border-1">
                    <form action="{{ route('shop.product.search') }}" method="POST">
                        @csrf
                        <input type="text" name="search" value="{{ Request::is('shop.product.search') ? old('search') : '' }}" placeholder="Ara">
                        <button class="button-search"><i class="icon-magnifier"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-padding-border-2">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                              <li><a href="{{ route('index') }}">Anasayfa</a></li>

                            @foreach($menus as $menu)
                            <li class="menu-item-has-children "><a href="javascript:;">{{ $menu->name }}</a>
                                <ul class="dropdown">
                                    @foreach($menu->baseCategory as $baseCategory)
                                    <li class="menu-item-has-children"><a href="javascript:;">{{ $baseCategory->name }}</a>
                                        <ul class="dropdown">
                                           @foreach($baseCategory->category as $category)
                                           
                                           <li><a href="{{ route('shop.index',$category->slug) }}">{{ $category->name }}</a></li>

                                           @endforeach

                                       </ul>
                                   </li>
                                   @endforeach
                               </ul>
                           </li>
                           @endforeach
                       </ul>
                   </nav>
                   <!-- mobile menu end -->
               </div>

           </div>
       </div>
   </div>

   @if($errors->any())
   <br>
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@if(session('success'))
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    </div>
</div>
@endif


@yield('content')


<<footer class="footer-area pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact-info-wrap">
                    <div class="footer-logo">
                        <a href="#"><img src="{{asset('dist/')}}/images/logo.png" alt="logo"></a>
                    </div>

                    <div class="single-contact-info">
                        <span>Adres</span>
                        <p>{{ $settings->address }}</p>
                    </div>
                    <div class="single-contact-info">
                        <span>Telefon:</span>
                        <p>{{ $settings->mobile }}</p>
                        <p>{{ $settings->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="footer-right-wrap">

                    <div class="social-style-2 social-style-2-hover-black social-style-2-mrg">
                        @isset($settings->social_twitter)
                        <a href="{{ $settings->social_twitter }}"><i class="icon-social-twitter"></i></a>
                        @endisset

                        @isset($settings->social_twitter)
                        <a href="{{ $settings->social_facebook }}"><i class="icon-social-facebook"></i></a>
                        @endisset

                        @isset($settings->social_twitter)
                        <a href="{{ $settings->social_instagram }}"><i class="icon-social-instagram"></i></a>
                        @endisset

                        @isset($settings->social_twitter)
                        <a href="{{ $settings->social_youtube }}"><i class="icon-social-youtube"></i></a>
                        @endisset
                    </div>
                    <div class="copyright">
                        <p>Copyright © 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

    <!-- All JS is here
        ============================================ -->

        <script src="{{asset('dist/')}}/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{asset('dist/')}}/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="{{asset('dist/')}}/js/vendor/jquery-migrate-3.3.0.min.js"></script>
        <script src="{{asset('dist/')}}/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/slick.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/jquery.syotimer.min.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/jquery.instagramfeed.min.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/jquery.nice-select.min.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/wow.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/jquery-ui-touch-punch.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/jquery-ui.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/magnific-popup.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/sticky-sidebar.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/easyzoom.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/scrollup.js"></script>
        <script src="{{asset('dist/')}}/js/plugins/ajax-mail.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above  
<script src="{{asset('dist/')}}/js/vendor/vendor.min.js"></script>
<script src="{{asset('dist/')}}/js/plugins/plugins.min.js"></script>  -->
<!-- Main JS -->
<script src="{{asset('dist/')}}/js/main.js"></script>
@yield('js')

<script>
    $(document).ready(function() {

        $('#logout-submit').click(function() {

            $('#logout-form').submit();

        });

    });
</script>
</body>

</html>