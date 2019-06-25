<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Bigshop HTML Template</title>
<link href="image/favicon.png" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/slideshow.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/colorbox.html" media="screen" />
<link rel="stylesheet" type="text/css" href="css/carousel.css" media="screen" />
<!-- CSS Part End-->
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="js/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/cloud_zoom.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script>
<!-- JS Part End-->
</head>
<body>
<div class="main-wrapper">
  <!-- Header Parts Start-->
  <div id="header">
    <!-- Top Right part Links-->
    <div id="welcome">      
      <div class="links">Tài khoản
        <ul>
          <li><a href="#">Tài khoản</a></li>
          <li><a href="#" id="wishlist-total">Sản phẩm yêu thích (0)</a></li>
          <li><a href="cart.html">Giỏ hàng</a></li>
          <li><a href="checkout.html">Checkout</a></li>
        </ul>
      </div>
      <a href="login.html">Đăng nhập</a> <a href="register.html">Tạo tài khoản mới</a> </div>
    <div id="logo"><a href="index-2.html"><img src="image/logo.png" title="ecommerce Html Template" alt="ecommerce Html Template" /></a></div>
    <div id="search">
      <div class="button-search"></div>
      <input type="text" value="" placeholder="" id="filter_name" name="search">
    </div>
    <!--Mini Cart Start-->
    <div id="cart">
      <div class="heading">
        <h4><img width="32" height="32" alt="small-cart-icon" src="image/cart-bg.png"></h4>
        <a><span id="cart-total">0 sản phẩm - 0.00đ</span></a></div>
      <div class="content">
        <div class="mini-cart-info">          
          @yield('mini-cart-info')
        </div>
        <div class="mini-cart-total">
          @yield('mini-cart-total')
        </div>
        <div class="checkout"><a href="cart.html" class="button">View Cart</a> &nbsp; <a href="checkout.html" class="button">Checkout</a></div>
      </div>
    </div>
    <!--Mini Cart End-->
  </div>
  <!--Top Navigation Start-->
  <div id="menu"><span>Menu</span>
    @yield('menu')
  </div>
  <!--Top Navigation Start-->
  <div id="container">
    <!--Left Part-->
    <div id="column-left">
      <!--Categories Part Start-->
      <div class="box">
        <div class="box-heading">Categories</div>
        <div class="box-content box-category">
          @yield('categories')
        </div>
      </div>
      <!--Categories Part End-->
      <!--Latest Product Start-->
      <div class="box">
        <div class="box-heading">Mới nhất</div>
        <div class="box-content">
          <div class="box-product">
            @yield('latest')
          </div>
        </div>
      </div>
      <!--Latest Product End-->
      <!--Specials Product Start-->
      <div class="box">
        <div class="box-heading">Đặc biệt</div>
        <div class="box-content">
          <div class="box-product">
            @yield('specials')
          </div>
        </div>
      </div>
      <!--Specials Product End-->
    </div>
    <!--Left End-->
    <!--Middle Part Start-->
    <div id="content">
      <p class="welcome">" The clean and modern look allows you to&nbsp; use the theme for every kind of eCommerce online shop. Great Looks on Desktops, Tablets and Mobiles."</p>
      <!--Slideshow Part Start-->
      <div class="slider-wrapper">
        <div id="slideshow" class="nivoSlider"> <a href="#"><img src="image/slider/slider-1.jpg" alt="slideshow-1" /></a> <a href="#"><img src="image/slider/slider-2.jpg" alt="slideshow-2" /></a> <a href="#"><img src="image/slider/slider-3.jpg" alt="slideshow-3" /></a> <a href="#"><img src="image/slider/slider-4.jpg" alt="slideshow-4" /></a> </div>
      </div>
      <script type="text/javascript">
$(document).ready(function() {
    $('#slideshow').nivoSlider();
});
</script>
      <!--Slideshow Part End-->
      <!--Featured Product Part Start-->
      @yield('main')
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
  </div>
</div>
<!--Footer Part Start-->
<div id="footer">
  <div class="column">
    <h3>Thông tin</h3>
    <ul>
      <li><a href="about-us.html">Về chúng tôi</a></li>
      <li><a href="about-us.html">Dịch vụ chuyển phát</a></li>
      <li><a href="about-us.html">Chính sách dịch vụ</a></li>
    </ul>
  </div>
  <div class="column">
    <h3>Chăm sóc khách hàng</h3>
    <ul>
      <li><a href="contact-us.html">Liên hệ</a></li>
      <li><a href="#">Đổi trả</a></li>
      <li><a href="sitemap.html">Bản đồ</a></li>
    </ul>
  </div>
  <div class="column">
    <h3>Tài khoản</h3>
    <ul>
      <li><a href="#">Tài khoản</a></li>
      <li><a href="#">Lịch sử mua hàng</a></li>
      <li><a href="#">Sản phẩm yêu thích</a></li>
    </ul>
  </div>
  <div class="contact">
    <ul>
      <li class="address">Sao hỏa</li>
      <li class="mobile">191 191 91 19</li>
      <li class="email"><a href="mailto:info@demo.com">info@demo.com</a></li>
      <li class="fax">191 191 91 19</li>
    </ul>
  </div>
  <div class="social"> <a href="http://facebook.com/" target="_blank"><img src="image/facebook.png" alt="Facebook" title="Facebook"></a> <a href="https://twitter.com/" target="_blank"><img src="image/twitter.png" alt="Twitter" title="Twitter"></a> <a href="https://plus.google.com/" target="_blank"><img src="image/googleplus.png" alt="Google+" title="Google+"></a> <a href="http://pinterest.com/" target="_blank"><img src="image/pinterest.png" alt="Pinterest" title="Pinterest"></a> <a href="http://www.youtube.com/#" target="_blank"><img src="image/youtube.png" alt="YouTube" title="YouTube"></a> <a href="skype:#?call" target="_blank"><img src="image/skype.png" alt="skype" title="Skype"></a> <a href="#" target="_blank"><img src="image/blogger.png" alt="Blogger" title="Blogger"></a> </div>
  <div class="clear"></div>
  <div id="powered">CaseForest 
    <div class="payments_types"><img src="image/payment_mastercard.png" alt="mastercard" title="MasterCard"> <img src="image/payment_visa.png" alt="visa" title="Visa">  </div>
  </div>
</div>
<!--Footer Part End-->
</body>

</html>