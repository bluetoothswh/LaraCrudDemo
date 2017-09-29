@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	@include('demo.admin.login.form')
@stop