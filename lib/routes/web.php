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

Route::get('/', 'FrontendController@getHome');
Route::get('details/{id}/{slug}.html', 'FrontendController@getDetails');
Route::post('details/{id}/{slug}.html', 'FrontendController@postComment');
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
Route::get('search', 'FrontendController@getSearch');

Route::get('account', 'AccountController@getAccount');
Route::post('account', 'AccountController@postAccount');


Route::group(['middleware'=>'checkstore'], function(){
	Route::get('accountLogin', 'AccountController@getLogin');
	Route::post('accountLogin', 'AccountController@postLogin');
});

Route::group(['middleware'=>'checkstorelogin'], function(){
	Route::get('mystore/{id}', 'AccountController@getMyStore');
	Route::get('mystore2/{email}', 'AccountController@getMyStore2');
	Route::post('mystore/{id}', 'AccountController@postMystore');
	Route::get('logoutAccount','AccountController@logout' );
});



Route::get('stores', 'AccountController@getStores');
Route::get('news', 'AccountController@news');
Route::post('news', 'AccountController@post');

Route::group(['prefix' => 'cart'], function(){
	Route::get('add/{id}', 'CartController@getAddCart');
	Route::get('show', 'CartController@showCart');
	Route::post('show', 'CartController@complete');
	Route::get('delete/{id}', 'CartController@deleteCart');
	Route::get('update', 'CartController@updateCart');
});

Route::get('complete', 'CartController@getcomplete');

Route::group(['namespace'=>'Admin'], function(){
	Route::group(['prefix'=>'login', 'middleware'=>'checklogout'], function(){
		Route::get('/', 'LoginController@getLogin');
		Route::post('/', 'LoginController@postLogin');
	});

	Route::get('logout', 'HomeController@Logout');
	Route::group(['prefix'=>'admin', 'middleware'=>'checklogin'], function(){
		Route::get('home', 'HomeController@getHome');

		Route::group(['prefix'=>'category'], function(){
			Route::get('/', 'CategoryController@getCate');
			Route::post('/', 'CategoryController@postCate');

			Route::get('/{id}', 'CategoryController@getProduct');

			Route::get('edit/{id}', 'CategoryController@editCate');
			Route::post('edit/{id}', 'CategoryController@postEditCate');

			Route::get('delete/{id}', 'CategoryController@deleteCate');
		});

		Route::group(['prefix'=>'product'], function(){
			Route::get('/', 'ProductController@getProduct');

			Route::get('add', 'ProductController@getAddProduct');
			Route::post('add','ProductController@postAddProduct');

			Route::get('edit/{id}', 'ProductController@getEditProduct');
			Route::post('edit/{id}', 'ProductController@postEditProduct');

			Route::get('delete/{id}', 'ProductController@deleteProduct');
		});
	});
});