@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="card-panel blue white-text">
					<p>请以管理员身份登录后再操作</p>
				</div>
				<a href="{{url('admin/login')}}" class="btn-large red">登录</a>
			</div>
		</div>
	</div>
    
@stop