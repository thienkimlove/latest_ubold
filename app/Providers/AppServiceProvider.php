<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('DB_DATABASE') == 'cagaileo') {
            $headerIndexBanners = Banner::where('status', true)->whereHas('position', function($q) {
                $q->where('name', 'header_index');
            })->get();

            $parentCategories = Category::whereNull('parent_id')->get();

            $featureVideos = Video::latest('updated_at')->limit(4)->get();

            $rightNews = Post::where('status', true)->latest('updated_at')->limit(3)->get();

            $rightBanners = Banner::where('status', true)->whereHas('position', function($q) {
                $q->where('name', 'right');
            })->get();


            View::share('headerCategories', $parentCategories);
            View::share('footerCategories', $parentCategories);
            View::share('headerIndexBanners', $headerIndexBanners);
            View::share('featureVideos', $featureVideos);
            View::share('rightNews', $rightNews);
            View::share('rightBanners', $rightBanners);
        }
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
