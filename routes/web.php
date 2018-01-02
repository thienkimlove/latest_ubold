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

});

