<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Case Forest</title>
<link href="{{url('admin/image/favicon.png')}}" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="{{url('admin/css/stylesheet.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('admin/css/slideshow.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('admin/css/colorbox.html')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('admin/css/carousel.css')}}" media="screen" />
<!-- CSS Part End-->
<!-- JS Part Start-->
<script type="text/javascript" src="{{url('admin/js/jquery-1.7.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/jquery.nivo.slider.pack.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/jquery.jcarousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/colorbox/jquery.colorbox-min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/tabs.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/jquery.easing-1.3.min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/cloud_zoom.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/custom.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/jquery.dcjqaccordion.js')}}"></script>
<!-- JS Part End-->
</head>
<body>
<div class="main-wrapper">
  <!-- Header Parts Start-->
  @include('Frontend::layouts.header')
  <!--Top Navigation Start-->
  @include('Frontend::layouts.menu')
  <!--Top Navigation Start-->
  <div id="container">
    <!--Left Part-->
    <div id="column-left">
      <!--Categories Part Start-->
      @include('Frontend::layouts.danhmuc')
      <!--Categories Part End-->
      <!--Latest Product Start-->
      <!--Latest Product End-->
      <!--Specials Product Start-->
      @include('Frontend::layouts.specialproducts')
      <!--Specials Product End-->
    </div>
    <!--Left End-->
    <!--Middle Part Start-->
    @yield('content')
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
    </div>
  </div>
</div>
<!--Footer Part Start-->
@include('Frontend::layouts.footer')
<!--Footer Part End-->
</body>

</html>