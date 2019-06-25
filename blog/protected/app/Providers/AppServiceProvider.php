<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\Catalog;
use App\Models\Goods;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\User;
use App\Models\BillDetail;
use App\Models\CatalogDetail;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Frontend
        view()->composer(['Frontend::layouts.menu','Frontend::layouts.danhmuc','Frontend::layouts.specialproducts'],function($view){
            $catalog_item = Catalog::all();
            $catalog_detail = CatalogDetail::all();
            $goods_special = Goods::where('discount','<>',0)->get();
            $view->with(['catalog_item'=>$catalog_item,'catalog_detail'=>$catalog_detail,'goods_special'=>$goods_special]);
        });
        view()->composer(['Frontend::layouts.header','Frontend::cart','Frontend::checkout'],function($view){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
            $view->with(['cart'=>Session::get('cart'),'product'=>$cart->item,'cost'=>$cart->cost,'amounts'=>$cart->amounts]);
        });
        //Backend
        view()->composer(['Backend::layouts.danhmuc'], function($view){
            $catalog_detail = CatalogDetail::all();
            $catalog_item = Catalog::all();
            $bill = Bill::all();
            $user = User::all();
            $view->with(['catalog_item'=>$catalog_item,'catalog_detail'=>$catalog_detail,'bill'=>$bill,'user'=>$user]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->app->bind('path.public', function () {
        //     $p = base_path();
        //     $arr = explode(DIRECTORY_SEPARATOR, $p);
        //     array_pop($arr);
            
        //     return implode(DIRECTORY_SEPARATOR, $arr);
        // });
    }
}
