<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB;

class CategoryController extends Controller
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

        $this->mongodb      = new MongoDB\Client("mongodb://localhost:27017");
        $this->category     = $this->mongodb->laramall->category;

    }

    /*
	|--------------------------------------------------------------------------
	| 
	| 显示分类列表
	|
	|--------------------------------------------------------------------------
    */
    public function index()
    {
        $cat_list       = $this->category->find();
        $title          = '商品分类列表';
        return view('demo.category.index',compact('cat_list','title'));
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 添加分类
	|
	|--------------------------------------------------------------------------
    */
    public function create()
    {
        $title          = '添加分类';
        return view('demo.category.create',compact('title'));
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 存储数据
	|
	|--------------------------------------------------------------------------
    */
    public function store()
    {   
        $cat_name       = request()->cat_name;
        $parent_id      = 0;
        $this->category->insertOne(compact('cat_name','parent_id'));
        return redirect('category');
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 编辑模型
	|
	|--------------------------------------------------------------------------
    */
    public function edit($_id)
    {
        
        $model          = $this->category->findOne(['_id' => new MongoDB\BSON\ObjectID($_id)]);
        $title          = '编辑商品分类';
        return view('demo.category.edit',compact('title','model'));
        
        
    }


    /*
	|--------------------------------------------------------------------------
	| 
	|  更新模型
	|
	|--------------------------------------------------------------------------
    */
    public function update($_id)
    {
        $this->category->updateOne(
            ["_id" => new MongoDB\BSON\ObjectID($_id) ],
            ['$set' => array( 'cat_name' => request()->cat_name )]
        );

        return redirect('category');
    }

    /*
	|--------------------------------------------------------------------------
	| 
	|  删除模型
	|
	|--------------------------------------------------------------------------
    */
    public function delete($_id)
    {

        $this->category->deleteOne(['_id'=> new MongoDB\BSON\ObjectID($_id)]);
        return redirect('category');

    }
}
