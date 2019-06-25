@extends('Backend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      @if($check>0)
      <div class="checkout">
        <div class="checkout-heading">
          <h1>ĐƠN HÀNG</h1></div>
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Trạng thái</td>
                      <td>Khách hàng</td>
                      <td>Người nhận</td>
                      <td>Địa chỉ nhận</td>
                      <td>Tổng tiền</td>
                      <td >Ngày tạo</td>
                      <td>Cập nhật lần cuối</td>
                      <td>Chức năng</td>
                    </tr>
                  </thead>
                  <tbody>
                  		<tr>
                  			<td>{{$bill->id}}</td>                  			 
                  			@if($bill->status ==-1)<td style="color: red">({{$bill->status}}) Chưa thanh toán @elseif($bill->status ==0) <td style="color: purple"> ({{$bill->status}}) Đang giao, chờ thanh toán @elseif($bill->status ==1) <td style="color: green"> ({{$bill->status}}) Đã thanh toán @else <td style="color: red"> ({{$bill->status}}) Khách đã hủy  @endif  </td>  
                        <td>{{$bill->user_id}}</td>
                        <td>{{$bill->name}}</td>
                        <td>{{$bill->address}}</td>
                        <td>{{number_format($bill->price)}}</td>	
                  			<td>{{$bill->created_at}}</td>
                        <td>{{$bill->updated_at}}</td>
                        <td>@if($bill->status !=1 && $bill->status !=2)<a class="button" style="background-color: purple" href="{{route('update-status-bill',$bill->id)}}">Đánh dấu</a>@endif @if($bill->status !=0 )&nbsp <a class="button" href="{{route('delete-bill',$bill->id)}}">Xóa</a>@endif</td>
                  		</tr>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        <div class="checkout-heading">
          <h1>CHI TIẾT ĐƠN HÀNG CÓ MÃ: {{$bill->id}} </h1></div>
          @if(Session::has('thongbao5'))
              <h2 style="color: {{Session::get('color')}}">{{Session::get('thongbao5')}}</h2>
          @endif
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Mã sản phẩm</td>
                      <td>Số lượng</td>
                      <td>Tổng tiền</td>
                      <td >Ngày tạo</td>
                      <td>Cập nhật lần cuối</td>
                    </tr>
                  </thead>
                  @foreach($billDetail as $bd)
                    @if($billDetail->bill_id = $bill->id)
                      <tbody>
                          <tr>
                            <td>{{$bd->id}}</td>
                            <td>{{$bd->goods_id}}</td>
                            <td>{{$bd->amounts}}</td>
                            <td>{{number_format($bill->price)}}</td>  
                            <td>{{$bd->created_at}}</td>
                            <td>{{$bd->updated_at}}</td>
                          </tr>
                      </tbody>
                    @endif
                  @endforeach
                </table>
              </div>
            </form>
          </div>
        </div>
      @else
      @foreach($bill as $b)
        <div class="checkout">
        <div class="checkout-heading">
          <h1>ĐƠN HÀNG</h1></div>
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Trạng thái</td>
                      <td>Khách hàng</td>
                      <td>Người nhận</td>
                      <td>Địa chỉ nhận</td>
                      <td>Tổng tiền</td>
                      <td >Ngày tạo</td>
                      <td>Cập nhật lần cuối</td>
                      <td>Chức năng</td>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>{{$b->id}}</td>                         
                        @if($b->status ==-1)<td style="color: red">({{$b->status}}) Chưa thanh toán @elseif($b->status ==0) <td style="color: purple"> ({{$b->status}}) Đang giao, chờ thanh toán @elseif($b->status ==1) <td style="color: green"> ({{$b->status}}) Đã thanh toán @else <td style="color: red"> ({{$b->status}}) Khách đã hủy  @endif  </td>  
                        <td>{{$b->user_name}}</td>
                        <td>{{$b->name}}</td>
                        <td>{{$b->address}}</td>
                        <td>{{number_format($b->price)}}</td>  
                        <td>{{$b->created_at}}</td>
                        <td>{{$b->updated_at}}</td>
                        <td>@if($b->status !=1 && $b->status !=2)<a class="button" style="background-color: purple" href="{{route('update-status-bill',$b->id)}}">Đánh dấu</a>@endif @if($b->status !=0 )&nbsp <a class="button" href="{{route('delete-bill',$b->id)}}">Xóa</a>@endif</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        <div class="checkout-heading">
          <h1>CHI TIẾT ĐƠN HÀNG CÓ MÃ: {{$b->id}} </h1></div>
          @if(Session::has('thongbao5'))
              <h2 style="color: {{Session::get('color')}}">{{Session::get('thongbao5')}}</h2>
          @endif
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <td >ID</td>
                      <td >Mã sản phẩm</td>
                      <td>Số lượng</td>
                      <td>Tổng tiền</td>
                      <td >Ngày tạo</td>
                      <td>Cập nhật lần cuối</td>
                    </tr>
                  </thead>
                  @foreach($billDetail as $bd)
                    @if($bd->bill_id = $b->id)
                      <tbody>
                          <tr>
                            <td>{{$bd->id}}</td>
                            <td>{{$bd->goods_id}}</td>
                            <td>{{$bd->amounts}}</td>
                            <td>{{number_format($b->price)}}</td>  
                            <td>{{$bd->created_at}}</td>
                            <td>{{$bd->updated_at}}</td>
                          </tr>
                      </tbody>
                    @endif
                  @endforeach
                </table>
              </div>
            </form>
          </div>
        </div>
      @endforeach
      @endif
@stop