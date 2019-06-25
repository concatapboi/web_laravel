<div class="box">
        <div class="box-heading">Latest</div>
        <div class="box-content">
          <div class="box-product">
            @foreach($goods_latest as $g)
              <div>
                <div class="image"><a href="{{route('san-pham-info',[implode('-',explode(' ',$g->name)).'-',$g->id])}}"><img src="{{url('admin/'.$g->img_link)}}" width="60" height="60" alt="{{$g->name}}" /></a></div>
                <div class="name"><a href="">{{$g->name}}</a></div>
                <div class="price"> {{number_format($g->price)}} đ </div>                
              </div>
            @endforeach
          </div>
        </div>
      </div>