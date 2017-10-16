<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsGallery;
use App\Rules\GoodsSnRule;
use App\Events\CreateLog;
use Storage;
use File,Image;

class GoodsController extends Controller
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
		//表单数据验证
		$this->rules = [
			'goods_sn'=>'required',
			'goods_name'=>'required',
			'shop_price'=>'required',
			'imgs.*'=>'image',
			'captcha'=>'required|captcha',
			
			
		];
		$this->messages = [

			'goods_sn.required'=>'商品货号必须',
			'goods_name.required'=>'名称必须',
			'shop_price.required'=>'价格必须',
			'imgs.*.image'=>'必须是图片格式',
			'captcha.required'=>'验证码必须',
			'captcha.captcha'=>'验证码错误',
			

		];
		$this->middleware('auth.admin');
	}
    

    /*
	|--------------------------------------------------------------------------
	| 
	| 显示商品列表
	|
	|--------------------------------------------------------------------------
	*/
    public function index(){

    	$goods_list 			= Goods::paginate(20);
    	$title 					= '商品列表';
    	return view('demo.goods.index',compact('goods_list','title'));
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 显示添加商品数据的表单
	|
	|--------------------------------------------------------------------------
	*/
	public function create(){
		$title 					= '添加商品数据';
		return view('demo.goods.create',compact('title'));
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 存储数据到数据库
	|
	|--------------------------------------------------------------------------
	*/
	public function store(){
		request()->validate($this->rules,$this->messages);
		Goods::createModel();
		return redirect('goods');
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 创建缩略图
	|
	|--------------------------------------------------------------------------
	*/
	public function makeThumb($path,$width,$height)
	{
		$img 		= Image::make($path);
		$basename   = $img->basename;
		$img->resize($width, $height, function ($constraint) {
			$constraint->aspectRatio();
		});
		//创建目录
		$dirName	= 'oss/'.date('Y-m-d').'/thumb';
		Storage::makeDirectory($dirName,0755);
		$thumbPath  = $dirName.'/thumb-'.$basename;
		$img->save(public_path().'/'.$thumbPath);
		
		return $thumbPath;
	}


	/*
	|--------------------------------------------------------------------------
	| 
	| 显示编辑商品数据的表单
	|
	|--------------------------------------------------------------------------
	*/
	public function edit($id){

		$model 			= Goods::find($id);
		$title 		= '编辑商品数据';
		if(empty($model)){
			return '模型不存在';
		}
		return view('demo.goods.edit',compact('title','model'));

		
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 更新商品数据
	|
	|--------------------------------------------------------------------------
	*/
	public function update($id){

		$model 			= Goods::find($id);
		if(empty($model)){
			return false;
		}

		//表单验证
		//request()->validate($this->rules,$this->messages);
		//处理更新数据
		$model->update(request()->all());
		//处理缩略图上传
		$model->uploadThumb();
		return redirect('goods');

	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 删除记录
	|
	|--------------------------------------------------------------------------
	*/
	public function delete($id){

		$model 		= Goods::find($id);
		if(empty($model)){
			return false;
		}
		//删除商品缩略图
		$model->deleteThumb();
		$model->delete();
		return redirect('goods');
	}


	/*
	|--------------------------------------------------------------------------
	| 
	| ajax删除记录
	|
	|--------------------------------------------------------------------------
	*/
	public function destroy($id){

		$model 		= Goods::find($id);
		if(empty($model)){
			return json_encode([
					'tag'		=>'error',
					'message'	=>'模型为空',
			]);
		}
		//删除商品缩略图
		$model->deleteThumb();
		$model->delete();
		return json_encode([
				'tag'		=>'success',
				'message'	=>'成功删除',
		]);
	}


	/*
	|--------------------------------------------------------------------------
	|
	| 批量删除
	|
	|--------------------------------------------------------------------------
	*/
	public function batch(){
		$ids 		= request()->ids;
		if(empty($ids)){
			return '未选中任何项';
		}
		foreach($ids as $id){
			$model 		= Goods::find($id);
			//删除商品的缩略图
			$model->deleteThumb();
			//删除商品本身
			$model->delete();
		}
		return redirect('goods');	
	}

	/*
	|--------------------------------------------------------------------------
	|
	| 显示单条记录的详情
	|
	|--------------------------------------------------------------------------
	*/
	public function show($id){
		$goods 					= Goods::find($id);
		$title 					= '显示单条记录详情';
		return view()->first([
			"demo.goods.detail_{$id}",
			"demo.goods.detail_default",
		],compact('goods','title'));
	}

	
}
