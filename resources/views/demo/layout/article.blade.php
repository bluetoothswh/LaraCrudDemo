<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="{{$description}}">
<meta name="keywords" content="{{$keywords}}">
<title>@yield('title')</title>
@include('laracasts.layout.resources')
<link rel="stylesheet" href="{{url('front/laracasts/highlight/styles/rainbow.css')}}">
<script src="{{url('front/laracasts/highlight/highlight.pack.js')}}"></script>
</head>
<body>
	
  @include('laracasts.lib.top')
  @yield('content')
  @include('laracasts.lib.footer')
    
</body>
</html>
