<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'pages.home');
Route::view('about', 'pages.about');

Route::get('shop', 'ShopController@displayShop');
Route::get('shop/{category}', 'ShopController@displayCategory');
Route::get('shop/{category}/{product}', 'ShopController@displayProduct');
Route::get('add-to-cart/{product_id}', 'CartController@addToCart');

Route::post('shop/{slug}/sort-low-cart', 'ShopController@displayCategoryLow');
Route::post('shop/{slug}/sort-high-cart', 'ShopController@displayCategoryHigh');

Route::post('add-to-cart', 'CartController@addToCartByQty');
Route::get('cart', 'CartController@displayCart');
Route::post('update-cart', 'CartController@updateCart');
Route::get('delete-item/{rowId}', 'CartController@deleteItem');
Route::get('delete-cart', 'CartController@deleteCart');

Route::get('signup', 'UserController@displaySignup')->middleware('is_login');
Route::post('signup', 'UserController@processSignup');

Route::get('login', 'UserController@displayLogin')->middleware('is_login');
Route::post('login', 'UserController@processLogin');

Route::get('logout', 'UserController@logout');
Route::get('place-order', 'CartController@placeOrder');

Route::get('admin', 'AdminController@displayDashboard')->middleware('validate_admin');
Route::get('admin/orders', 'AdminController@displayOrders')->middleware('validate_admin');

Route::resource('admin/categories', 'CategoryCrudController')->middleware('validate_admin');
Route::resource('admin/products', 'ProductCrudController')->middleware('validate_admin');
Route::resource('admin/users', 'UserCrudController')->middleware('validate_admin');
Route::resource('admin/pages', 'PageCrudController')->middleware('validate_admin');
//Must be the last route.
Route::get('{slug}', 'PageController@displayPage');