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

Route::namespace('Admin')->group(function(){
	//Route::resource('goods','GoodsController');
	//批量删除
	//Route::post('goods/batch-del','GoodsController@batch');
	//后台登录
	Route::get('admin/login','LoginController@show');
	//处理登录post
	Route::post('admin/login','LoginController@login');
	//显示后台登录后用户信息
	Route::get('admin/center','UserController@center');
	//后台退出
	Route::get('admin/logout','UserController@logout');
	
});

Route::namespace('Front')->group(function(){
	//显示注册表单
	Route::get('register','RegisterController@show');
	//注册post
	Route::post('register','RegisterController@store');
	//显示登录表单
	Route::get('login','LoginController@show');
	//处理登录post
	Route::post('login','LoginController@login');
	//显示用户中心
	Route::get('auth/center','UserController@center');
	//退出登录
	Route::get('logout','UserController@logout');

	//显示首页信息
	Route::resource('category','CategoryController');
	Route::get('category/{_id}/delete','CategoryController@delete');
	Route::get('info','IndexController@info');
	Route::get('/','IndexController@index');

	//获取验证码
	Route::post('get-captcha','IndexController@getCaptcha');
	Route::get('test-html','IndexController@test');
	
});
