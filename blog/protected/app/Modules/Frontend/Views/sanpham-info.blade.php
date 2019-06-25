@extends('Frontend::layouts.master')
@section('content')
	<div id="content">
      <div class="product-info">
        <div class="left">
          <div class="image"> <img src="{{url('admin/'.$infoPro->img_link)}}" width="400" height="400" title="#" alt="#" id="image" /></div>
        </div>
        <div class="right">
          <h1>{{$infoPro->name}}</h1>
          <div class="description"> <span>Nhà sản xuất:</span> <a href="#">{{$catalog->name}}</a><br>
            <span>Tình trạng:</span> @if($infoPro->amounts!=0) Còn hàng @else Hết hàng @endif <br>
            <span>Số lượng:</span> {{$infoPro->amounts}}
        	</div>
          <div class="price">Giá: @if($infoPro->discount!=0)<span class="price-old">{{number_format($infoPro->price)}} đ</span>
            <div class="price-tag">{{number_format($infoPro->discount)}} đ</div> @else <div class="price-tag">{{number_format($infoPro->price)}} đ</div> @endif
            <br>
          </div>
          <div class="cart">
            <div>
              <form enctype="multipart/form-data" method="get" action="{{route('add-amounts-to-cart',$infoPro->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="qty"> <strong>Số lượng:</strong> <a href="javascript:void(0);" class="qtyBtn mines">-</a>
                  <input type="text" value="1" size="2" name="amounts" class="w30" id="qty">
                  <a href="javascript:void(0);" class="qtyBtn plus">+</a>
                  <div class="clear"></div>
                </div>              
                <input type="submit" class="button" id="button-cart" value="Thêm vào giỏ hàng">
              </form>
            </div>
          </div>
          <div class="tags"> <b>Tags:</b> <a href="#">{{$catalog->name}}</a>, <a href="#">{{$catDetail->name}}</a></div>
        </div>
      </div>
      
      <!-- Tabs End -->
      <!-- Related Products Start -->
      <div class="box">
        <div class="box-heading">Sản phẩm liên quan</div>   
        <div class="box-content">
          <div class="box-product">
          	@foreach($relativePro as $r)
	            <div>
	              <div class="image"><a href="{{route('san-pham-info',[implode('-',explode(' ',$r->name)).'-',$r->id])}}"><img alt="{{$r->name}}" src="{{url('admin/'.$r->img_link)}}" width="152" height="152" ></a></div>
	              <div class="name"><a href="product.html">{{$r->name}}</a></div>
	              <div class="price"> @if($r->discount!=0)<span class="price-old">{{number_format($r->price)}} đ</span> <span class="price-new">{{number_format($r->discount)}} đ</span> @else <span class="price-new">{{number_format($r->price)}} đ</span> @endif </div>
	              <a class="button" href="{{route('add-to-cart',$r->id)}}">Thêm vào giỏ hàng</a>
	          	</div>
          @endforeach
          </div>
        </div>
      </div>
      <!-- Related Products End -->
    </div>
@stop