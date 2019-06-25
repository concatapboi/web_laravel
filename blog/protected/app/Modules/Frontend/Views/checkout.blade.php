@extends('Frontend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>Thông tin tài khoản</h1>
      @if(!Auth::check())
      <div class="checkout">
        <div class="checkout-heading">Xác nhận đăng nhập</div>
        <div class="checkout-content" style="display: block;">
          <div class="left">
            <h2>Chưa có tài khoản?</h2>
          <div class="content">
            <p><b>Đăng ký tài khoản</b></p>
            <p>Trở thành thành viên của Case Forest để việc mua sắm trở nên tiện lợi, nhanh chóng hơn.</p>
            <br>
            <a class="button" href="{{route('dk-tai-khoan')}}">Tiếp tục</a></div>
          </div>
          <div class="right" id="login">
            <h2>Đăng nhập</h2>
	          @if(Session::has('thongbao'))
	            <h2 style="color: red">{{Session::get('thongbao')}}</h2>
	          @endif
	          <form enctype="multipart/form-data" method="post" action="{{route('dang-nhap')}}">
	            <input type="hidden" name="_token" value="{{csrf_token()}}">
	            @if(count($errors)>0)
	              <h2 style="color: red">
	                @foreach($errors->all() as $err)
	                  {{$err}}<br>
	                @endforeach
	              </h2>
	            @endif
	            <div class="content">
	              <b>Tên đăng nhập</b><br>
	              <input type="text" value="" name="username">
	              <br>
	              <br>
	              <b>Mật khẩu:</b><br>
	              <input type="password" value="" name="password">
	              <br>
	              <div class="buttons">
	              	<input type="submit" class="button" value="Đăng nhập">
	              </div>
	            </div>
	          </form>
          </div>
        </div>
      </div>
      @endif
      <div class="checkout">
        <div class="checkout-heading" style="color: green">THÔNG TIN TÀI KHOẢN</div>
        <div class="checkout">
          @if(Session::has('thongbao'))
            <h2 style="color: red">{{Session::get('thongbao')}}</h2>
          @endif
        	<form enctype="multipart/form-data" method="post" action="{{route('update-user-info',Auth::user()->id)}}">
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
		                <td><span class="required"></span> Họ tên:</td>
		                <td><input type="text" class="large-field" value="{{Auth::user()->name}}" name="name"></td>
		              </tr>
		              <tr>
		                <td>Địa chỉ</td>
		                <td><input type="text" class="large-field" value="{{Auth::user()->address}}" name="address"></td>
		              </tr>
		              <tr>
		                <td>E-mail</td>
		                <td><input type="text" class="large-field" value="{{Auth::user()->email}}" name="email"></td>
		              </tr>
		              <tr>
		                <td>Số điện thoại</td>
		                <td><input type="text" class="large-field" value="{{Auth::user()->phone}}" name="phone"></td>
		              </tr>
		              <tr class="hide an">
		                <td>Xác nhận mật khẩu</td>
		                <td><input type="password" class="large-field" value="" name="password"></td>
		              </tr>
		              <tr class="hide an">
		                <td>Mật khẩu mới</td>
		                <td><input type="password" class="large-field" value="" name="newpassword"></td>
		              </tr>
		              <tr class="hide an">
		                <td>Nhập lại mật khẩu mới</td>
		                <td><input type="password" class="large-field" value="" name="renewpassword"></td>
		              </tr>
		            </tbody>
		        </table>
		        <div class="buttons">
		            <div class="right">
		              <input type="submit" class="button an" id="submit" value="Xác nhận thay đổi">
                  <input type="button" class="button hienbutton" id="change" value="Thay đổi? ">
		            </div>
		        </div>
	        </form>          
        </div>
      </div>
      <div class="checkout">
        <div class="checkout-heading" style="color: green">THÔNG TIN ĐƠN HÀNG ({{count($bill)}})</div>
        @if(Session::has('cancel'))
            <h2 style="color: green">{{Session::get('cancel')}}</h2>
          @endif
        <div class="checkout-content">
            <tbody>                             
                  <table class="form" >
                <tbody>
                  <tr>
                    <td><span class="required"></span> Họ tên: {{Auth::user()->name}}</td>
                  </tr>
                  <tr>
                    <td>Địa chỉ: {{Auth::user()->address}}</td>                    
                  </tr>
                  <tr>
                    <td>E-mail: {{Auth::user()->email}}</td>
                  </tr>
                  <tr>
                    <td>Số điện thoại: {{Auth::user()->phone}}</td>
                  </tr>
                  <tr ><td><div class="checkout-heading">------------------</div></td></tr>
                  @foreach($bill as $b)                  
                  <tr><td style="color: green">MÃ ĐƠN: <span style="color: red">{{$b->id}}</span></td></tr>
                  <tr><td>Người nhận: {{$b->name}}</td></tr>  
                  <tr><td>Địa chỉ nhận hàng: {{$b->address}}</td></tr>                             
                  <tr>
                    <td>Sản phẩm: </td>
                  </tr>
                  @foreach($billDetail as $bD )
                    @if($bD->bill_id==$b->id)
                    <tr>
                      <td> &nbsp &nbsp {{$products[$bD->goods_id]->name}} <br>
                        &nbsp &nbsp Số lượng: {{$bD->amounts}} cái<br>
                        &nbsp &nbsp Giá: {{number_format($bD->price)}} đồng</td>
                    </tr>
                    @endif
                  @endforeach
                  <tr>
                    <td>Tổng cộng: {{number_format($b->price)}} đồng</td>
                  </tr>
                  <tr>
                    <td >Trạng thái: @if($b->status == -1) <span style="color: red">Chờ xác nhận @elseif($b->status == 0)<span style="color: purple"> Đang giao, chờ thanh toán @elseif($b->status == 1) <span style="color: green"> Đã thanh toán @else <span style="color: red"> Đã hủy  @endif</span></td>
                  </tr>
                  @if($b->status == -1)<tr><td><a class="button" href="{{route('cancel-bill',$b->id)}}">HỦY</a></td></tr>@endif 
                  <tr ><td><div class="checkout-heading">------------------</div></td></tr>
                  @endforeach
                </tbody>
            </table>
            </tbody>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $("#change").click(function(){
        if($("#change").hasClass("hienbutton")){
          $(".hide").addClass("hien");
          $(".hide").removeClass("an");
          $("#submit").addClass("hien");
          $("#submit").removeClass("an");
          $("#change").addClass("an");
          $("#change").removeClass("hienbutton");
        }
        // else{
        //   $(".hide").addClass("an");
        //   $(".hide").removeClass("hien");
        //   $("#submit").addClass("an");
        //   $("#submit").removeClass("hien");
        // }
      });
    </script>
@stop