@extends('Backend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <div class="checkout">
        <div class="checkout-heading">
          <h1>NHÀ SẢN XUẤT ({{count($catalog)}})<a class="button" style="background-color: green; " href="{{route('catalog-info-admin',-1)}}">Thêm</a></h1></div>
        @if(Session::has('thongbao1'))
            <h2 style="color: {{Session::get('color')}}">{{Session::get('thongbao1')}}</h2>
        @endif
        <div class="checkout-content" style="display: block;">
          <form enctype="multipart/form-data" method="post" action="#">
          <div class="cart-info">
            <table>
              <thead>
                <tr>
                  <td >ID</td>
                  <td >Tên</td>
                  <td >Ngày tạo</td>
                  <td>Chức năng</td>
                </tr>
              </thead>
              <tbody>
              	@foreach($catalog as $c)
              		<tr>
              			<td>{{$c->id}}</td>
              			<td>{{$c->name}}</td>
              			<td>{{$c->created_at}}</td>
                    <td><a class="button" style="background-color: purple" href="{{route('catalog-info-admin',$c->id)}}">Sửa</a>&nbsp <a class="button" href="{{route('delete-nsx',$c->id)}}">Xóa</a></td>          			
              		</tr>
              	@endforeach
              </tbody>
            </table>
          </div>
          </form>
        </div>
      </div>
      <div class="checkout">
        <div class="checkout-heading">
          <h1>DANH MỤC SẢN PHẨM ({{count($cat_detail)}}) <a class="button" style="background-color: green" href="{{route('catalog-detail-info-admin',-1)}}">Thêm</a></h1></div>
          @if(Session::has('thongbao2'))
              <h2 style="color:{{Session::get('color')}}">{{Session::get('thongbao2')}}</h2>
          @endif
          <div class="checkout-content">
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Tên</td>
                      <td>Nhà sản xuất</td>
                      <td >Ngày tạo</td>
                      <td>Chức năng</td>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($cat_detail as $cd)
                  		<tr>
                  			<td>{{$cd->id}}</td>
                  			<td>{{$cd->name}}</td>
                  			<td>{{$cd->catalog_id}}</td>
                  			<td>{{$cd->created_at}}</td>
                        <td><a class="button" style="background-color: purple" href="{{route('catalog-detail-info-admin',$cd->id)}}">Sửa</a>&nbsp <a class="button" href="{{route('delete-danhmuc',$cd->id)}}">Xóa</a></td>		
                  		</tr>
                  	@endforeach
                  </tbody>
                </table>
              </div>
            </form>
          </div>
      </div>
      <div class="checkout">
        <div class="checkout-heading">
          <h1>SẢN PHẨM ({{count($products)}}) <a class="button" style="background-color: green" href="{{route('product-info-admin',-1)}}">Thêm</a></h1></div>
          @if(Session::has('thongbao3'))
              <h2 style="color: {{Session::get('color')}}">{{Session::get('thongbao3')}}</h2>
          @endif
          <div class="checkout-content">
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Nhà sản xuất</td>
                      <td>Danh mục</td>
                      <td>Tên</td>
                      <td>Giá</td>
                      <td>Giảm giá</td>
                      <td>Số lượng</td>
                      <td>Hình ảnh</td>
                      <td >Ngày tạo</td>
                      <td>Chức năng</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $p)
                      <tr @if($p->discount!=0)style=" color:red   " @endif>
                        <td>{{$p->id}}</td>
                        <td>{{$p->catalog_id}}</td>
                        <td>{{$p->catalog_detail_id}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{number_format($p->price)}}</td>
                        <td>{{number_format($p->discount)}}</td>
                        <td>{{$p->amounts}}</td>
                        <td><img src="{{url($p->img_link)}}" height="50" width="50"></td>
                        <td>{{$p->created_at}}</td>
                        <td><a class="button" style="background-color: purple" href="{{route('product-info-admin',$p->id)}}">Sửa</a>&nbsp <a class="button" href="{{route('delete-sp',$p->id)}}">Xóa</a></td>   
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </form>
          </div>
      </div>
      <div class="checkout">
        <div class="checkout-heading">
          <h1>KHÁCH HÀNG ({{count($user)}})</h1></div>
          @if(Session::has('thongbao4'))
              <h2 style="color: {{Session::get('color')}}">{{Session::get('thongbao4')}}</h2>
          @endif
          <div class="checkout-content">
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Username</td>
                      <td>Tên</td>
                      <td>Email</td>
                      <td>Phone</td>
                      <td>Địa chỉ</td>
                      <td >Ngày tạo</td>
                      <td>Chức năng</td>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($user as $u)
                  		<tr>
                  			<td>{{$u->id}}</td>
                  			<td>{{$u->username}}</td>
                  			<td>{{$u->name}}</td>
                  			<td>{{$u->email}}</td>
                  			<td>{{$u->phone}}</td>
                  			<td>{{$u->address}}</td>
                  			<td>{{$u->created_at}}</td>
                        <td><a class="button" style="background-color: purple" href="{{route('user-info-admin',$u->id)}}">Sửa</a>&nbsp <a class="button" href="{{route('delete-user',$u->id)}}">Xóa</a></td>    			
                  		</tr>
                  	@endforeach
                  </tbody>
                </table>
              </div>
            </form>
          </div>
      </div>
      <div class="checkout">
        <div class="checkout-heading">
          <h1>ĐƠN HÀNG ({{count($bill)}})</h1></div>
          @if(Session::has('thongbao5'))
              <h2 style="color: {{Session::get('color')}}">{{Session::get('thongbao5')}}</h2>
          @endif
          <div class="checkout-content">
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Trạng thái</td>
                      <td>Khách hàng</td>
                      <td>Địa chỉ nhận</td>
                      <td>Tổng tiền</td>
                      <td >Ngày tạo</td>
                      <td>Chức năng</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($bill as $b)
                  		<tr>
                  			<td>{{$b->id}}</td>                  			 
                  			@if($b->status ==-1)<td style="color: red">({{$b->status}}) Chưa thanh toán @elseif($b->status ==0) <td style="color: purple"> ({{$b->status}}) Đang giao, chờ thanh toán @elseif($b->status ==1) <td style="color: green"> ({{$b->status}}) Đã thanh toán @else <td style="color: red"> ({{$b->status}}) Khách đã hủy @endif  </td>  
                        <td>{{$b->user_name}}</td>
                        <td>{{$b->address}}</td>
                        <td>{{number_format($b->price)}}</td>	
                  			<td>{{$b->created_at}}</td>
                        <td>@if($b->status !=1 && $b->status !=2)<a class="button" style="background-color: purple" href="{{route('update-status-bill',$b->id)}}">Đánh dấu</a>@endif @if($b->status !=0 )&nbsp <a class="button" href="{{route('delete-bill',$b->id)}}">Xóa</a>@endif</td>
                        <td><a class="button" style="background-color: green" href="{{route('bill-detail-info-admin',$b->id)}}">Xem</a></td>
                  		</tr>
                  	@endforeach
                  </tbody>
                </table>
              </div>
            </form>
          </div>
      </div>
  </div>
@stop