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

//------------------------------------//route frontend\\--------------------//
Route::get('/', 'Site\ProductsController@index')->name('site.products.index');
//-----------------------------------//Route cart\\-------------------------//
Route::get('/cart/add/{id?}', 'CartController@addCart')->name('cart.add');
Route::get('/cart/read', 'CartController@readCart')->name('site.carts.read');
Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');
Route::get('/cart/remove/{rowId}', 'CartController@removeCart')->name('cart.remove');

//------------------------------------------checkout----------------------------------//
Route::group(['middleware' => ['auth']], function () {
    Route::get('/site/checkout', 'Site\CheckoutController@index')->name('site.checkouts.index');
    Route::post('/site/checkout', 'Site\CheckoutController@store')->name('site.checkouts.store');

    //-----------------------------------order acount-------------------------------------//
    Route::get('/customer/home', 'Site\CustomerController@index')->name('site.products.customers.home');
    Route::get('/customer/order', 'Site\CustomerController@Order')->name('site.products.customers.order');
    Route::get('/customer/item', 'Site\CustomerController@OrderItem')->name('site.products.customers.item');
    Route::get('/customer/payment', 'Site\CustomerController@Payment')->name('site.products.customers.payment');

    //----------------------------------------acount---------------------------------------------//
    Route::get('/account/orders', 'Site\AccountController@getOrders')->name('site.pages.account.orders');
});

Auth::routes();
require 'admin.php';
