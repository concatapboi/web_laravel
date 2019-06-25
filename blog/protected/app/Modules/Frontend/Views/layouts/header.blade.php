<div id="header">
    <!-- Top Right part Links-->
    <div id="welcome">
      @if(Auth::check())
        <div class="links">Chào {{Auth::user()->name}}
          <ul>
            <li><a href="{{route('thong-tin-tai-khoan')}}">Thông tin</a></li>
            <li><a href="{{route('dang-xuat')}}">Đăng xuất</a></li>
          </ul>
        </div>
      @else
          <a href="{{route('dang-nhap')}}">Đăng nhập</a> <a href="{{route('dk-tai-khoan')}}">Tạo tài khoản</a> 
      @endif
    </div>
    <div id="logo"><a href="{{route('trang-chu')}}"><img src="{{url('admin/image/caseforest.png')}}"/></a></div>
    <!--Mini Cart Start-->
    <div id="cart">
      <div class="heading">
        <h4><img width="32" height="32" alt="small-cart-icon" src="{{url('admin/image/cart-bg.png')}}"></h4>
        <a><span id="cart-total">@if(Session::has('cart')){{Session('cart')->amounts}} sản phẩm - {{number_format(Session('cart')->cost)}} đ @else 0 sản phẩm - 0 đ @endif</span></a></div>        
      <div class="content">
        <div class="mini-cart-info">
          <table>
            <tbody>
              @if(Session::has('cart'))
                @foreach($product as $p)
                  <tr>
                    <td class="image"><a href=""><img title="{{$p['item']['name']}}" alt="{{$p['item']['name']}}" width="43" height="43" src="{{url('admin/'.$p['item']['img_link'])}}"></a></td>
                    <td class="name"><a href="">{{$p['item']['name']}}</a></td>
                    <td class="quantity">{{$p['amounts']}}</td>
                    <td class="total">@if($p['item']['discount']!=0){{number_format($p['item']['discount'])}}@else{{number_format($p['item']['price'])}}@endif đ</td>
                    <td class="remove"><a href="{{route('remove-from-cart',$p['item']['id'])}}"><img title="Remove" alt="Remove" src="{{url('admin/image/remove-small.png')}}"></a></td>
                  </tr>
                @endforeach
                <tr><div  class="checkout"><a href="{{route('clean-cart')}}" class="button">Xóa tất cả</a></div></tr>
                @else <tr><td></td></tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="mini-cart-total">
          <table>
            <tbody>
              <tr>
                <td class="right"><b>Tổng đơn:</b></td>
                <td class="right">@if(Session::has('cart')){{number_format(Session('cart')->cost)}} đ@else 0 đ@endif</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="checkout"><a href="{{route('gio-hang')}}" class="button">Xem giỏ hàng</a></div>
      </div>
    </div>
    <!--Mini Cart End-->
  </div>