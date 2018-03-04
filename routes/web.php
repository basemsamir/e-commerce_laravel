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
/* Home routes */
Route::get('/', 'HomeController@index')->name('home');
Route::get('auth', 'HomeController@show_auth')->name('home.auth')->middleware('guest');
Route::get('events', 'HomeController@show_events')->name('home.events');
Route::get('bestdeals', 'HomeController@show_bestdeals')->name('home.bestdeals');
Route::get('services', 'HomeController@show_services')->name('home.services');
Route::get('contactus', 'HomeController@show_contactUS')->name('home.contactus');
Route::post('contactus', 'HomeController@send_mail')->name('home.contactus');
Route::get('category/{id}','HomeController@show_category')->name('category.show');
/* Auth routes */
Route::auth();
/* Product routes */
Route::resource('product','ProductController');
Route::post('/', 'ProductController@search_product')->name('home.searchProduct');
/* Cart routes */
Route::get('cart', 'CartController@index')->name('cart.index');
//Route::get('cart/add/{product_id}', 'CartController@add' )->name('cart.add');
Route::get('cart/show', 'CartController@show')->name('cart.show');
