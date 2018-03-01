<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('login', 'BasicController@redirectToSSO')->name('login');
Route::get('logout', ['uses' => 'BasicController@logout', 'as' => 'logout']);
Route::get('callback', 'BasicController@handleSSOCallback')->name('callback');
Route::get('notice', 'BasicController@notice')->name('notice');

Route::group(['middleware' => 'acl'], function() {

    Route::get('/admin', 'BasicController@index')->name('index');
    Route::post('ajax', 'BasicController@ajax')->name('ajax');
    // User & Roles
    Route::get('users.dataTables', ['uses' => 'UsersController@dataTables', 'as' => 'users.dataTables']);
    Route::resource('users', 'UsersController');

    Route::get('users/{id}/permissions', ['uses' => 'UserPermissionsController@index', 'as' => 'userPermissions.index']);
    Route::put('users/{id}/permissions', ['uses' => 'UserPermissionsController@update', 'as' => 'userPermissions.update']);

    Route::get('roles/dataTables', ['uses' => 'RolesController@dataTables', 'as' => 'roles.dataTables']);
    Route::resource('roles', 'RolesController');
    Route::get('roles/{id}/permissions', ['uses' => 'RolePermissionsController@index', 'as' => 'rolePermissions.index']);
    Route::put('roles/{id}/permissions', ['uses' => 'RolePermissionsController@update', 'as' => 'rolePermissions.update']);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index']]);


    Route::get('positions.dataTables', ['uses' => 'PositionsController@dataTables', 'as' => 'positions.dataTables']);
    Route::resource('positions', 'PositionsController');

    Route::get('banners.dataTables', ['uses' => 'BannersController@dataTables', 'as' => 'banners.dataTables']);
    Route::resource('banners', 'BannersController');

    Route::get('categories.dataTables', ['uses' => 'CategoriesController@dataTables', 'as' => 'categories.dataTables']);
    Route::resource('categories', 'CategoriesController');


    Route::get('posts.dataTables', ['uses' => 'PostsController@dataTables', 'as' => 'posts.dataTables']);
    Route::get('posts.approve/{id}', ['uses' => 'PostsController@approve', 'as' => 'posts.approve']);
    Route::resource('posts', 'PostsController');

    Route::get('tags.dataTables', ['uses' => 'TagsController@dataTables', 'as' => 'tags.dataTables']);
    Route::resource('tags', 'TagsController');

    Route::post('modules.add', ['uses' => 'ModulesController@add', 'as' => 'modules.add']);
    Route::post('modules.remove', ['uses' => 'ModulesController@remove', 'as' => 'modules.remove']);

    Route::get('questions.dataTables', ['uses' => 'QuestionsController@dataTables', 'as' => 'questions.dataTables']);
    Route::get('questions.approve/{id}', ['uses' => 'QuestionsController@approve', 'as' => 'questions.approve']);
    Route::resource('questions', 'QuestionsController');

    Route::get('videos.dataTables', ['uses' => 'VideosController@dataTables', 'as' => 'videos.dataTables']);
    Route::get('videos.approve/{id}', ['uses' => 'VideosController@approve', 'as' => 'videos.approve']);
    Route::resource('videos', 'VideosController');

    Route::get('products.dataTables', ['uses' => 'ProductsController@dataTables', 'as' => 'products.dataTables']);

    Route::get('products.approve/{id}', ['uses' => 'ProductsController@approve', 'as' => 'products.approve']);

    Route::resource('products', 'ProductsController');

    Route::get('stores.dataTables', ['uses' => 'StoresController@dataTables', 'as' => 'stores.dataTables']);
    Route::resource('stores', 'StoresController');

    Route::get('orders.dataTables', ['uses' => 'OrdersController@dataTables', 'as' => 'orders.dataTables']);
    Route::get('orders.export', 'OrdersController@export')->name('orders.export');

    Route::resource('orders', 'OrdersController');

    Route::get('contacts.dataTables', ['uses' => 'ContactsController@dataTables', 'as' => 'contacts.dataTables']);

    Route::get('contacts.export', 'ContactsController@export')->name('contacts.export');


    Route::resource('contacts', 'ContactsController');

    Route::get('settings.dataTables', ['uses' => 'SettingsController@dataTables', 'as' => 'settings.dataTables']);
    Route::resource('settings', 'SettingsController');

});


#frontend

if (env('DB_DATABASE') == 'cagaileo') {
    Route::get('/', 'CLController@index')->name('frontend.index');
    Route::get('lien-he', 'CLController@contact')->name('frontend.contact');
    Route::get('video/{value?}', 'CLController@video')->name('frontend.video');
    Route::get('phan-phoi/{slug?}', 'CLController@delivery')->name('frontend.delivery');

    Route::post('saveContact', 'CLController@saveContact')->name('frontend.saveContact');
    Route::post('saveOrder', 'CLController@saveOrder')->name('frontend.saveOrder');
    Route::get('tag/{value}', 'CLController@tag')->name('frontend.tag');
    Route::get('search', 'CLController@search')->name('frontend.search');
    Route::get('product/{value?}', 'CLController@product')->name('frontend.product');
    Route::get('cau-hoi-thuong-gap/{value?}', 'CLController@question')->name('frontend.question');


    Route::get('sitemap_index.xml', 'CLController@sitemap');

    foreach (config('system.sitemap.'.env('DB_DATABASE')) as $content) {
        Route::get('sitemap_'.$content.'.xml', 'CLController@sitemap_'.$content);
    }



    Route::get('/ajaxStore', 'CLController@ajaxStore')->name('frontend.ajaxStore');
    Route::get('{value}', 'CLController@main')->name('frontend.main');
} else if (env('DB_DATABASE') == 'newkien') {
    Route::get('/', 'NKController@index')->name('frontend.index');
    Route::get('lien-he', 'NKController@contact')->name('frontend.contact');
    Route::get('video/{value?}', 'NKController@video')->name('frontend.video');
    Route::get('phan-phoi/{slug?}', 'NKController@delivery')->name('frontend.delivery');

    Route::post('saveContact', 'NKController@saveContact')->name('frontend.saveContact');
    Route::post('saveOrder', 'NKController@saveOrder')->name('frontend.saveOrder');
    Route::get('tag/{value}', 'NKController@tag')->name('frontend.tag');
    Route::get('search', 'NKController@search')->name('frontend.search');
    Route::get('product/{value?}', 'NKController@product')->name('frontend.product');
    Route::get('cau-hoi-thuong-gap/{value?}', 'NKController@question')->name('frontend.question');


    Route::get('sitemap_index.xml', 'NKController@sitemap');

    foreach (config('system.sitemap.'.env('DB_DATABASE')) as $content) {
        Route::get('sitemap_'.$content.'.xml', 'NKController@sitemap_'.$content);
    }



    Route::get('/ajaxStore', 'NKController@ajaxStore')->name('frontend.ajaxStore');
    Route::get('{value}', 'NKController@main')->name('frontend.main');
}
