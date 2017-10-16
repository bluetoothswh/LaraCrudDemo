<?php

namespace App\Http\Controllers\Admin;

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
    public function __construct()
    {
        
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
	| 显示管理员登录
	|
	|--------------------------------------------------------------------------
    */
    public function show()
    {   
       if(auth()->guard('admin')->check()){
           return redirect('admin/center');
       }
        $title          = '管理员登录';
        return view('demo.admin.login',compact('title'));
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 登录post
	|
	|--------------------------------------------------------------------------
    */
    public function login()
    {
        //表单验证
        request()->validate($this->rules,$this->messages);
        //处理登录
        $username       = request()->username;
        $password       = request()->password;
        if(auth()->guard('admin')->attempt(compact('username','password'),true)){
            return redirect('admin/center');
        }
        return '登录失败';

    }
}
