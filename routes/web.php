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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer_home', 'HomeController@customer')->name('customer_home')->middleware('role:customer');
Route::get('/service_home', 'HomeController@service')->name('service_home')->middleware('role:service_pro');

Route::resource('services', 'ServiceController');

Route::put('/services/completeService/{service}', 'ServiceController@complete')->middleware('role:service_pro');

