@extends('goods::layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
	<div class="container">
		<div class="row">
			<h5>编辑商品数据</h5>
			@include('goods::errors')
			{{Form::open(['url'=>'goods/'.$model->id,'method'=>'post','files'=>true])}}
				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="goods_sn" id="goods_sn" value="{{$model->goods_sn}}">
						<label for="goods_sn">商品货号</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="goods_name" id="goods_name" value="{{$model->goods_name}}">
						<label for="goods_name">商品名称</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="shop_price" id="shop_price" value="{{$model->shop_price}}">
						<label for="shop_price">商品价格</label>
					</div>
				</div>

				<div id="goods_thumb_content">
					
				</div>
				<div class="row">
    				<div class="input-field col s6">
    					<span class="btn-large blue" id="add-goods-thumb-btn">
    						<i class="material-icons left">add</i>
    						添加图片
    					</span>
    				</div>
    			</div> 

				@if($model->gallery)
				<div class="row">
					<div class="input-field col s6">
					@foreach($model->gallery as $gallery)
						<img src="{{url($gallery->goods_img)}}" alt="" class="thumb">
					@endforeach
					</div>
				</div>
				@endif

				<input type="hidden" name="_method" value="PUT">
				<div class="row">
					<div class="input-field col s6">
						<button class="btn-large red" type="submit">确认更新</button>
						<a href="{{url('goods')}}" class="btn-large blue">返回列表</a>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
@include('goods::js.thumb')
@stop