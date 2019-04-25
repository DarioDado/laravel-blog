<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Post;
use App\PostCategory;

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
        Schema::defaultStringLength(191);

        view()->composer('partials.sidebar', function($view){
            $archive = Post::selectRaw('year(created_at) as year,monthname(created_at) as month,count(*) as published')
                ->groupBy('year','month')
                ->orderByRaw('min(created_at) DESC')
                ->get();
            $view->with('archive', $archive);
        });

        view()->composer('partials.header', function($view){
            $categories = PostCategory::all();
            $view->with('categories', $categories);
        });
    }
}
