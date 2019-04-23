<?php

namespace App\Providers;

use App\Article;
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
       // \DB::listen(function($query){ \Log::info($query->sql, $query->bindings); });

        \View::share('user', auth()->user());
        \View::share('categories', Category::all());
        \View::share('allArticles', Article::all());
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
