<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
	|--------------------------------------------------------------------------
	| 
	| 构造函数
	|
	|--------------------------------------------------------------------------
    */
    public function __construct()
    {
        //
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 显示用户中心
	|
	|--------------------------------------------------------------------------
    */
    public function center()
    {
        $title       = '用户中心';
        return view('demo.user.center',compact('title'));
    }

    /*
	|--------------------------------------------------------------------------
	| 
	| 用户退出
	|
	|--------------------------------------------------------------------------
    */
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('login');
    }
}
