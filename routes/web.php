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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/card-payment', 'HomeController@cardPayment');
Route::post('/stripe/charge', 'StripeController@charge');

Route::get('/loginlayout', 'HomeController@loginlayout');
Route::get('/dashboardlayout', 'HomeController@dashboardlayout');
