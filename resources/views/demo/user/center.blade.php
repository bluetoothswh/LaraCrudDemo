@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	
    <div class="container">
        <div class="row">
            <div class="col s12">
                 <a href="{{url('logout')}}" class="btn-large blue">退出登录</a>
                 <div class="card-panel red white-text">
                 	<h5>{{auth()->user()->username}}您已成功登录</h5>
                 </div>
            </div>
        </div>
    </div>
@stop