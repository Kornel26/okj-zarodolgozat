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

Route::get('/', 'FooldalController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function(){
    Route::resource('/users', 'UsersController');
    Route::resource('/roles', 'RolesController');
    Route::resource('/etels', 'EtelController');
    Route::get('/search', 'EtelController@search')->name('etels.search');

    Route::get('/dashboard', 'DashboardController@index');
});

Route::get('/etlap', 'EtlapController@index')->name('etlap.index');
Route::get('/etlap/{kategoria}', 'EtlapController@show')->name('etlap.show');

Route::get('/profile', 'ProfileController@index')->name('profile.index');