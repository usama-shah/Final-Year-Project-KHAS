<?php

namespace App\Providers;

use App\Models\Brands;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderDataProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('UserViews.Layout.Includes.header', function ($view) {
            $categories = Category::all();
            $brands = Brands::all();

            $view->with('categories', $categories);
            $view->with('brands', $brands);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
