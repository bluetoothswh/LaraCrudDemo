<?php

namespace App\Models\Repository;
use Image,Storage;
use App\Models\Goods;
trait GoodsGalleryRepository
{
    /*
	|--------------------------------------------------------------------------
	| 
	| 上传图片
	|
	|--------------------------------------------------------------------------
    */
    public static function upload(Goods $goods)
    {
        if(!request()->hasFile('imgs')){
            return false;
        }
        $imgs                   = request()->imgs;
        foreach($imgs as $img){
            $path               = $img->store('oss/'.date('Y-m-d').'/original');
            $goods_img          = (new static)->thumb($path,'img',300,300);
            $goods_thumb        = (new static)->thumb($path,'thumb',150,150);

            (new static)->create([
                'goods_original'=>$path,
                'goods_img'=>$goods_img,
                'goods_thumb'=>$goods_thumb,
                'goods_id'=>$goods->id,
                'sort_order'=>0,
            ]);
        }
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 处理缩略图
	|
	|--------------------------------------------------------------------------
    */
    public static function thumb($path,$dir ='thumb',$width,$height)
    {
         $img           = Image::make($path);
         $basename      = $img->basename;
        //生成缩略图
         $img->resize($width,$height, function ($constraint) {
            $constraint->aspectRatio();
        });
        //创建目录
        (new static)->makeDir();
        $thumbPath      = 'oss/'.date('Y-m-d').'/'.$dir.'/'.$width.'-'.$height.$basename;
        $img->save(public_path().'/'.$thumbPath);
        return $thumbPath;            
    }


    /*
	|--------------------------------------------------------------------------
	| 
	| 创建目录
	|
	|--------------------------------------------------------------------------
    */
    public static function makeDir()
    {
        //创建日期目录
        Storage::makeDirectory('oss/'.date('Y-m-d'),0755);
        //创建原始图片目录
        Storage::makeDirectory('oss/'.date('Y-m-d').'/original',0755);
        //创建商品详情页面图片目录
        Storage::makeDirectory('oss/'.date('Y-m-d').'/img',0755);
        //创建缩略图目录
        Storage::makeDirectory('oss/'.date('Y-m-d').'/thumb',0755);
        return true;
        
    }
}