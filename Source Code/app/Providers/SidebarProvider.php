<?php

namespace App\Providers;

use App\Models\Modules;
use Illuminate\Support\ServiceProvider;

class SidebarProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('AdminViews.Layout.sidebar', function ($view) {
            $modules = Modules::whereNull('parent_id')->get();
            $view->with('modules', $modules);
        });

    }

}
