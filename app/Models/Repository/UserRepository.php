<?php

namespace App\Models\Repository;
use Hash;
trait UserRepository{

	/*
	|--------------------------------------------------------------------------
	| 
	|  用户注册
	|
	|--------------------------------------------------------------------------
	*/
	public static function register(){

		return (new static)->create([

			'username'=>request()->username,
			'email'=>request()->email,
			'phone'=>request()->phone,
			'ip'=>request()->ip(),
			'password'=> Hash::make(request()->password),
		]);
	}


	/*
	|--------------------------------------------------------------------------
	| 
	|  相关测试代码
	|
	|--------------------------------------------------------------------------
	*/
	public function  test()
	{
		//用户登录
		auth()->attempt(['username'=>$username,'password'=>$password],true);

		//检测用户是否登录
		auth()->check();

		//让某个用户登录
		auth()->login($user);

		//启用记住我
		auth()->login($user,true);

		//让某个id的用户登录
		auth()->loginUsingId($id);

		//前台用户登录
		auth()->guard('web')->attempt(compact('username','password'),true);

		//后台用户登录
		auth()->guard('admin')->attempt(compact('username','password'),true);

		//退出登录
		auth()->guard('web')->logout();
		auth()->guard('admin')->logout();


	}
}