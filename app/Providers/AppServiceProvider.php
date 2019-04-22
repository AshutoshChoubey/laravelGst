<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\HeaderLink;
// use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         // $header_link =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();
         // View::share('header_link' , $header_link);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
