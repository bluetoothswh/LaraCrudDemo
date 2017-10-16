<?php

namespace App\Models\Repository;
use App\Events\CreateLog;
use Storage;
use Config;
use App\Models\GoodsGallery;
trait GoodsRepository{

	/*
	|--------------------------------------------------------------------------
	| 
	| 处理商品缩略图上传
	|
	|--------------------------------------------------------------------------
	*/
	public function uploadThumb(){

		if(request()->hasFile('goods_thumb')){

				//删除旧图片
				$this->deleteThumb();
				$ext 				= request()->file('goods_thumb')->getClientOriginalExtension();
				$imageName 			= date('Y-m-d').str_random(10).'.'.$ext;
				$path 				= request()->file('goods_thumb')
											   ->storeAs('oss',$imageName);
				$this->goods_thumb 	= $path;
				$this->save();
		}
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 存储数据
	|
	|--------------------------------------------------------------------------
	*/
	public static function createModel(){

		$self 			= new static;
		$model 			= $self->create(request()->all());
		GoodsGallery::upload($model);
		//激活了事件 存储日志
		$content 		 = '添加商品：'.request()->goods_name;
		event(new CreateLog($content));
		return $model;
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 删除商品图片
	|
	|--------------------------------------------------------------------------
	*/
	public function deleteGoodsImage(){

		if(count($this->gallery()->get())){
			foreach($this->gallery()->get() as $gallery){
				//删除详情图片
				(new static)->imgDel($gallery->goods_img);
				//删除缩略图
				(new static)->imgDel($gallery->goods_thumb);
				//删除原始图片
				(new static)->imgDel($gallery->goods_original);
			}
		}
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 删除图片
	|
	|--------------------------------------------------------------------------
	*/
	public static function imgDel($path)
	{
		if(Storage::exists($path)){
			Storage::delete($path);
		}
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 获取商品的缩略图
	|
	|--------------------------------------------------------------------------
	*/
	public function getThumb()
	{
		return (Config::get('filesystems.default') == 'oss') ? 
				env('ALIOSS_BASEURL').$this->thumb() : url($this->thumb());
	}


	/*
	|--------------------------------------------------------------------------
	| 
	| 获取商品的缩略图
	|
	|--------------------------------------------------------------------------
	*/
	public function thumb()
	{
		return (count($this->gallery)) ?
		       ($this->gallery()->first()->goods_thumb) : '';
	}


	

}