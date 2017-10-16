@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
	<div class="container">
		<div class="row">
			<h5>编辑分类</h5>
			
			{{Form::open(['url'=>'category/'.$model->_id,'method'=>'post','files'=>true])}}
				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="cat_name" id="cat_name" value="{{$model->cat_name}}">
						<label for="cat_name">分类名称</label>
					</div>
				</div>

				

				

				
				<input type="hidden" name="_method" value="PUT">
				<div class="row">
					<div class="input-field col s6">
						<button class="btn-large red" type="submit">确认更新</button>
						<a href="{{url('category')}}" class="btn-large blue">返回列表</a>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>

@stop