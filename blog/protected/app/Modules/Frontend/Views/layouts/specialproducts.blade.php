<div class="box">
        <div class="box-heading">Giá sốc</div>
        <div class="box-content">
          <div class="box-product">
            @foreach($goods_special as $g)
              <div>
                <a href="{{route('san-pham-info',[implode('-',explode(' ',$g->name)).'-',$g->id])}}">
                <div class="image"><img src="{{url('admin/'.$g->img_link)}}" width="60" height="60" alt="{{$g->name}}" /></div>
                <div class="name">{{$g->name}}</div>
                <div class="price"> <span class="price-old">{{number_format($g->price)}} đ</span> <span class="price-new">{{number_format($g->discount)}} đ</span> </div>              
              </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>