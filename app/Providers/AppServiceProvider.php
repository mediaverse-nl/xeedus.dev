<?php

namespace App\Providers;

use App\Category;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $categories = Category::where('cate_id', 0)->get();
//
//        view()->share('categories', $categories);

        view()->composer('layouts.app', function($view)
        {
            $view->with('categories', Category::where('cate_id', 0)->get());
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
    }
}
