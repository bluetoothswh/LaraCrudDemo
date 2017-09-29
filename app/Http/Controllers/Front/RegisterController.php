<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
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
            'email'=>'required|email',
            'phone'=>'required|digits:11',
            'password'=>'required|min:6'
        ];
        $this->messages=[
            'username.required'=>'用户名称必须',
            'email.required'=>'电子邮件必须',
            'email.email'=>'电子邮件格式不正确',
            'phone.required'=>'手机号码必须',
            'phone.digits'=>'手机号码必须为11位数字',
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
        $title      = '注册新会员';
        return view('demo.register.index',compact('title'));
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 处理注册 post请求
	|
	|--------------------------------------------------------------------------
    */
    public function store()
    {
        //验证表单
        request()->validate($this->rules,$this->messages);
        //执行注册
        User::register();
        return redirect('login');
    }
}
