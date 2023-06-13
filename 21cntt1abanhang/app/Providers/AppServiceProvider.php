<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

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
        //
         //chia sẻ biến Session('cart'),.. cho các view header.blade.php và checkout.php
    View::composer(['layouts.header','checkout'],function($view){
        if(Session('cart')){
            $oldCart=Session::get('cart'); //session cart được tạo trong method addToCart của PageController
            $cart=new Cart($oldCart);
            $view->with(['cart'=>Session::get('cart'),'productCarts'=>$cart->items,
            'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
    });
    }
}
