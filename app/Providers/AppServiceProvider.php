<?php

namespace App\Providers;

//use App\Models\Category;
//use App\Models\Order;
//use App\Models\Product;
use App\Models\Setting;
use App\Models\Menu;
//use App\Models\User;
//use Illuminate\Filesystem\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()


    
    {

        Paginator::useBootstrap();
        
        /*
        $settings = Setting::first();
        $menus = Menu::all();
        
         view()->share(compact('settings','menus'));
        */




    }
}
