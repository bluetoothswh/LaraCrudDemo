<?php

use Faker\Generator as Faker;
use App\Models\Goods;

$factory->define(Goods::class, function (Faker $faker) {
    return [
        'goods_name'		=>$faker->name,
        'shop_price'		=>rand(10,1000),
        'cat_id'			=>rand(1,10),
        'brand_id'			=>rand(1,10),
        'goods_sn'			=> date('Y-m-d').time(),
        'goods_thumb'		=>'front/demo/images/imacpro.png',
    ];
});
