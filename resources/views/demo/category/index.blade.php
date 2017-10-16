@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
	<div class="container" id="goodsRoot">
		<div class="row">
			<div class="col s12">
				<h4>商品分类</h4>
				<a href="{{url('category/create')}}" class="btn red">添加</a>
				{{Form::open(['url'=>'goods/batch-del','method'=>'post'])}}
				<table class="table bordered striped highlight goods-table">
					<tr>
						<th style="width: 250px;">
							<input type="checkbox" name="checkbox-all" id="checkbox-all">
							<label for="checkbox-all">编号</label>
						</th>
						<th>名称</th>
						<th>父节点</th>
						<th>操作</th>
					</tr>
					@foreach($cat_list as $item)
					 <tr>
					 	<td>
					 		<input type="checkbox" 
					 			   name="ids[]" 
					 			   id="ids{{$item->_id}}"
					 			   class="checkbox-item" 
					 			   value="{{$item->_id}}" />
      						<label for="ids{{$item->_id}}">{{$item->_id}}</label>
					 	</td>
					 	
					 	<td>{{$item->cat_name}}</td>
					 	<td>{{$item->parent_id}}</td>
					 	
					 	<td>
					 		<a href="{{url('category/'.$item->_id.'/edit')}}" class="btn red">编辑</a>
					 		<a href="{{url('category/'.$item->_id.'/delete')}}" class="btn blue">删除</a>
					 	</td>
					 </tr>
					@endforeach
				</table>
				{{Form::close()}}
				
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

@stop