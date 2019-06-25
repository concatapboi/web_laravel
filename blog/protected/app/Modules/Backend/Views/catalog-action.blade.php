@extends('Backend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>NHÀ SẢN XUẤT</h1>
      @if(Session::has('xuly'))
          <h2 style="color: green">{{Session::get('xuly')}}</h2>
      @endif
        <form enctype="multipart/form-data" method="post" action="{{route('xuly-catalog')}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="cart-info">
            @if(count($errors)>0)
            <h2 style="color: red">
              @foreach($errors->all() as $err)
                {{$err}}<br>
              @endforeach
            </h2>
            @endif
            <table>
              <thead>
                <tr>
                  <td >ID</td>
                  <td >Tên</td>
                  @if($action!=-1)
                  <td >Ngày tạo</td>
                  <td >Ngày cập nhật gần đây</td>
                  @endif
                  <td></td>
                </tr>
              </thead>
              @if($action==-1)
                <tbody>            
                  <tr>
                    <td><input type="text" name="id" value="Mã tự tăng" disabled></td>
                    <td><input type="text" name="name" value=""></td>
                    <td><input class="button" style="background-color: green" type="submit" name="submit" value="OK"></td>                
                  </tr>
                </tbody>
            </table>
          </div>
        </form>
              @else              
                <tbody>
                  <tr>
                    <td><input type="text" name="id" value="{{$catalog->id}}"></td>
                    <td><input type="text" name="name" value="{{$catalog->name}}"></td>
                    <td><input type="text" name="" value="{{$catalog->created_at}}" disabled></td>
                    <td><input type="text" name="" value="{{$catalog->updated_at}}" disabled></td> 
                    <td><input class="button" style="background-color: green" type="submit" name="submit" value="OK"></td>                
                  </tr>
                </tbody>
            </table>
          </div>
        </form>          
            @endif        
  </div>
@stop