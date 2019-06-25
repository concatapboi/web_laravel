@if(Auth::guard('admin')->check())
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Admin Area</title>
<link href="{{url('image/favicon.png')}}" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="{{url('css/stylesheet.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('css/slideshow.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('css/colorbox.html')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('css/carousel.css')}}" media="screen" />
<!-- CSS Part End-->
<!-- JS Part Start-->
<script type="text/javascript" src="{{url('js/jquery-1.7.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.nivo.slider.pack.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.jcarousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/colorbox/jquery.colorbox-min.js')}}"></script>
<script type="text/javascript" src="{{url('js/tabs.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.easing-1.3.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/cloud_zoom.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.dcjqaccordion.js')}}"></script>
<!-- JS Part End-->
</head>
<body>
<div class="main-wrapper">
  <!-- Header Parts Start-->
  @include('Backend::layouts.header')
  <!--Top Navigation Start-->  
  <!--Top Navigation Start-->
  @include('Backend::layouts.danhmuc')
  <div id="container">
    <!--Left Part-->
    
    <!--Left End-->
    <!--Middle Part Start-->
    @yield('content')
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
    </div>
  </div>
</div><!--Footer Part Start-->
<!--Footer Part End-->
</body>

</html>
@else
@include('Backend::login')
@endif