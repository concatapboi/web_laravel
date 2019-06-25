@extends('Frontend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>Liên hệ</h1>
      <h2>Vị trí</h2>
      <div class="contact-info">
        <div class="content">
          <div class="left">
            <h4><b>Địa chỉ:</b></h4>
            <p>401, Dhaval Plaza, New Duperi Road, New Mumbai, Maharashtra<br>
              Address 1</p>
          </div>
          <div class="right">
            <h4><b>Điện thoại:</b></h4>
            123456789<br>
            <br>
          </div>
        </div>
      </div>
      <h2>Thông tin</h2>
      <div class="content"> <b>Tên:</b><br>
        <input class="large-field" type="text" value="test" name="name">
        <br>
        <br>
        <b>Địa chỉ e-mail:</b><br>
        <input class="large-field" type="text" value="test@test.com" name="email">
        <br>
        <br>
        <b>Ý kiến:</b><br>
        <textarea style="width: 98%;" rows="10" cols="40" name="enquiry"></textarea>
      </div>
      <div class="buttons">
        <div class="right">
          <input type="submit" class="button" value="Continue">
        </div>
      </div>
    </div>
@stop