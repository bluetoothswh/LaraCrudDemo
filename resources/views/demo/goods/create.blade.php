@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
	<div class="container">
		<div class="row">
			<h5>添加商品数据</h5>
			@include('demo.goods.errors')
			{{Form::open(['url'=>'goods','method'=>'post','files'=>true])}}
				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="goods_sn" id="goods_sn">
						<label for="goods_sn">商品货号</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="goods_name" id="goods_name">
						<label for="goods_name">商品名称</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="shop_price" id="shop_price">
						<label for="shop_price">商品价格</label>
					</div>
				</div>

				<div class="row">
					<div class="file-field input-field col s6">
					      <div class="btn">
					        <span>商品缩略图</span>
					        <input type="file" name="goods_thumb">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
    				</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<button class="btn-large red" type="submit">确认添加</button>
						<a href="{{url('goods')}}" class="btn-large blue">返回列表</a>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>

@stop