@extends('Frontend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>Điện thoại</h1>
      <div class="product-filter">
        <div class="display"><b>Hiển thị:</b> <a href="{{route('ds-san-pham')}}" class="list-icon" title="Grid View">Lưới</a><span class="grid1-icon" title="List View">Danh sách</span></div>        
      </div>
      <!--Product Grid Start-->
      <div class="product-list">
        @foreach($goods as $g)
          <div>
            <div class="right">
              <div class="cart">
                <a href="{{route('add-to-cart',$g->id)}}"><input type="button" value="Thêm vào giỏ hàng" onClick="addToCart('40');" class="button" /></a>
              </div>
            </div>
            <div class="left">
              <div class="image"><a href="{{route('san-pham-info',[implode('-',explode(' ',$g->name)).'-',$g->id])}}"><img src="{{url('admin/'.$g->img_link)}}" height="152" width="152" alt="{{$g->name}}" /></a></div>
              @if($g->discount!=0)
                <div class="price"> <span class="price-old">{{number_format($g->price)}} đ</span></div>
                <div class="price">{{number_format($g->discount)}} đ</div> 
                @else
                <div class="price"> {{number_format($g->price)}}đ </div>
              @endif
              <div class="name"><a href="">{{$g->name}}</a></div>
              <div class="description">{{$g->content}}</div>
            </div>
          </div>
        @endforeach
      </div>
      <!--Product Grid End-->
      <!--Pagination Part Start-->
      <div class="pagination">
        <div class="links">{{$goods->links()}}</div>
      </div>
      <!--Pagination Part End-->
    </div>
@stop