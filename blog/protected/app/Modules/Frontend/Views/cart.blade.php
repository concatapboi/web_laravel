@extends('Frontend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      
      <h1>THÔNG TIN VẬN CHUYỂN</h1>
      <div class="checkout">
        <div class="checkout">
          @if(Session::has('thongbao'))
            <h2 style="color: red">{{Session::get('thongbao')}}</h2>
          @endif
          <form enctype="multipart/form-data" method="post" action="{{route('dat-hang')}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              @if(count($errors)>0)
                <h2 style="color: red">
                  @foreach($errors->all() as $err)
                    {{$err}}<br>
                  @endforeach
                </h2>
              @endif
              <table class="form" >
                <tbody>
                  <tr>
                    <td><span class="required"></span> Người nhận:</td>
                    <td><input type="text" class="large-field" value="{{Auth::user()->name}}" name="name"></td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" class="large-field" value="{{Auth::user()->address}}" name="address"></td>
                  </tr>
                  <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" class="large-field" value="{{Auth::user()->phone}}" name="phone"></td>
                  </tr>
                </tbody>
            </table>
            <h1>Giỏ hàng</h1>
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td class="image">Hình ảnh</td>
                      <td class="name">Tên sản phẩm</td>
                      <td class="quantity">Số lượng</td>
                      <td class="price">Đơn giá</td>
                      <td class="total">Tổng cộng</td>
                    </tr>
                  </thead>
                  <tbody>
                      @if(Session::has('cart'))                                
                          @foreach($product as $p)
                            <tr>
                              <td class="image"><a href=""><img title="{{$p['item']['name']}}" alt="{{$p['item']['name']}}" src="{{url('admin/'.$p['item']['img_link'])}}" height="60" width="60"></a></td>
                              <td class="name"><a >{{$p['item']['name']}}</a></td>
                              <td class="quantity"><input type="text" size="1" value="{{$p['amounts']}}" name="" class="w30">
                                &nbsp;
                                <a href="#"><input type="image" title="Update" alt="Update" src="{{url('admin/image/update.png')}}"></a>
                                &nbsp;<a href="{{route('remove-from-cart',$p['item']['id'])}}"><img title="Remove" alt="Remove" src="{{url('admin/image/remove.png')}}"></a></td>
                              <td class="price">{{number_format($p['item']['price'])}} đ</td>
                              <td class="total">{{number_format($p['item']['price'] * $p['amounts'])}} đ</td>
                            </tr>                      
                          @endforeach
                      @endif
                  </tbody>
                </table>
              </div>
            <div class="cart-total">
              <table id="total">
                <tbody>
                  <tr>
                    <td class="right"><b>Tổng đơn:</b></td>
                    <td class="right">@if(Session::has('cart')){{number_format(Session('cart')->cost)}} @else 0 @endif đồng</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="buttons">
              <div class="right"><input type="submit" name="submit" class="button" value="Đặt hàng"></div>
              <div class="center"><a class="button" href="{{route('ds-san-pham')}}">Tiếp tục mua sắm</a></div>
            </div>
          </form> 
        </div>
    </div>
@stop