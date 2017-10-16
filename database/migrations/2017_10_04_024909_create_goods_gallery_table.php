<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->comment('商品编号');
            $table->string('goods_img')->comment('商品详情页面图片');
            $table->string('goods_thumb')->comment('商品缩略图');
            $table->string('goods_original')->comment('原始上传图片');
            $table->string('sort_order')->comment("排序");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_gallery');
    }
}
