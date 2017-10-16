<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    /*
	|--------------------------------------------------------------------------
	| 
	| 测试mongodb信息
	|
	|--------------------------------------------------------------------------
    */
    public function index()
    {
		$username 		= '孙卫华';
		$email 			= 'bluetooth_swh@163.com';
		$phone 			= '17701228800';
        return response()->json(compact('username','email','phone'));
        
    }

    /*
	|--------------------------------------------------------------------------
	| 
	| 显示商品列表
	|
	|--------------------------------------------------------------------------
	*/
	public function info()
	{
		$title 			= '系统信息提示';
		return view('demo.goods.info',compact('title'));
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 获取验证码
	|
	|--------------------------------------------------------------------------
	*/
	public function getCaptcha()
	{
		return response()->json([
				'tag'=>'success',
				'captcha_src'=> captcha_src('flat'),
		]);
		
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 获取验证码
	|
	|--------------------------------------------------------------------------
	*/
	public function test()
	{
		return view('demo/test.html');
	}
	
}
