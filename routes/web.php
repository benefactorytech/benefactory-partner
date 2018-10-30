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
//Auth::routes();

//Authentication routes
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkResetForm')->name('password.request');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/', 'FrontendController@index');
Route::get('/card-payment', 'HomeController@cardPayment');
Route::post('/stripe/charge', 'StripeController@charge');

//load view for retailer information
Route::get('/userinformation/{country_id}/agreement', 'AdminController@agreement');
Route::post('/userinformation/{country_id}/agreement', 'AdminController@acceptedagreement');
Route::get('/userinformation/create', 'AdminController@create');
Route::post('/userinformation/register', 'AdminController@registerRetailer');
Route::get('/loginlayout', 'HomeController@loginlayout');
Route::get('/dashboardlayout', 'HomeController@dashboardlayout');
