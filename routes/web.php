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

Route::get('/', 'HomeController@index')->name('home');
Route::get('events', 'HomeController@show_events')->name('home.events');
Route::get('bestdeals', 'HomeController@show_bestdeals')->name('home.bestdeals');
Route::get('services', 'HomeController@show_services')->name('home.services');
Route::get('category/{id}','HomeController@show_category')->name('category.show');

Route::resource('product','ProductController');
Route::post('/', 'ProductController@search_product')->name('home.searchProduct');
