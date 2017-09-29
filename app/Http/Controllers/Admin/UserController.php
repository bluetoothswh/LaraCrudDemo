<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
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
        return view('demo.admin.center',compact('title'));
    }

    /*
	|--------------------------------------------------------------------------
	| 
	| 管理员退出
	|
	|--------------------------------------------------------------------------
    */
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }
}
