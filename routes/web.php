<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryBaseController;
use App\Http\Controllers\Admin\CategoryMenuController;
use App\Http\Controllers\Admin\ProductMenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderMenuController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SliderMenuController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Models\Product;
use App\Models\Slider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// INDEX ROUTE
Route::get('/', function () {

 //$menu =  \App\Models\BaseCategory::all();

 

 $products = Product::all()->take(12);
 $sliders = Slider::where('enable_slider',1)->get();
 return view('frontend.index', compact('products','sliders'));
})->name('index');

// PAGE ROUTE
Route::get('shop/page/iptal-ve-iade',function (){

    $menus =  \App\Models\Menu::all();

    return view('frontend.page.index');
})->name('iptal.ve.iade');

Route::get('shop/page/mesafeli-satis-sozlesmesi',function(){

    return view('frontend.page.mesafeli_satis_sozlesmesi');
})->name('mesafeli.satis.sozlesmesi');

Route::get('shop/page/gizlilik-ve-guvenlik',function(){

   

    return view('frontend.page.gizlilik_ve_guvenlik');
})->name('gizlilik.ve.guvenlik');



Route::get('/cache/kxwqjxklwqjxıqwe',function (){

    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('route:cache');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('view:cache');

});

Route::group(['middleware' => ['auth:sanctum','verified'],'prefix' => 'shop'],function(){

    //CART
    Route::get('cart',[\App\Http\Controllers\Shop\ShoppingCartController::class,'index'])->name('shop.shoppingcart.index');
    Route::post('cart',[\App\Http\Controllers\Shop\ShoppingCartController::class,'product_add'])->name('shop.shoppingcart.product.add');
    Route::delete('cart/remove/{id}',[\App\Http\Controllers\Shop\ShoppingCartController::class,'removeProduct'])->name('shop.cart.remove');
    Route::delete('cart/delete',[\App\Http\Controllers\Shop\ShoppingCartController::class,'deleteProduct'])->name('shop.cart.delete');

    // PROFİLE
    Route::get('user/profile',[\App\Http\Controllers\Shop\ProfileController::class,'index'])->name('shop.user.profile.index');
    Route::put('user/profile/address/{id}',[\App\Http\Controllers\Shop\ProfileController::class,'address_update'])->name('shop.user.profile.address.update');
    Route::put('user/profile/update/{id}',[\App\Http\Controllers\Shop\ProfileController::class,'update'])->name('shop.user.profile.update');


    Route::any('order/payment',[\App\Http\Controllers\Shop\OrderController::class,'orderPost'])->name('shop.order.payment');




});
Route::post('shop/order/payment/calback',[\App\Http\Controllers\Shop\OrderController::class,'paytrCalback'])->name('shop.order.payment.paytr.calback');
Route::get('shop/order/payment/success',[\App\Http\Controllers\Shop\OrderController::class,'orderSuccess'])->name('shop.order.payment.success');
Route::get('shop/order/payment/error',[\App\Http\Controllers\Shop\OrderController::class,'orderError'])->name('shop.order.payment.error');


// PRODUCT AND CATEGORY
Route::get('shop/product/{productSlug}',[\App\Http\Controllers\Shop\ProductController::class,'product_detail'])->name('shop.product.detail');
Route::get('shop/{categorySlug}',[\App\Http\Controllers\Shop\ShopController::class,'index'])->name('shop.index');
Route::any('shop/product/search',[\App\Http\Controllers\Shop\ProductController::class,'product_search'])->name('shop.product.search');


//
//
//Route::middleware(['auth:sanctum', 'verified','isAdmin'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
//

Route::group(['middleware' => ['auth:sanctum','verified','isAdmin'],'prefix' => 'admin'],function (){

    // INDEX
    Route::get('/home',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.index');

    // CATEGORY
    Route::get('menu/category',[CategoryMenuController::class,'index'])->name('menu.category.index');
    Route::resource('basecategory',CategoryBaseController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('menu-category',MenuCategoryController::class);

    // PRODUCT
    Route::get('menu/product',[ProductMenuController::class,'index'])->name('menu.product.index');
    Route::resource('product',ProductController::class);

    // ORDER
    Route::get('menu/order',[OrderMenuController::class,'index'])->name('menu.order.index');
    Route::resource('order',OrderController::class);

    Route::get('order/print/{id}',[OrderController::class,'orderPrint'])->name('order.print');

    // SLIDER
    Route::get('menu/slider',[SliderMenuController::class,'index'])->name('menu.slider.index');
    Route::resource('slider', SliderController::class);

    // SETTING
    Route::resource('setting', SettingController::class);

});

///// API ///////////////////
///
Route::post('order/details',[\App\Http\Controllers\Shop\Api\OrderController::class,'details'])->name('api.order.details');
