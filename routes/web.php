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
Route::get('/user/{id}/vieworders', 'UserController@vieworders');
Route::get('/user/{id}/vieworders/{orderid}', 'UserController@approveorder');
Route::get('/user/{id}/showprofilechat', 'UserController@showprofilechat');
Route::get('/user/{id}/fav/{orderid}', 'UserController@removefav');


Auth::routes(['verify' => true]);
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/user/logout','Auth\RegisterController@logout');

Route::get('/home', 'PageController@index')->name('home');

Route::resource('product','ProductController');

Route::get('/products/searchproduct', 'ProductController@searchproducts');
Route::get('/products/searchproduct/{id}', 'ProductController@showproduct');
Route::get('/products/searchproduct/buy/{id}', 'ProductController@buyproduct');
Route::get('/products/searchproduct/fav/{id}', 'ProductController@favproduct');
Route::get('/products/searchproduct/{productid}/chat/{id}', 'AuthRequireController@viewPersonalChat');

Route::get('/products/searchorganization', 'ProductController@searchorganization');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/{id}', 'AdminController@viewadminpage');
    Route::get('/admin/{id}/approve', 'AdminController@approve');
    Route::get('/admin/{id}/approveproduct/{productid}', 'AdminController@approveproduct');
    Route::get('/admin/{id}/rejectproduct/{productid}', 'AdminController@rejectproduct');
    Route::get('/admin/{id}/approveads', 'AdminController@approveads');
    Route::get('/admin/{id}/approvedadvertisment/{adid}', 'AdminController@approvedadvertisment');
    Route::get('/admin/{id}/rejectadvertisment/{adid}', 'AdminController@rejectadvertisment');
    Route::get('/admin/{id}/showevents', 'AdminController@showevents');
    Route::get('/admin/{id}/showevents/{eventid}', 'AdminController@approveevent');
    Route::get('/admin/{id}/showusers', 'AdminController@showusers');
    Route::get('/admin/{id}/showusers/{userid}', 'AdminController@banneduser');
    Route::get('/admin/{id}','AdminController@vieweditadmin');
    Route::put('/admin/{id}/updateadmin','AdminController@updateadmin');
});


Route::get('/ads', 'AdvertismentController@index');
Route::post('/ads/adAds', 'AdvertismentController@store');

Route::get('/event', 'EventController@index');
Route::post('/event/addEvent', 'EventController@store');

Route::resource('organization','OrganizationController');
Route::put('/organization/{id}/addlogo', 'OrganizationController@addorgaizationlogo');
Route::get('/organizationsearch','UserController@searchorganization');

Route::get('/chat', function (){
    return view('chat.chat');
});


Route::get('/conversation/{id}', 'MessageController@getMessageFor');
Route::post('/conversation/send', 'MessageController@send');
Route::get('/contacts', 'MessageController@get');
Route::get('/profileconversation/{id}', 'MessageController@getProfileMessagesFor');
Route::post('/conversation/profilesend', 'MessageController@profilesend');

Route::post('/rateseller/{id}', 'UserController@ratesellers');


// Ruk Wiki routes

    Route::resource('categories','CategoryController',['except'=> ['create']]);   
    Route::get('/blog/{slug}', ['as'=> 'blog.single', 'uses' => 'WikiController@getSingle']) 
    ->where('slug' , '[\w\d\-\_]+');
    Route::get('blog', ['uses' => 'WikiController@getIndex', 'as' => 'blog.index']);
    Route::get('/contact', 'blogController@getcontact');
    Route::get('/about', 'blogController@getabout');
    Route::get('/rukwiki', 'blogController@getindex');
    Route::get('category/{category_id}','CategoryController@getCategory')->name('category');

    Route::resource('posts', 'PostsController');