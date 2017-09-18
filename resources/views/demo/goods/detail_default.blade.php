@extends('demo.layout.common')
@section('title')
{{$title}}
@stop

@section('content')
   <div class="container">
   		<div class="row">
   			<div class="col s12">
   				 <table class="table bordered striped highlight my-tab">
                     <tr>
                        <th>商品编号</th>
                        <td>{{$goods->id}}</td>
                     </tr>
                     <tr>
                        <th>商品名称</th>
                        <td>{{$goods->goods_name}}</td>
                     </tr>
                     <tr>
                        <th>商品价格</th>
                        <td>{{$goods->shop_price}}</td>
                     </tr>
                     <tr>
                        <th>商品图片</th>
                        <td>
                           @if($goods->goods_thumb)
                           <img src="{{url($goods->goods_thumb)}}" alt="" class="thumb">
                           @endif
                        </td>
                     </tr>
                </table>

   			</div>
   		</div>

         <div class="row">
            <div class="col s12">
               <a href="{{url('goods')}}" class="btn-large blue">返回列表</a>
            </div>
         </div>
   </div>

@stop
        