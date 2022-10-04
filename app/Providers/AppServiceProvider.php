<?php

namespace App\Providers;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*',function($view){
            $view->with([
                'blog_count' => Blog::count(), 
                'order_count' => Order::count(),
                'product_count' => Product::count(),
                'cus_count' => Customer::count(),
                'order_new' => Order::all()->sortByDesc('created_at'),
            ]);
        });
    }
}
