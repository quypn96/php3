<?php

namespace App\Providers;

use App\Model\Categories;
use App\Model\Post;
use Illuminate\Support\Facades\View;
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
        View::composer('_share.index.header', function ($view) {
            $menus = Categories::all();
            $view->with('menus', $menus);
        });

        View::composer('customize.index.content-post-views-max', function ($view) {
            $postViewMax = Post::orderBy('count_view','DESC')->take(2)->get();
            $view->with('postViewMax', $postViewMax);
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
