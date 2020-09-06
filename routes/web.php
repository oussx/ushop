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


Route::get('/home/p','show_product_details@test');

Route::get('/','index_main_controller@my_read_all');

Route::get('/p/{id}','show_product_details@my_product_details');

Route::get('/cat/{id}', 'show_category_products@my_category_details');

Route::post('/search', 'search_result@my_search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\AdminloginController@showLoginForm')->name('admin.login');

Route::get('/admin/login', 'Auth\AdminloginController@login')->name('admin.login.submit');

Route::get('/admin', 'AdminController@admin')->name('admin.dashboard')->middleware('auth','admin');

Route::get('/add', 'AdminController@get_add_new_product')->name('admin.dashboard.add.get')->middleware('auth','admin');
Route::post('/add', 'AdminController@add_new_product')->name('admin.dashboard.add')->middleware('auth','admin');

Route::get('/products', 'AdminController@get_products')->name('admin.dashboard.products.get')->middleware('auth','admin');

Route::post('/u', 'AdminController@get_update_product')->name('admin.dashboard.product.get.update')->middleware('auth','admin');
Route::post('/u/p', 'AdminController@update_product')->name('admin.dashboard.product.update')->middleware('auth','admin');
Route::post('/p/d', 'AdminController@delete_product')->name('admin.dashboard.product.delete')->middleware('auth','admin');

Route::get('/users', 'AdminController@get_users')->name('admin.dashboard.users.get')->middleware('auth','admin');
Route::post('/update_usr', 'AdminController@get_update_user')->name('admin.dashboard.user.get.update')->middleware('auth','admin');
Route::post('/u/usr', 'AdminController@update_user')->name('admin.dashboard.user.update')->middleware('auth','admin');

Route::get('/add_user', 'AdminController@get_add_new_user')->name('admin.dashboard.user.add.get')->middleware('auth','admin');
Route::post('/add_user', 'AdminController@add_new_user')->name('admin.dashboard.user.add')->middleware('auth','admin');
Route::post('/u/d', 'AdminController@delete_user')->name('admin.dashboard.user.delete')->middleware('auth','admin');

Route::post('/add_to_cart', 'CartController@index')->name('add_to_cart');
Route::get('/cart', 'CartController@show')->name('show_cart');
Route::get('/empty_cart', 'CartController@empty_cart')->name('empty_cart');
Route::get('/cart_summary', 'CartController@show_cart_summary')->name('cart_summary');
Route::get('/order_page', 'CartController@show_order_page')->name('order_page');

Route::post('/order', 'CartController@complete_order')->name('complete_order')->middleware('auth');

Route::get('/profile', function () {
    echo "you are not logged in";
})->middleware('auth');
