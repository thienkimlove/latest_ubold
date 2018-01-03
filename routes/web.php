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
    Route::get('users.dataTables', ['uses' => 'UsersController@datatables', 'as' => 'users.dataTables']);
    Route::resource('users', 'UsersController');

    Route::get('users/{id}/permissions', ['uses' => 'UserPermissionsController@index', 'as' => 'userPermissions.index']);
    Route::put('users/{id}/permissions', ['uses' => 'UserPermissionsController@update', 'as' => 'userPermissions.update']);

    Route::get('roles/dataTables', ['uses' => 'RolesController@datatables', 'as' => 'roles.dataTables']);
    Route::resource('roles', 'RolesController');
    Route::get('roles/{id}/permissions', ['uses' => 'RolePermissionsController@index', 'as' => 'rolePermissions.index']);
    Route::put('roles/{id}/permissions', ['uses' => 'RolePermissionsController@update', 'as' => 'rolePermissions.update']);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index']]);


    Route::get('positions.dataTables', ['uses' => 'PositionsController@datatables', 'as' => 'positions.dataTables']);
    Route::resource('positions', 'PositionsController');

    Route::get('banners.dataTables', ['uses' => 'BannersController@datatables', 'as' => 'banners.dataTables']);
    Route::resource('banners', 'BannersController');

    Route::get('categories.dataTables', ['uses' => 'CategoriesController@datatables', 'as' => 'categories.dataTables']);
    Route::resource('categories', 'CategoriesController');


    Route::get('posts.dataTables', ['uses' => 'PostsController@datatables', 'as' => 'posts.dataTables']);
    Route::resource('posts', 'PostsController');

    Route::get('tags.dataTables', ['uses' => 'TagsController@datatables', 'as' => 'tags.dataTables']);
    Route::resource('tags', 'TagsController');

    Route::post('modules.add', ['uses' => 'ModulesController@add', 'as' => 'modules.add']);
    Route::post('modules.remove', ['uses' => 'ModulesController@remove', 'as' => 'modules.remove']);

    Route::get('questions.dataTables', ['uses' => 'QuestionsController@datatables', 'as' => 'questions.dataTables']);
    Route::resource('questions', 'QuestionsController');

    Route::get('videos.dataTables', ['uses' => 'VideosController@datatables', 'as' => 'videos.dataTables']);
    Route::resource('videos', 'VideosController');

    Route::get('products.dataTables', ['uses' => 'ProductsController@datatables', 'as' => 'products.dataTables']);
    Route::resource('products', 'ProductsController');

});

