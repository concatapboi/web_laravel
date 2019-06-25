@extends('Backend::layouts.master')
@section('content')
<div id="content">
      <!--Breadcrumb Part Start-->
      <!--Breadcrumb Part End-->
      <h1>SẢN PHẨM</h1>
      @if(Session::has('xuly'))
          <h2 style="color: green">{{Session::get('xuly')}}</h2>
      @endif
        <form enctype="multipart/form-data" method="post" action="{{route('xuly-product')}}">
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
                  <td><select class="large-field" id="catalog_id1" name="catalog_id">
                    @foreach($cat as $c)                    
                      <option value="{{$c->id}}">{{$c->id}}- {{$c->name}}</option>
                    @endforeach                  
                    </select></td>
                </tr>   
                <tr>
                  <td>Danh mục sản phẩm:</td>
                  <td><select class="large-field" id="catdetail_id1" name="catdetail_id">
                    @foreach($catDetail as $cd)
                      <option value="{{$cd->id}}">{{$cd->id}}- {{$cd->name}}</option>
                    @endforeach                  
                    </select></td>
                </tr>
                <tr>
                  <td>Giá:</td>
                  <td><input type="text" class="large-field" value="" name="price"></td>
                </tr> 
                <tr>
                  <td>Giảm giá:</td>
                  <td><input type="text" class="large-field" value="0" name="discount"></td>
                </tr> 
                <tr>
                  <td>Số lượng:</td>
                  <td><input type="text" class="large-field" value="1" name="amounts"></td>
                </tr>
                <tr>
                  <td>Hình ảnh:<br>                    
                  </td>
                  <td><input type="file" name="img"></td>
                </tr>             
                <tr>
                  <td colspan="2"><input class="button" style="background-color: green" type="submit" name="submit" value="OK"></td>
                </tr>
              </tbody>
              @else
              <tbody>
                <tr>
                  <td>ID:</td>
                  <td><input type="text" class="large-field" value="{{$product->id}}" name="id"></td>
                </tr>
                <tr>
                  <td>Tên:</td>
                  <td><input type="text" class="large-field" value="{{$product->name}}" name="name"></td>
                </tr>
                <tr>
                  <td>Nhà sản xuất:</td>
                  <td><select class="large-field" id="catalog_id2" name="catalog_id">
                    @foreach($cat as $c) 
                    @if($c->id== $product->catalog_id)                   
                      <option value="{{$c->id}}" selected>{{$c->id}}- {{$c->name}}</option>@else <option value="{{$c->id}}">{{$c->id}}- {{$c->name}}</option> @endif
                    @endforeach                  
                    </select></td>
                </tr>
                <tr>
                  <td>Danh mục sản phẩm:</td>
                  <td><select class="large-field" id="catdetail_id2" name="catdetail_id">
                    @foreach($catDetail as $cd)
                    @if($cd->id == $product->catalog_detail_id)
                      <option value="{{$cd->id}}" selected>{{$cd->id}}- {{$cd->name}}</option>@else <option value="{{$cd->id}}">{{$cd->id}}- {{$cd->name}}</option> @endif
                    @endforeach
                    </select></td>
                </tr> 
                <tr>
                  <td>Ngày tạo:</td>
                  <td><input type="text" name="created" value="{{$product->created_at}}" disabled></td>
                </tr>
                <tr>
                  <td>Cập nhật lần cuối:</td>
                  <td><input type="text" name="upated" value="{{$product->updated_at}}" disabled></td>
                </tr>
                <tr>
                  <td>Giá:</td>
                  <td><input type="text" class="large-field" value="{{$product->price}}" name="price"></td>
                </tr> 
                <tr>
                  <td>Giảm giá:</td>
                  <td><input type="text" class="large-field" value="{{$product->discount}}" name="discount"></td>
                </tr>
                <tr>
                  <td>Số lượng:</td>
                  <td><input type="text" class="large-field" value="{{$product->amounts}}" name="amounts"></td>
                </tr>
                <tr>
                  <td>Hình ảnh:<br>                    
                  </td>
                  <td><img src="{{url($product->img_link)}}" width="200" height="200"><br><input type="file" name="img"></td>
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
  <script>
    $(document).ready(function(){      
      $('#catalog_id1').change(function(){
        var id = $('#catalog_id1 :selected').val();
        $.get("../ajax-cat-detail/"+id,function(data){
          $("#catdetail_id1").html(data);
        });
      });
      $('#catalog_id2').change(function(){
        var id = $('#catalog_id2 :selected').val();
        $.get("../ajax-cat-detail/"+id,function(data){
          $("#catdetail_id2").html(data);
        });
      });
    });
</script>  
@stop