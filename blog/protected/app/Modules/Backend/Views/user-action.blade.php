@extends('Backend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>DANH MỤC SẢN PHẨM</h1>
      @if(Session::has('xuly'))
          <h2 style="color: green">{{Session::get('xuly')}}</h2>
      @endif
        <form enctype="multipart/form-data" method="post" action="{{route('xuly-user')}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="cart-info">
            @if(count($errors)>0)
            <h2 style="color: red">
              @foreach($errors->all() as $err)
                {{$err}}<br>
              @endforeach
            </h2>
            @endif
            <table class="form">
              <tbody>
                <tr>
                  <td>ID:</td>
                  <td><input type="text" class="large-field" value="{{$user->id}}" name="id"></td>
                </tr>
                <tr>
                  <td>Tên đang nhập:</td>
                  <td><input type="text" class="large-field" value="{{$user->username}}" name="username"></td>
                </tr>
                <tr>
                  <td>Tên:</td>
                  <td><input type="text" class="large-field" value="{{$user->name}}" name="name"></td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td><input type="text" class="large-field" value="{{$user->email}}" name="email"></td>
                </tr>
                <tr>
                  <td>Phone:</td>
                  <td><input type="text" class="large-field" value="{{$user->phone}}" name="phone"></td>
                </tr>
                <tr>
                  <td>Địa chỉ:</td>
                  <td><input type="text" class="large-field" value="{{$user->address}}" name="address"></td>
                </tr>
                <tr>
                  <td>Ngày tạo:</td>
                  <td><input type="text" name="created" value="{{$user->created_at}}" disabled></td>
                </tr>
                <tr>
                  <td>Cập nhật lần cuối:</td>
                  <td><input type="text" name="upated" value="{{$user->updated_at}}" disabled></td>
                </tr>
                <tr>
                  <td colspan="2"><input class="button" style="background-color: green" type="submit" name="submit" value="OK"></td>
                </tr>
              </tbody>
          </table>
        </div>
      </form>  
  </div>
@stop