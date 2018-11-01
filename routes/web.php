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

Route::get('/', 'PageController@index');

Route::resource('user','UserController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product','ProductController');

Route::get('/products/searchproduct', 'ProductController@searchproducts');
Route::get('/products/searchproduct/{id}', 'ProductController@showproduct');



Route::get('/admin/{id}', 'AdminController@viewadminpage');
Route::get('/admin/{id}/approve', 'AdminController@approve');
Route::get('/admin/{id}/approveproduct/{productid}', 'AdminController@approveproduct');
Route::get('/admin/{id}/rejectproduct/{productid}', 'AdminController@rejectproduct');