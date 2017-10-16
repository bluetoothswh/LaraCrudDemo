<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Repository\GoodsGalleryRepository;

class GoodsGallery extends Model
{
    use GoodsGalleryRepository;
    protected $table = 'goods_gallery';
    //
    protected $fillable = ['goods_id','goods_thumb','goods_img','goods_original','sort_order'];
}
