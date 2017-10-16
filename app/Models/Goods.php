<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Repository\GoodsRepository;
use Laravel\Scout\Searchable;

class Goods extends Model
{
	use GoodsRepository;
    protected $table = 'goods';
    protected $fillable  = [
    	'goods_sn',
    	'goods_name',
    	'shop_price',
	];
	

	/*
	|--------------------------------------------------------------------------
	| 
	| 商品 、商品相册 一对多关联
	|
	|--------------------------------------------------------------------------
	*/
	public function gallery()
	{
		return $this->hasMany(GoodsGallery::class,'goods_id','id');
	}

	
}
