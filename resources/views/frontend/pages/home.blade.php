@extends('frontend.layouts.master')
@section('css')
@endsection
@section('content-carousel')
<div class="slider-area pos-rltv carosule-pagi cp-line">
            <div class="active-slider">
                <div class="single-slider pos-rltv">
                    <div class="slider-img"><img src="/frontend/images/sneaker3.jpg" alt></div>
                    <div class="slider-content pos-abs">
{{--                        <h4>Giải thưởng</h4>--}}
                        <h1 class="uppercase pos-rltv underline">Thương hiệu Nổi Bật 2019</h1>
                        <a href="{{Route('client.category')}}" class="btn-def btn-white">Mua ngay</a>
                    </div>
                </div>
                <div class="single-slider pos-rltv">
                    <div class="slider-img"><img src="/frontend/images/sneaker2.jpg" alt></div>
                    <div class="slider-content pos-abs">
{{--                        <h4>Giá tốt</h4>--}}
                        <h1 class="uppercase pos-rltv underline">Giá cả cạnh tranh nhất</h1>
                        <a href="{{Route('client.category')}}" class="btn-def btn-white">Mua ngay</a>
                    </div>
                </div>
                <div class="single-slider pos-rltv">
                    <div class="slider-img"><img src="/frontend/images/sneaker4.jpg" alt></div>
                    <div class="slider-content pos-abs">
{{--                        <h4>Đa Dạng</h4>--}}
                        <h1 class="uppercase pos-rltv underline">Mẫu mới cập nhật liên tục</h1>
                        <a href="{{Route('client.category')}}" class="btn-def btn-white">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content')
