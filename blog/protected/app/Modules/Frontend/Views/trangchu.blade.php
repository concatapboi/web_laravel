@extends('Frontend::layouts.master')
@section('content')
<div id="content">
      <p class="welcome"></p>
      <!--Slideshow Part Start-->
      @include('Frontend::layouts.slide')
      <!--Slideshow Part End-->
      <!--Featured Product Part Start-->
      <div class="box">
        <div class="box-heading">Đề xuất</div>
        <div class="box-content">
          <div class="box-product">
            @foreach($goods as $g)
              <div>
                <div class="image"><a href="{{route('san-pham-info',[implode('-',explode(' ',$g->name)).'-',$g->id])}}"><img src="{{url('admin/'.$g->img_link)}}" height="120" width="120" /></a></div>
                <div class="name">{{$g->name}}</a></div>
                @if($g->discount!=0)
                  <div class="price"> <span class="price-old">{{number_format($g->price)}} đ</span></div>
                  <div class="price">{{number_format($g->discount)}} đ</div> 
                @else
                  <div class="price"> {{number_format($g->price)}}đ</div>
                @endif
                <div class="cart">
                  <a href="{{route('add-to-cart',$g->id)}}"><input type="button" value="Thêm vào giỏ hàng"class="button" /></a>
                </div>
              </div>
            @endforeach            
        </div>
      </div>
      <div class="pagination">
        <div class="links">{{$goods->links()}}</div>
      </div>
      <!--Featured Product Part End-->
    </div>
@stop