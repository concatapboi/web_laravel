@extends('Frontend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>Điện thoại</h1>
      <div class="product-filter">
        <div class="display"><b>Hiển thị:</b> <span class="list1-icon" title="Grid View">Lưới</span><a href="{{route('ds-san-pham-list')}}" class="grid-icon" title="List View">Danh sách</a></div>
      </div>
      <!--Product Grid Start-->
      <div class="product-grid">
        @foreach($goods as $g)
          <div>
            <div class="image"><a href="{{route('san-pham-info',[implode('-',explode(' ',$g->name)).'-',$g->id])}}"><img src="{{url('admin/'.$g->img_link)}}" width="210" height="210" alt="{{$g->name}}" /></a></div>
            <div class="name" >{{$g->name}}</div>
              @if($g->discount!=0)
                <div class="price"> <span class="price-old">{{number_format($g->price)}} đ</span></div>
                <div class="price">{{number_format($g->discount)}} đ</div> 
              @else
                <div class="price"> {{number_format($g->price)}}đ</div>
              @endif
            <div class="cart">
              <a href="{{route('add-to-cart',$g->id)}}"><input type="button" value="Thêm vào giỏ hàng" onClick="addToCart('40');" class="button" /></a>
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