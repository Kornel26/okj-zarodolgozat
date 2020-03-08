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
    Route::get('search/etels', 'EtelController@search')->name('etels.search');
    Route::get('search/users', 'UsersController@search')->name('users.search');

    Route::get('/dashboard', 'DashboardController@index');
});

Route::get('/etlap', 'EtlapController@index')->name('etlap.index');
Route::get('/etlap/{kategoria}', 'EtlapController@show')->name('etlap.show');

Route::get('/profile', 'ProfileController@index')->name('profile.index');

Route::resource('/kosar', 'KosarController');
Route::post('/kosar/add', 'KosarController@add')->name('kosar.add');
Route::post('/kosar/empty', 'KosarController@empty')->name('kosar.empty');
Route::post('/kosar/delete', 'KosarController@delete')->name('kosar.delete');
Route::post('/kosar/numInc', 'KosarController@numInc')->name('kosar.numInc');
Route::post('/kosar/numDesc', 'KosarController@numDesc')->name('kosar.numDesc');
