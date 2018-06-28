<?php

namespace App\Providers;

use App\Lib\Helpers;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Models\Question;
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
        if (env('ENABLE_SORT_MENU')) {
            $parentCategories = Category::whereNull('parent_id')->orderBy('sort_menu', 'asc')->get();
        } else {
            $parentCategories = Category::whereNull('parent_id')->get();
        }

        $rightNormalQuestionIds = Helpers::getModuleValues('questions', 'right_normal');
        $rightNormalQuestions = Question::whereIn('id', $rightNormalQuestionIds)
            ->publish()
            ->limit(6)
            ->get();


        $rightNormalVideoIds = Helpers::getModuleValues('videos', 'right');
        $rightNormalVideos = Video::whereIn('id', $rightNormalVideoIds)
            ->publish()
            ->limit(6)
            ->get();

        $rightIndexVideoIds = Helpers::getModuleValues('videos', 'right_index');
        $rightIndexVideos = Video::whereIn('id', $rightIndexVideoIds)
            ->publish()
            ->limit(6)
            ->get();

        $rightNormalPostIds = Helpers::getModuleValues('posts', 'right');
        $rightNormalPosts = Post::whereIn('id', $rightNormalPostIds)
            ->publish()
            ->limit(6)
            ->get();


        $rightIndexPostIds = Helpers::getModuleValues('posts', 'right_index');
        $rightIndexPosts = Post::whereIn('id', $rightIndexPostIds)
            ->publish()
            ->limit(6)
            ->get();



        $headerIndexBanners = Banner::publish()->whereHas('position', function($q) {
            $q->where('name', 'header_index');
        })->get();
        $sliderLeftBanners = Banner::publish()->whereHas('position', function($q){
            $q->where('name', 'slide_index_left');
        })->get();
        $rightBanners = Banner::publish()->whereHas('position', function($q) {
            $q->where('name', 'right');
        })->get();
        $rightIndexBanners = Banner::publish()->whereHas('position', function($q) {
            $q->where('name', 'right_index');
        })->get();
        $middleIndexBanner = Banner::publish()->whereHas('position', function($q){
            $q->where('name', 'middle_index');
        })->get();

        $middleNormalBanner = Banner::publish()->whereHas('position', function($q){
            $q->where('name', 'middle_normal');
        })->get();

        $belowProductBanner = Banner::publish()
            ->whereHas('position', function($q) {
                $q->where('name', 'below_product_index');
            })
            ->get();

        $advProduct = Banner::publish()->whereHas('position', function($q){
            $q->where('name', 'top_product_detail');
        })->get();


        View::share('headerCategories', $parentCategories);
        View::share('footerCategories', $parentCategories);
        View::share('headerIndexBanners', $headerIndexBanners);

        View::share('rightNormalVideos', $rightNormalVideos);
        View::share('rightIndexVideos', $rightIndexVideos);

        View::share('rightBanners', $rightBanners);
        View::share('rightIndexBanners', $rightIndexBanners);
        View::share('middleIndexBanner', $middleIndexBanner);
        View::share('belowProductBanner', $belowProductBanner);
        View::share('middleNormalBanner', $middleNormalBanner);
        View::share('advProduct', $advProduct);
        View::share('sliderLeftBanners', $sliderLeftBanners);
        View::share('rightNormalQuestions', $rightNormalQuestions);
        View::share('rightNormalPosts', $rightNormalPosts);
        View::share('rightIndexPosts', $rightIndexPosts);
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
