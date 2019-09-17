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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//优惠券
Route::prefix('coupon')->group(function(){
    Route::get('/index', 'CouponController@index');
    Route::get('/couponindex', 'CouponController@couponindex');
    Route::post('/getcoupon', 'CouponController@getcoupon');
});
//个人中心
Route::prefix('user')->group(function(){
    Route::get('index','UserController@index');
});
//分类管理
Route::prefix('cates')->group(function(){
    Route::get('/add','CateController@add');
});
//商品管理
Route::prefix('goods')->group(function(){
    Route::get('/add','GoodsController@add');
});
//接口
Route::prefix('api')->group(function(){
   Route::get('cate','ApiController@select');
});

