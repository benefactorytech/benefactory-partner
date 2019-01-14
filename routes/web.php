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

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/', 'FrontendController@index');

//load view for retailer information
Route::get('/userinformation/{country_id}/agreement', 'AdminController@agreement');
Route::post('/userinformation/{country_id}/agreement', 'AdminController@acceptedagreement');
Route::get('/userinformation/create', 'AdminController@create');
Route::post('/userinformation/register', 'AdminController@registerRetailer');

//Customer Transaction Log
Route::get("/admin/customertransactionlog", "CustomerTransactionLogController@index");

Route::get("/admin/integrations", "IntegrationController@index");

//Payment
Route::get("/admin/payment", "PaymentController@index");
Route::get("/admin/payment/do", "PaymentController@chooseGateway");
//PayPal
Route::get("/admin/payment/do/gateway", "PaypalController@index");
Route::middleware('auth:api')->get("/admin/payment/do/gateway/paid", "PaypalController@paid");
Route::get("/admin/payment/do/gateway/history", "PaypalController@paymentHistory");

//Stripe
Route::get("/admin/payment/do/ach", "StripeController@index");
Route::post("/admin/payment/do/ach/configure", "StripeController@configure");
Route::get("/admin/payment/do/ach/complete", "StripeController@complete");


Route::get("/admin/payment/do/thankyou", "PaymentController@thankyou");
Route::get("/admin/payment/do/error", "PaymentController@error");