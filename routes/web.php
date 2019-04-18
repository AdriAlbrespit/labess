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

Route::get('hello', function () {
    return 'Hello world';
});

Route::resource('contacts', 'contactsController');

Auth::routes();

Route::group(['middleware' => ['admin']], function() {
    Route::get('admin/routes', 'HomeController@admin');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','HomeController@logout');

//Route::post('/store', 'contactsController@store');

	//Routes pour le paiement par subscription
//Pour obtenir le plan ID, a utiliser une fois au début.
//Route::get('create_paypal_plan', 'PaypalController@create_plan');
Route::get('/subscribe/paypal', 'PaypalController@paypalRedirect')->name('paypal.redirect');
Route::get('/subscribe/paypal/return', 'PaypalController@paypalReturn')->name('paypal.return');


Route::get('enfants', function () {
    return view('enfants');
});

Route::get('param', function () {
    return view('param');
});