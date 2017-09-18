<?php

namespace App\Models\Repository;

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
				$imageName 			= date('Y-m-d').str_random(10).'.png';
				$path 				= request()->file('goods_thumb')
											   ->storeAs('images',$imageName);
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
		$model->uploadThumb();
		return $model;
	}

	/*
	|--------------------------------------------------------------------------
	| 
	| 删除商品图片
	|
	|--------------------------------------------------------------------------
	*/
	public function deleteThumb(){

		if($this->goods_thumb){
			@unlink(public_path().'/'.$this->goods_thumb);
		}
	}

}