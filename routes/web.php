<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','ProductController@show_product');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function(){
Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
Route::get('detail_dashboard/{id}','DashboardController@detail')->name('detail');


Route::get('admin/user/list-user','AdminController@list')->name('admin/user/list-user');
Route::get('admin/user/add-user','AdminController@add')->name('admin/user/add-user');
Route::post('admin/user/store','AdminController@store');
Route::get('admin/user/delete/{id}','AdminController@delete')->name('admin/user/delete');
Route::get('admin/user/action','AdminController@action');
Route::get('admin/user/edit/{id}','AdminController@edit')->name('admin/edit');
Route::post('admin/user/update/{id}','AdminController@update')->name('admin/update');

Route::get('admin/product/add','ProductController@add')->name('admin/product/add');
Route::post('admin/product/stores','ProductController@stores')->name('admin');
Route::get('admin/product/list','ProductController@list')->name('admin/product/list');
Route::get('admin/product/delete/{id}','ProductController@delete')->name('admin/product/delete');
Route::get('admin/product/action','ProductController@action');
//cart



});
Route::get('cart/show','CartController@show')->name('cart/show');
Route::get('cart/add/{id}','CartController@add')->name('cart/add');
Route::get('cart/remove/{rowId}','CartController@remove')->name('cart/remove');
Route::get('cart/destroy','CartController@destroy')->name('cart/destroy');
Route::post('cart/action','CartController@action')->name('cart/action');
Route::post('cart/action2/{id}','CartController@action2')->name('cart/action2');
Route::get('cart/checkout','CheckoutController@checkout_add')->name('cart/checkout');
Route::post('checkout/action','CheckoutController@checkout_action')->name('checkout/action');
Route::get('product/show/{id}','ProductController@detail_product')->name('product/show');
// chức năng tìm kiếm bằng ajax
Route::get('search', 'SearchController@getSearch');
Route::post('search/name', 'SearchController@getSearchAjax')->name('search');
Route::post('search/name/product', 'SearchController@getSearchProductAjax')->name('searchproduct');
//quanlytheodanhmuc
Route::get('product_cat','product_catController@product_cat')->name('admin/product/product_cat');
Route::post('product_cat/add','product_catController@addproduct_cat')->name('admin/product/addproduct_cat');

//district
Route::post('select_district','CheckoutController@district')->name('district');
Route::post('select_commune','CheckoutController@commune')->name('commune');    
//buynow
Route::get('mua-ngay/{product_name}.html','BuynowController@buynow')->name('buynow');
Route::post('checkout/action2','BuynowController@checkout_action2')->name('checkout/action2');
//num-order
Route::post('num_order','CheckoutController@num_order')->name('num_order');
//admin order
Route::get('admin_order/{id}','AdminOderController@admin_order')->name('admin_order');

Route::resource('coupon','CouponController');

// coupon
Route::post('check-coupon', 'CouponController@checkCoupon')->name('check/coupon');
Route::get('delete-coupon', 'CouponController@delete')->name('delete/coupon');

//update_order
Route::post('update_admin_order/{id}','AdminOderController@update_order')->name('update_order');
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
