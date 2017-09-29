<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    /*
	|--------------------------------------------------------------------------
	| 
	| 构造函数
	|
	|--------------------------------------------------------------------------
    */
    public function __construct(){
        
                $this->rules=[
                    'username'=>'required',
                    'password'=>'required|min:6'
                ];
                $this->messages=[
                    'username.required'=>'用户名称必须',
                    'password.required'=>'密码必须',
                    'password.min'=>'密码至少为6位',
                ];
        
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 显示注册表单
	|
	|--------------------------------------------------------------------------
    */
    public function show(){
        if(auth()->guard('web')->check()){
            return redirect('auth/center');
        }
        $title      = '登录';
        return view('demo.login.index',compact('title'));
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 处理登录请求
	|
	|--------------------------------------------------------------------------
    */
    public function login(){
        if(auth()->guard('web')->check()){
            return redirect('auth/center');
        }
        //表单验证
        request()->validate($this->rules,$this->messages);
        $username       = request()->username;
        $password       = request()->password;
        if(auth()->attempt(compact('username','password'))){
            return redirect('auth/center');
           
        }
        return '登录失败';
    }
}
