@extends('Frontend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>Đăng ký tài khoản</h1>
      <form enctype="multipart/form-data" method="post" action="{{route('dk-tai-khoan')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if(count($errors)>0)
          <h2 style="color: red">
            @foreach($errors->all() as $err)
              {{$err}}<br>
            @endforeach
          </h2>
        @endif
        @if(Session::has('thanhcong'))
          <h2 style="color: green">{{Session::get('thanhcong')}}</h2>
        @endif
        <h2>Thông tin cá nhân</h2>
        <div class="content">
          <table class="form">
            <tbody>
              <tr>
                <td><span class="required">*</span> Tên đăng nhập:</td>
                <td><input class="large-field" type="text" value="" name="username"></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Họ tên:</td>
                <td><input class="large-field" type="text" value="" name="name"></td>
              </tr>
              <tr>
                <td><span class="required">*</span>Địa chỉ email:</td>
                <td><input class="large-field" type="text" value="" name="email"></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Số điện thoại:</td>
                <td><input class="large-field" type="text" value="" name="telephone"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <h2>Địa chỉ</h2>
        <div class="content">
          <table class="form">
            <tbody>
              <tr>
                <td><span class="required">*</span>Địa chỉ:</td>
                <td><input class="large-field" type="text" value="" name="address"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <h2>Mật khẩu</h2>
        <div class="content">
          <table class="form">
            <tbody>
              <tr>
                <td><span class="required">*</span> Mật khẩu:</td>
                <td><input class="large-field" type="password" value="" name="password"></td>
              </tr>
              <tr>
                <td><span class="required">*</span>Nhập lại mật khẩu:</td>
                <td><input class="large-field" type="password" value="" name="confirm"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="buttons">
          <div class="right">
            <input type="submit" class="button" value="Tiếp tục">
          </div>
        </div>
      </form>
    </div>
@stop