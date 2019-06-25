@extends('Backend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>DANH MỤC SẢN PHẨM</h1>
      @if(Session::has('xuly'))
          <h2 style="color: green">{{Session::get('xuly')}}</h2>
      @endif
        <form enctype="multipart/form-data" method="post" action="{{route('xuly-catalog-detail')}}">
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
              @if($action==-1)
              <tbody>
                <tr>
                  <td>ID:</td>
                  <td><input type="text" class="large-field" value="Mã tự tăng" name="id" disabled></td>
                </tr>
                <tr>
                  <td>Tên:</td>
                  <td><input type="text" class="large-field" value="" name="name"></td>
                </tr>                
                <tr>
                  <td>Nhà sản xuất:</td>
                  <td><select class="large-field" name="catalog_id">
                    @foreach($cat as $c)
                      <option value="{{$c->id}}">{{$c->id}}- {{$c->name}}</option>  
                    @endforeach                  
                    </select></td>
                </tr>                
                <tr>
                  <td colspan="2"><input class="button" style="background-color: green" type="submit" name="submit" value="OK"></td>
                </tr>
              </tbody>
              @else
              <tbody>
                <tr>
                  <td>ID:</td>
                  <td><input type="text" class="large-field" value="{{$catDetail->id}}" name="id"></td>
                </tr>
                <tr>
                  <td>Tên:</td>
                  <td><input type="text" class="large-field" value="{{$catDetail->name}}" name="name"></td>
                </tr>
                <tr>
                  <td>Nhà sản xuất</td>
                  <td><select class="large-field" name="catalog_id">
                    @foreach($cat as $c)
                    @if($c->id == $catDetail->catalog_id)
                      <option value="{{$c->id}}" selected>{{$c->id}}- {{$c->name}}</option>
                    @else
                      <option value="{{$c->id}}">{{$c->id}}- {{$c->name}}</option>@endif  @endforeach                  
                    </select></td>
                </tr>
                <tr>
                  <td>Ngày tạo:</td>
                  <td><input type="text" name="created" value="{{$catDetail->created_at}}" disabled></td>
                </tr>
                <tr>
                  <td>Cập nhật lần cuối:</td>
                  <td><input type="text" name="upated" value="{{$catDetail->updated_at}}" disabled></td>
                </tr>
                <tr>
                  <td colspan="2"><input class="button" style="background-color: green" type="submit" name="submit" value="OK"></td>
                </tr>
              </tbody>
              @endif
          </table>
        </div>
      </form>  
  </div>
@stop