<div id="header">
    <!-- Top Right part Links-->
    <div id="welcome">
      <div class="links">Chào @if(Auth::guard('admin')->check()){{Auth::guard('admin')->user()->name}}  @endif</div>
      <a href="{{route('dang-xuat-admin')}}">Đăng xuất</a>
  	</div>
    <div id="logo"><a href="{{route('trang-chu-admin')}}"><img src="{{url('image/caseforest.png')}}"/></a></div>
    <!--Mini Cart Start-->
    <!--Mini Cart End-->
</div>