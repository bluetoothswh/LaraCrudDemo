@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
    <div class="container">
        <div class="row">
            <div class="col s12">
                 <a href="{{url('admin/logout')}}" class="btn-large">退出登录</a>
                 <div class="card-panel black white-text">
                 	<h5>{{auth()->guard('admin')->user()->username}}您已成功登录</h5>
                 </div>
            </div>
        </div>
    </div>
@stop