@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	@include('demo.login.form')
@stop