<div class="box">
        <div class="box-heading">Danh mục sản phẩm</div>
        <div class="box-content box-category">
          <ul id="custom_accordion">
            @foreach($catalog_item as $value)
            <li class="category25"><a class="cuuchild " href="{{route('san-pham',[implode('-',explode(' ',$value->name)).'-',$value->id])}}">{{$value->name}}</a> <span class="down"></span>
              <ul>
                @foreach($catalog_detail as $cd)
                  @if($cd->catalog_id == $value->id)
                    <li class="category30"><a class="nochild " href="{{route('san-pham-detail',[implode('-',explode(' ',$cd->name)).'-',$cd->id])}}">{{$cd->name}}</a></li>
                  @endif
                @endforeach          
              </ul>
            </li>
            @endforeach         
          </ul>
        </div>
      </div>