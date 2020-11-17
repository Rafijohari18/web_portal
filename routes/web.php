<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['prefix' => 'admin'], function () {

    // user
     Route::get('/user', 'App\Http\Controllers\Admin\UsersController@index')->name('users.index');
     Route::get('/user/create', 'App\Http\Controllers\Admin\UsersController@create')->name('users.create');
     Route::post('/user/store', 'App\Http\Controllers\Admin\UsersController@store')->name('users.store');
     Route::get('/user/edit/{id}', 'App\Http\Controllers\Admin\UsersController@edit')->name('users.edit');
     Route::put('user/update/{id}', 'App\Http\Controllers\Admin\UsersController@update')->name('users.update');
     Route::put('user/status/{id}', 'App\Http\Controllers\Admin\UsersController@status')->name('users.status');
     Route::get('user/delete/{id}', 'App\Http\Controllers\Admin\UsersController@destroy')->name('users.destroy');
     Route::get('user/profile', 'App\Http\Controllers\Admin\UsersController@profile')->name('users.profile');
     Route::post('user/update-profile/{id}', 'App\Http\Controllers\Admin\UsersController@updateProfile')->name('users.update-profile');
     Route::put('user/change-photo/{id}', 'App\Http\Controllers\Admin\UsersController@changePhoto')->name('users.change-photo');
     Route::put('user/remove-photo/{id}', 'App\Http\Controllers\Admin\UsersController@removePhoto')->name('users.remove-photo');
    
     //roles
    Route::get('/roles', 'App\Http\Controllers\Admin\RolesController@index')->name('roles.index');
    Route::get('/roles/create', 'App\Http\Controllers\Admin\RolesController@create')->name('roles.create');
    Route::post('/roles/store', 'App\Http\Controllers\Admin\RolesController@store')->name('roles.store');
    Route::get('roles/{id}/edit', 'App\Http\Controllers\Admin\RolesController@edit')->name('roles.edit');
    Route::put('roles/{id}/update', 'App\Http\Controllers\Admin\RolesController@update')->name('roles.update');
    Route::get('roles/delete/{id}', 'App\Http\Controllers\Admin\RolesController@destroy')->name('roles.destroy');
    

    #--permission
    Route::get('/permission', 'App\Http\Controllers\Admin\PermissionController@index')->name('permission.index');
    Route::get('permission/create', 'App\Http\Controllers\Admin\PermissionController@create')->name('permission.create');
    Route::post('permission/store', 'App\Http\Controllers\Admin\PermissionController@store')->name('permission.store');
    Route::get('permission/{id}/edit', 'App\Http\Controllers\Admin\PermissionController@edit')->name('permission.edit');
    Route::put('permission/update/{id}', 'App\Http\Controllers\Admin\PermissionController@update')->name('permission.update');
    Route::get('permission/delete/{id}', 'App\Http\Controllers\Admin\PermissionController@destroy')->name('permission.destroy');

    #--role has permission  
    Route::get('/role-has-permission', 'App\Http\Controllers\Admin\RoleHasPermissionController@index')->name('role-has-permission.index');
    Route::get('role-has-permission/create', 'App\Http\Controllers\Admin\RoleHasPermissionController@create')->name('role-has-permission.create');
    Route::post('role-has-permission/store', 'App\Http\Controllers\Admin\RoleHasPermissionController@store')->name('role-has-permission.store');
    Route::get('role-has-permission/{id}/edit', 'App\Http\Controllers\Admin\RoleHasPermissionController@edit')->name('role-has-permission.edit');
    Route::put('role-has-permission/update/{id}', 'App\Http\Controllers\Admin\RoleHasPermissionController@update')->name('role-has-permission.update');
    Route::get('role-has-permission/delete/{id}', 'App\Http\Controllers\Admin\RoleHasPermissionController@destroy')->name('role-has-permission.destroy');


    });
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Cache Cleared';
});