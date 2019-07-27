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

Route::get('/','FrontendController@index')->name('index');
Route::get('/product/{id}','FrontendController@singlePage')->name('product.single');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

Route::post('cart/add','ShopingController@add_to_cart')->name('cart.add');
Route::get('cart','ShopingController@cart')->name('cart');
Route::get('cart/destroy/{id}','ShopingController@cart_delete')->name('cart.delete');
Route::get('cart/incr/{id}/{qty}','ShopingController@cart_incr')->name('cart.incr');
Route::get('cart/dcr/{id}/{qty}','ShopingController@cart_dcr')->name('cart.dcr');

Route::get('cart/rapid/{id}','ShopingController@rapidAdd')->name('rapid.add');

Route::get('checkout','CheckoutController@index')->name('checkout.index');
Route::post('checkout','CheckoutController@store')->name('checkout.store');
