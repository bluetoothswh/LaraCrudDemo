<?php

use Faker\Generator as Faker;
use App\Models\Goods;

$factory->define(Goods::class, function (Faker $faker) {
    return [
        'goods_name'    => $faker->name,
        'goods_sn'      => str_random(4),
        'shop_price'    => rand(20,1000),
        
    ];
});
