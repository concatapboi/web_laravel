<div id="menu"><span>Menu</span>
    <ul>
      <li class="home"><a  title="Home" href="{{route('trang-chu')}}"><span>Trang chủ</span></a></li>
      <li><a href="{{route('ds-san-pham')}}">Sản phẩm</a>
        <div>
          <ul>
            @foreach ($catalog_item as $c)
              <li><a href="{{route('san-pham',[implode('-',explode(' ',$c->name)).'-',$c->id])}}">{{$c->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </li>
    </ul>
  </div>