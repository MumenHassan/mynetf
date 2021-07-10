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
Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth','role:super_admin|admin'])
    ->group(function (){
    Route::get('/','WelcomeController@index')->name('welcome');

    //category routes
   // Route::get('categories/index','CategoryController@index');
    Route::resource('categories','CategoryController')->except(['show']);

    //Movie routes
        Route::resource('movies','MovieController');

    //role routes
    Route::resource('roles','RoleController')->except(['show']);

    //Users route
    Route::resource('users','UserController')->except(['show']);

        //Settings route
        Route::get('/settings/social_login','SettingController@social_login')->name('settings.social_login');
        Route::get('/settings/social_links','SettingController@social_links')->name('settings.social_links');
        Route::post('settings','SettingController@store')->name('settings.store');
});
