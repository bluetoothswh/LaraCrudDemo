@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
	@include('demo.register.form')
@stop