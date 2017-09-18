<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Repository\GoodsRepository;

class Goods extends Model
{
	use GoodsRepository;
    protected $table = 'goods';
    protected $fillable  = [
    	'goods_sn',
    	'goods_name',
    	'shop_price',
    ];

	
}
