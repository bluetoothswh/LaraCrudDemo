@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
	<div class="container" id="goodsRoot">
		<div class="row">
			<div class="col s12">
				{{Form::open(['url'=>'goods/batch-del','method'=>'post'])}}
				@include('demo.goods.btn')
				<table class="table bordered striped highlight goods-table">
					<tr>
						<th class="center-align" style="width: 150px;">
							<input type="checkbox" name="checkbox-all" id="checkbox-all">
							<label for="checkbox-all">编号</label>
						</th>
						<th>图片</th>
						<th>货号</th>
						<th>名称</th>
						<th>价格</th>
						<th>操作</th>
					</tr>
					@foreach($goods_list as $item)
					 <tr>
					 	<td class="center-align">
					 		<input type="checkbox" 
					 			   name="ids[]" 
					 			   id="ids{{$item->id}}"
					 			   class="checkbox-item" 
					 			   value="{{$item->id}}" />
      						<label for="ids{{$item->id}}">{{$item->id}}</label>
					 	</td>
					 	<td>
					 		@if($item->thumb())
							<img src="{{url($item->getThumb())}}" alt="" class="thumb">
					 		@endif
					 	</td>
					 	<td>{{$item->goods_sn}}</td>
					 	<td>{{$item->goods_name}}</td>
					 	<td>
					 		<i class="material-icons left">add</i>
					 		{{$item->shop_price}}
					 	</td>
					 	<td>
					 		<a href="{{url('goods/'.$item->id.'/edit')}}" class="btn red">编辑</a>
					 		<span   data-ajax_url="{{url('goods/'.$item->id)}}"
					 				v-on:click='delAjax'
					 				class="btn blue">
					 			删除
					 		</span>
					 		<a href="{{url('goods/'.$item->id)}}" class="btn blue">预览</a>
					 	</td>
					 </tr>
					@endforeach
				</table>
				{{Form::close()}}
				{{$goods_list->links()}}
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){

			$('#checkbox-all').change(function() {
			    
			    if(this.checked) {

			         $('.checkbox-item').prop("checked",true);
			    }
			    else{
			    	$('.checkbox-item').prop("checked",false);
			    }

			});
		});
	</script>
@include('demo.vue.goods')
@stop