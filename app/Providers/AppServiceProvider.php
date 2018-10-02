<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;
use View;
use DB;
use Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function($view) {
            $view->with('search_categories', \App\Category::categories());
            $view->with('companies_all', \App\Company::all());
            $view->with('subcategories_all', \App\Subcategory::all());
            $view->with('categories_all', \App\Category::all());
            $view->with('search_cities', \App\City::cities());

        });
        view()->composer('layouts.navbar', function($view){
            $navs = DB::table('xe_menu_item')->where('menu_srl', 62)->get();

            $view->with('navs', $navs);
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

        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }

    }
}
