@extends('frontend.layouts.master')
@section('css')
    <style>
        .bthv:hover{
            color: white;
            background-color: #ff3f3f !important;
            border-color: red;
        }
        p span{
            font-family: 'Encode Sans SC', sans-serif !important;
            font-weight: bold;
            font-size: 15px;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@300;600&display=swap" rel="stylesheet">
@endsection
@section('content')

<div class="breadcumb-area overlay pos-rltv">
            <div class="bread-main">
                <div class="bred-hading text-center">
                    <h5>Chi Tiết Sản Phẩm</h5> </div>
                <ol class="breadcrumb">
                    <li class="home"><a title="Go to Home Page" href="{{route('client.home')}}">Trang chủ</a></li>
                    <li class="active">Chi tiết sản phẩm</li>
                </ol>
            </div>
        </div>
        <!--breadcumb area end -->

        <!--single-protfolio-area are start-->
        <div class="single-protfolio-area ptb-70">
          <div class="container">
              <div class="row">
                    <div class="col-lg-7">
                       <div class="portfolio-thumbnil-area">
                        <div class="product-more-views">
                            <div class="tab_thumbnail" data-tabs="tabs">
                                <div class="thumbnail-carousel">
                                    <ul class="nav">
                                        @if(count($imgg)==0)
                                            <li>
                                                <a class="imgActive"><img src="/frontend/images/no-image.png" alt></a>
                                            </li>
                                        @else
                                        @foreach($imgg as $images)
                                       <li>
                                        <a class="imgActive" href="{{'#view'.$images->id}}" aria-controls="{{'view'.$images->id}}" data-toggle="tab"><img src="{{url(\Illuminate\Support\Facades\Storage::url($images->path))}}" alt></a>
                                       </li>
                                       @endforeach
                                        @endif
                                       <!-- <li>
                                        <a href="#view22" class="shadow-box" aria-controls="view22" data-toggle="tab"><img src="/frontend/images/02.jpg" alt></a></li>
                                       <li>
                                        <a href="#view33" class="shadow-box" aria-controls="view33" data-toggle="tab"><img src="/frontend/images/03.jpg" alt></a></li>
                                       <li>
                                        <a href="#view44" class="shadow-box" aria-controls="view44" data-toggle="tab"><img src="/frontend/images/04.jpg" alt></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content active-portfolio-area pos-rltv">
                           <div class="social-tag">
                              <a href="#"><i class="zmdi zmdi-share"></i></a>
                           </div>
                            @if(count($imgg)==0)
                                <div role="tabpanel" class="tab-pane">
                                    <div class="product-img">
                                        <a href=""><img src="/frontend/images/no-image.png" alt="Single portfolio"></a>
                                    </div>
                                </div>
                            @else
                           @foreach($imgg as $images)
                            <div role="tabpanel" class="tab-pane" id="{{'view'.$images->id}}">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="/frontend/images/product/01.jpg"><img src="{{url(\Illuminate\Support\Facades\Storage::url($images->path))}}" alt="Single portfolio"></a>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                    <div class="col-lg-5">
                        <div class="single-product-description p-0">
                           <div class="sp-top-des pt-3">
                                <h3>{{$infoProduct->name}}</h3>
                                <div class="prodcut-ratting-price">
                                    <div class="prodcut-ratting">
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                    </div>
                                    <div class="prodcut-price">
                                        <div class="new-price">{{number_format($infoProduct->sale_price). ' VNĐ'}}</div>
                                        <div class="old-price"> <del>{{number_format($infoProduct->sale_price+$infoProduct->sale_price*40/100). ' VNĐ'}}</del> </div>
                                    </div>
                                </div>
                            </div>

{{--                            <div class="sp-des">--}}
{{--                                {!! $infoProduct->content !!}--}}
{{--                            </div>--}}
                            <div class="sp-bottom-des">
                            <div class="single-product-option">
                                <div class="sort product-type">
                                    <label>Size: </label>
                                    <ul class="size-filter mt-30">
                                        @foreach(\App\Models\Product::$size_text as $key => $value)
{{--                                            {{request()->fullUrlWithQuery(['size'=>$key])}}--}}
                                            <li><a href="?size={{$key}}" class="{{request()->size==$key?'size-bg':''}} mb-2">{{$value}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @if(request()->size)
                                    <div class="sort product-type">
                                        <ul class="size-filter mt-30">
                                            @if(count($color)==1&&$color[0]=='')
                                                <li><b>Hiện tại mẫu giày chưa có size {{request()->size}}</b></li>
                                            @else
                                                <label class="mb-30">Màu : </label><br>
                                                @foreach($color as $colo)
                                                    <li><a href="{{request()->fullUrlWithQuery(['color'=>$colo])}}" style="background-color: {{'#'.$colo}};{{request()->color==$colo?"box-shadow:5px 5px 5px 1px #9c9c9c":''}}"></a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="quantity-area">
                                <label>Số lượng : </label>
                                <div class="cart-quantity">
                                    <form action="{{ route('frontend.cart.add', ['id' => $infoProduct->slug]) }}" method="GET" id="myform">
                                        <div class="product-qty">
                                            <div class="cart-quantity">
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton">-</div>
                                                        <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{request()->size}}" name="size">
                                        <input type="hidden" value="{{request()->color}}" name="color">
                                        <div class="social-icon socile-icon-style-1">

                                                @if(request()->size && request()->color)

                                                    <button type="submit" class="mt-3 btn btn-secondary w-100 h-50 bthv rounded"><h6 class="m-3"><i class="fa fa-cart-plus pr-1"></i> | Thêm vào giỏ</h6></button>

                                                @else
                                                    <button onclick="return false;" class="mt-3 btn btn-secondary w-100 h-50 rounded disabled"><h6 class="m-3"><i class="fa fa-cart-plus pr-1"></i> | Thêm vào giỏ</h6></button>
                                                @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                                <div>
                                    @if($infoProduct->status == 0)
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Xin lỗi ! </h4>
                                            <p>{{$infoProduct->name}} hiện tại đang hết hàng</p>
                                            <hr class="m-0">
                                            <p class="mb-0 mt-3">Nhưng bạn vẫn có thể thêm chúng vào giỏ hàng của mình ... chúng tôi sẽ xác nhận khi hàng mới về.</p>
                                        </div>
                                    @endif
                                </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        </div>
        <!--single-protfolio-area are start-->

        <!--descripton-area start -->
        <div class="descripton-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-area tab-cars-style">
                            <div class="title-tab-product-category row">
                                <div class="col-lg-12 text-center">
                                    <ul class="nav mb-40 heading-style-2" role="tablist">
                                        <li role="presentation"><a href="#newarrival" aria-controls="newarrival" role="tab" data-toggle="tab">Mô tả</a></li>
                                        <li role="presentation"><a class="active" href="#bestsellr" aria-controls="bestsellr" role="tab" data-toggle="tab">Bình luận</a></li>
                                        <li role="presentation"><a href="#specialoffer" aria-controls="specialoffer" role="tab" data-toggle="tab">Cách chọn size</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12">
                                <div class="content-tab-product-category w-100 m-auto">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fix fade in w-75 m-auto" id="newarrival">
                                        <div class="review-wraper font-roboto">
                                            <b>{!! $infoProduct->content !!}</b>
                                            @if($infoProduct->content_morez)
                                                <div class="pt-3">
                                                    <h3>Thông tin</h3>
                                                    <ul>
                                                        @foreach($infoProduct->content_morez as $key => $value)
                                                            <li><i class="fa fa-caret-right pr-3" aria-hidden="true"></i>{{$value}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fix fade show active w-75 m-auto" id="bestsellr">
                                        <div class="review-wraper">
{{--                                            @dd(count($comments))--}}
                                            @if(count($comments)!=0)
                                                @for($i = 0 ; $i < count($comments) ; $i++)
                                                    <div class="row">
                                                        <div class="col-1 pb-3">
                                                            <img src="{{url(\Illuminate\Support\Facades\Storage::url($users[$i]->userinfo->avatar))}}" alt="" style="width: 50px;height: 50px;border-radius: 50%">
                                                        </div>
                                                        <div class="col-11">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p><b>{{$users[$i]->name}}</b></p>

                                                                </div>
                                                                <div class="col-12">
                                                                    <p class="pl-2">{{$comments[$i]->content}}</p>
                                                                    <i style="font-size: 10px">{{$comments[$i]->created_at}}</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="m-2">
                                                @endfor
                                            @endif
                                        </div>
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            <form action="{{Route('client.comment',$infoProduct->id)}}" method="POST">
                                                @csrf
                                                <div class="row w-75 m-auto pt-5">
                                                    <div class="col-9">
                                                        <input placeholder="Write a comment....." class="input_css" type="text" name="comment">
                                                        <input type="text" name="product_id" value="{{$infoProduct->id}}" hidden>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-secondary w-100 h-100 rounded-right">Gửi</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                    <div role="tabpanel" class="tab-pane fix fade in" id="specialoffer">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Lưu ý !</strong> <br>
                                                    Mỗi mẫu giày và mỗi thương hiệu giày sẽ có số đo riêng nên sẽ có sai số. Hướng dẫn định cỡ và biểu đồ kích thước bên dưới chỉ để giúp khách hàng tìm thấy kích thước gần đúng của họ. Chúng tôi khuyến khích khách hàng đến trực tiếp cửa hàng để mặc thử để chọn size chính xác nhất.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row w-100">
                                                    <div class="col-4 pb-3">
                                                        <div class="row w-100">
                                                            <div class="col-6">
                                                                <img src="/frontend/register/images/tim-size-giay1.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="col-6">
                                                                <h4><b>Bước 1:</b></h4>
                                                                <p>Đặt một tờ giấy trên sàn với một đầu chạm vào mép tường. Đứng trên tờ giấy sao cho gót chân của bạn vừa chạm vào mép tường.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 pb-3">
                                                        <div class="row w-100">
                                                            <div class="col-6">
                                                                <img src="/frontend/register/images/tim-size-giay2.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="col-6">
                                                                <h4><b>Bước 2:</b></h4>
                                                                <p>Đánh dấu điểm dài nhất của ngón chân. Nếu bàn chân của bạn không đều nhau (bên dài, bên ngắn), hãy đo bàn chân dài hơn. Mẹo: Sẽ dễ dàng hơn nếu bạn không có và nhờ người khác kiểm tra.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 pb-3">
                                                        <div class="row w-100">
                                                            <div class="col-6">
                                                                <img src="/frontend/register/images/tim-size-giay3.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="col-6">
                                                                <h4><b>Bước 3:</b></h4>
                                                                <p>Dùng thước để đo khoảng cách từ gót chân đến điểm dài nhất của ngón chân. Sử dụng bảng chuyển đổi kích thước bên dưới để chuyển đổi cm sang kích thước giày của bạn.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row w-100">
                                                            <div class="col-6">
                                                                <table class="table table-striped">
                                                                    <tr>
                                                                        <td>EU</td>
                                                                        <td>US nam</td>
                                                                        <td>US nữ</td>
                                                                        <td>Chiều dài chân</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>36</td>
                                                                        <td></td>
                                                                        <td>6</td>
                                                                        <td>~22.5cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>37</td>
                                                                        <td></td>
                                                                        <td>6.5</td>
                                                                        <td>~23cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>38</td>
                                                                        <td></td>
                                                                        <td>7.5</td>
                                                                        <td>~23.8cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>39</td>
                                                                        <td></td>
                                                                        <td>8.5</td>
                                                                        <td>~24.6cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>40</td>
                                                                        <td>7</td>
                                                                        <td>9.5</td>
                                                                        <td>~25cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>41</td>
                                                                        <td>8</td>
                                                                        <td>10.5</td>
                                                                        <td>~25.5cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>42</td>
                                                                        <td>9</td>
                                                                        <td></td>
                                                                        <td>~26cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>43</td>
                                                                        <td>10</td>
                                                                        <td></td>
                                                                        <td>~26.8cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>44</td>
                                                                        <td>11</td>
                                                                        <td></td>
                                                                        <td>~27.8cm</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="col-6">
                                                                <h4><b>Mẹo tìm size giày chính xác nhất</b></h4>
                                                                <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Tốt nhất nên đo cỡ giày của bạn vào cuối ngày vì lúc này chân của bạn đã được thư dãn.</p>
                                                                <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Bạn nên đo cả hai bàn chân, nếu có sai số giữa hai bàn chân, hãy chọn những đôi giày có kích thước vừa với bàn chân lớn hơn của bạn.</p>
                                                                <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Nếu bạn là người thích đi những đôi giày hơi rộng một chút cho thoải mái. Vui lòng cộng thêm 1cm - 1.5 cm khi đo chiều dài bàn chân.</p>
                                                                <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Nếu chân bạn mập, dày và rộng thì chọn size theo hướng dẫn ở trên cộng thêm 1 đến 1,5 size.</p>
                                                                <p><b style="color: red">Hãy lưu ý rằng : </b>Bảng chuyển đổi kích thước giày ở trên là ước tính gần đúng dựa trên kích thước lý tưởng, với mỗi thương hiệu có kích thước riêng. Do đó, kích cỡ của bạn có thể thay đổi theo thương hiệu (ví dụ: cỡ giày Nike của bạn là 40, nhưng cỡ giày adidas của bạn có thể là 40,5 hoặc 39). TunzSneaker không tuyên bố rằng bảng kích thước giày này là chính xác 100% cho tất cả các thương hiệu giày. Mục đích của bảng kích thước này là giúp bạn có thông tin để tham khảo và cân nhắc kích thước tương đối cho mình. Bạn có thể chật hơn hoặc rộng hơn khi sử dụng bảng kích thước này để chọn kích cỡ của mình khi mua giày. Nếu bạn cảm thấy không biết mình nên chọn size nào khi đặt hàng, đừng ngần ngại liên hệ trực tiếp với nhân viên của chúng tôi.</p>
                                                                <p><b style="color: red">* Kích thước được sử dụng trên trang web của chúng tôi là kích thước EU</b></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--descripton-area end-->

        <!--new arrival area start-->
        <div class="new-arrival-area ptb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="heading-title heading-style pos-rltv mb-50 text-center">
                            <h5 class="uppercase">Có thể bạn quan tâm</h5>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                            @foreach($proRelated as $product)
                                <div class="col-lg-3">
                                    <!-- single product start-->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="product-label">

                                                @if($product->status == 1)
                                                    <div class="new" style="background-color: red;color: white">
                                                        Giảm giá
                                                    </div>
                                                @elseif($product->status == 0)
                                                    <div class="new" style="background-color: yellow;color: black">
                                                        Tạm hết hàng
                                                    </div>
                                                @else
                                                    <div class="new" style="background-color: grey;color: white">
                                                        Tạm dừng bán
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="single-prodcut-img  product-overlay pos-rltv">
                                                @if(count($product->images) == 0)
                                                    <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="/frontend/images/no-image.png" class="primary-image" > <img alt src="/frontend/images/no-image.png" class="secondary-image" > </a>
                                                @elseif(count($product->images) == 1)
                                                    <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image" > <img alt src="{{$product->images[0]->image_url}}" class="secondary-image" > </a>
                                                @elseif(count($product->images)>=2)
                                                    <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image" > <img alt src="{{$product->images[1]->image_url}}" class="secondary-image" > </a>
                                                @endif
                                            </div>
                                            <div class="product-icon socile-icon-tooltip text-center">
                                                <ul>
                                                    <li><a href="{{ route('frontend.cart.add', ['id' => $infoProduct->slug]) }}" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>

                                                    <li><a href="#" data-toggle="modal" data-target="#xemnhanh" class="q-view xemnhanh" data-id_product="{{$product->id}}"><i class="zmdi zmdi-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="prodcut-name"> <a href="{{Route('productimg.home',['id'=>$product->slug])}}">{{$product->name}}</a>
                                            </div>
                                            <div class="prodcut-ratting-price">
                                                <div class="prodcut-price">
                                                    <div class="new-price">{{ number_format($product->sale_price).' VNĐ' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single product end-->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form>@csrf</form>
            <!-- Modal -->

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>

        //<![CDATA[

        // $('.atvnav').addClass('active');

      $(".imgActive").first().addClass('active');
      $(".tab-pane").first().addClass('active');
        //]]>

    </script>
@endsection
