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
    Route::resource('/orders', 'OrdersController');
    Route::get('search/etels', 'EtelController@search')->name('etels.search');
    Route::get('search/users', 'UsersController@search')->name('users.search');
    Route::get('search/orders', 'OrdersController@search')->name('orders.search');

    Route::get('orders/{order}/confirm', 'OrdersController@confirm')->name('orders.confirm');
    Route::post('orders/{order}/finalConfirm', 'OrdersController@finalConfirm')->name('orders.finalConfirm');

    Route::get('/dashboard', 'DashboardController@index');
});

Route::get('/etlap', 'EtlapController@index')->name('etlap.index');
Route::get('/etlap/{kategoria}', 'EtlapController@show')->name('etlap.show');

Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/update', 'ProfileController@update')->name('profile.update');

Route::resource('/kosar', 'KosarController');
Route::name('kosar.')->group(function(){
    Route::post('/kosar/add', 'KosarController@add')->name('add');
    Route::post('/kosar/empty', 'KosarController@empty')->name('empty');
    Route::post('/kosar/delete', 'KosarController@delete')->name('delete');
    Route::post('/kosar/numInc', 'KosarController@numInc')->name('numInc');
    Route::post('/kosar/numDesc', 'KosarController@numDesc')->name('numDesc');
});

Route::post('/rendeles/add', 'RendelesekController@add')->name('rendeles.add');

//Email előnézet tesztelés
Route::get('/email/welcome', function (){
   return new \App\Mail\WelcomeMail(new App\User);
})->middleware('can:admin');