<div class="delivery-service-area ptb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-service shadow-box text-center">
                            <img src="/frontend/images/garantee.png" alt>
                            <h5>Hoàn tiền <span style="color: red">120%</span></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-service shadow-box text-center">
                            <img src="/frontend/images/coupon.png" alt>
                            <h5>Quà tặng khủng</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-service shadow-box text-center">
                            <img src="/frontend/images/delivery.png" alt>
                            <h5>Miễn phí ship</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-service shadow-box text-center">
                            <img src="/frontend/images/support.png" alt>
                            <h5>Hỗ trợ 24/7</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--delivery service start-->
        <form action="">@csrf</form>
        <!--branding-section-area start-->
        <div class="branding-section-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="active-slider pos-rltv carosule-pagi cp-line pagi-02">
                            @foreach($topSale as $product)

                            <div class="single-slider">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-6 col-md-6">
                                        <div class="brand-img text-center">
                                            @if(count($product->images) == 0)
                                                <img style="width: 60%;margin: 20%;border-radius: 5%;box-shadow: 5px 10px 30px 5px grey" src="/frontend/images/no-image.png" alt>
                                            @else
                                                <img style="width: 60%;margin: 20%;border-radius: 5%;box-shadow: 5px 10px 30px 5px grey" src="{{$product->images[0]->image_url}}" alt>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-6 col-md-6">
                                        <div class="brand-content ptb-55">
                                            <div class="brand-text color-lightgrey">
                                                <h6>Nổi bật</h6>
                                                <h2 class="uppercase montserrat">{{$product->name}}</h2>
                                                <h3 class="montserrat">{{number_format($product->sale_price).' VNĐ'}}</h3>
                                                <div class="s-price-box">
                                                    <h4 class="old-price">{{number_format($product->sale_price+$product->sale_price*30/100).' VNĐ'}}</h4>
                                                </div>
                                                <div class="social-icon-wraper mt-35">
                                                    <div class="social-icon">
                                                        <ul>
                                                            <li><a href="{{route('productimg.home',['id'=>$product->slug])}}" style="width: 150px"><i class="zmdi zmdi-shopping-cart"></i> Mua ngay </a>
                                                            </li>
{{--                                                            <input type="button"  data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh" class="btn btn-default xemnhanh" data-id_product="{{$product->id}}" name="add-to-cart">--}}

                                                            <li><a href="#" data-toggle="modal" data-target="#xemnhanh" class="q-view xemnhanh" data-id_product="{{$product->id}}"><i class="zmdi zmdi-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="brand-timer shadow-box-2 mt-50">
                                                <div class="timer-wraper text-center">
                                                    <div class="timer">
                                                        <div data-countdown="2021/08/01"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--branding-section-area end-->
        <div class="new-arrival-area pt-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="heading-title heading-style pos-rltv mb-50 text-center">
                            <h5 class="uppercase">Mẫu mới về</h5>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="total-shop-product-grid row">
                    @foreach($productt as $product)
                        <div class="col-lg-3 col-md-6 item">
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
                                            <li><a href="{{ route('frontend.cart.add', ['id'=>$product->slug]) }}" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>

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
                    <div class="col-lg-12">
                        <div class="pagination-btn text-center d-flex justify-content-center mt-3">
                            {!! $productt->appends(request()->input())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--new arrival area start-->

        <!--new arrival area end-->

        <!--banner area start-->
        <div class="banner-area pt-70">
            <div class="container">
                <div class="row">


                    <div class="col-lg-6">
                        <div class="">
                            <div class="row  mb-3">
                                <div class="col-md-12">
                                    <div class="sb-img text-center">
                                        @if(count($top1import[0]->images) == 0)
                                            <img style="width: 70%;margin: 0 auto;border-radius: 30%;box-shadow: 5px 10px 30px 5px grey" src="/frontend/images/no-image.png" alt>
                                        @else
                                            <img class="mt-3" style="width: 70%;margin: 0 auto;border-radius: 10% 3%;box-shadow: 5px 10px 30px 5px grey" src="{{$top1import[0]->images[0]->image_url}}" alt>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="sb-content mt-60">
                                        <div class="banner-text text-center">
                                            <h5 class="lato">Đặc biệt</h5>
                                            <h4 class="montserrat"><b>{{$top1import[0]->name}}</b></h4>
                                            <h4 class="montserrat">{{number_format($top1import[0]->sale_price).' VNĐ'}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="w-50 m-auto">
                                        <a class="btn-def  btn2 w-100 m-auto text-center" href="{{Route('productimg.home',['id'=>$top1import[0]->slug])}}">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="w-100" src="https://streetstyle.vn/images/news/18/2..jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!--banner area end-->

        <!--discunt-featured-onsale-area start -->
        <div class="discunt-featured-onsale-area pt-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-area tab-cars-style">
                            <div class="title-tab-product-category">
                                <div class="col-lg-12 text-center">
                                    <ul class="nav mb-40 heading-style-2" role="tablist">
                                        <li role="presentation"><a class="active" href="#newarrival" aria-controls="newarrival" role="tab" data-toggle="tab">Nike</a>
                                        </li>
                                        <li role="presentation"><a href="#bestsellr" aria-controls="bestsellr" role="tab" data-toggle="tab">Adidas</a></li>
                                        <li role="presentation"><a href="#specialoffer" aria-controls="specialoffer" role="tab" data-toggle="tab">Balenciaga</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="content-tab-product-category">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="newarrival">
                                        <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                                            @foreach($proNike as $product)
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
                                                                    <li><a href="{{ route('frontend.cart.add', ['id'=>$product->slug]) }}" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>

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
                                    <div role="tabpanel" class="tab-pane  fade in" id="bestsellr">
                                        <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                                            @foreach($proAdidas as $product)
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
                                                                    <li><a href="{{ route('frontend.cart.add', ['id'=>$product->slug]) }}" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>

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
                                    <div role="tabpanel" class="tab-pane  fade in" id="specialoffer">
                                        <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                                            @foreach($proBalen as $product)
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
                                                                    <li><a href="{{ route('frontend.cart.add', ['id'=>$product->slug]) }}" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>

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
                    </div>
                </div>
            </div>
        </div>
        <!--discunt-featured-onsale-area end-->

        <!--testimonial-area-start-->
        <div class="testimonial-area overlay ptb-70 mt-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="heading-title color-lightgrey text-center w-50">
                            <img src="/frontend/register/images/logo-14.png" style="width: 100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--testimonial-area-end-->

        <!--new-arrival on-sale Top-ratted area start-->
        <div class="new-arrival-area pt-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="heading-title heading-style pos-rltv mb-50 text-center">
                            <h5 class="uppercase">Khác</h5>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                            @foreach($proOut as $product)
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
                                                    <li><a href="{{ route('frontend.cart.add', ['id'=>$product->slug]) }}" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>

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
        <!--new-arrival on-sale Top-ratted area end-->

        <!--brand area are start-->
        <div class="brand-area ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-brand row">
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/01.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/02.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/03.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/04.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/05.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/06.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/01.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/02.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/03.png" alt></a></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single-brand shadow-box"><a href="#"><img src="/frontend/images/04.png" alt></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--brand area are start-->

        <!--blog area are start-->
        <div class="blog-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-blog row">
                            <div class="col-md-4">
                                <div class="single-blog">
                                    <div class="blog-img pos-rltv product-overlay">
                                        <a href="#"><img src="/frontend/images/01_2.jpg" alt></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-blog">
                                    <div class="blog-img pos-rltv product-overlay">
                                        <a href="#"><img src="/frontend/images/02_1.jpg" alt></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-blog">
                                    <div class="blog-img pos-rltv product-overlay">
                                        <a href="#"><img src="/frontend/images/03.jpg" alt></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('js')
    <script>
        $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D days %H:%M:%S'));
            });
        });
    </script>

@endsection
