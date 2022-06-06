<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use function foo\func;

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
        view()->composer('frontend.components.sidebar',function($view)
        {
           $view->with('categorys',Category::all());
        });
    }
}
