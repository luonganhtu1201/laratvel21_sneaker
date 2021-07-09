@extends('frontend.layouts.master')
@section('css')
    <style>
        .bthv:hover{
            color: white;
            background-color: #ff3f3f !important;
            border-color: red;
        }
    </style>
@endsection
@section('content')

<div class="breadcumb-area overlay pos-rltv">
            <div class="bread-main">
                <div class="bred-hading text-center">
                    <h5>Prodcut Details</h5> </div>
                <ol class="breadcrumb">
                    <li class="home"><a title="Go to Home Page" href="index.html">Home</a></li>
                    <li class="active">product-details</li>
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
                                <h3>{{$infoProduct->name}}<span>(Brand)</span></h3>
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
                                        <div class="old-price"> <del>{{number_format($infoProduct->origin_price). ' VNĐ'}}</del> </div>
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
                                                <label class="mb-30">Color: </label><br>
                                                @foreach($color as $colo)
                                                    <li><a href="{{request()->fullUrlWithQuery(['color'=>$colo])}}" style="background-color: {{'#'.$colo}};{{request()->color==$colo?"box-shadow:5px 5px 5px 1px #9c9c9c":''}}"></a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="quantity-area">
                                <label>Qty :</label>
                                <div class="cart-quantity">
                                    <form action="{{ route('frontend.cart.add', ['id' => $infoProduct->id]) }}" method="GET" id="myform">
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

                                                    <button type="submit" class="mt-3 btn btn-secondary w-100 h-50 bthv rounded"><h6 class="m-3"><i class="fa fa-cart-plus pr-1"></i> | Add to Cart</h6></button>

                                                @else
                                                    <button onclick="return false;" class="mt-3 btn btn-secondary w-100 h-50 rounded disabled"><h6 class="m-3"><i class="fa fa-cart-plus pr-1"></i> | Add to Cart</h6></button>
                                                @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                                <div>
                                    @if($infoProduct->status == 0)
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Sorry ! </h4>
                                            <p>{{$infoProduct->name}} temporarily out of stock</p>
                                            <hr class="m-0">
                                            <p class="mb-0 mt-3">But you can still add them to your cart..... we will confirm when new stock arrives.</p>
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
                                        <li role="presentation"><a href="#newarrival" aria-controls="newarrival" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a class="active" href="#bestsellr" aria-controls="bestsellr" role="tab" data-toggle="tab">Comments</a></li>
                                        <li role="presentation"><a href="#specialoffer" aria-controls="specialoffer" role="tab" data-toggle="tab">Tags</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12">
                                <div class="content-tab-product-category w-75 m-auto">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fix fade in" id="newarrival">
                                        <div class="review-wraper">
                                            <b>{!! $infoProduct->content !!}</b>
                                            @if($infoProduct->content_morez)
                                                <div class="pt-3">
                                                    <h3>Thông số</h3>
                                                    <ul>
                                                        @foreach($infoProduct->content_morez as $key => $value)
                                                            <li><i class="fa fa-caret-right pr-3" aria-hidden="true"></i>{{$value}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fix fade show active" id="bestsellr">
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
                                                        <button type="submit" class="btn btn-secondary w-100 h-100 rounded-right">Comment</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                    <div role="tabpanel" class="tab-pane fix fade in" id="specialoffer">
                                        <ul class="tag-filter">
                                            <li><a href="#">Fashion</a></li>
                                            <li><a href="#">Women</a></li>
                                            <li><a href="#">Winter</a></li>
                                            <li><a href="#">Street Style</a></li>
                                            <li><a href="#">Style</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Collection</a></li>
                                            <li><a href="#">Spring 2019</a></li>
                                            <li><a href="#">Street Style</a></li>
                                            <li><a href="#">Style</a></li>
                                            <li><a href="#">Shop</a></li>
                                        </ul>
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
                            <h5 class="uppercase">Related Product</h5>
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
                                                        On Sale
                                                    </div>
                                                @elseif($product->status == 0)
                                                    <div class="new" style="background-color: yellow;color: black">
                                                        Out of
                                                    </div>
                                                @else
                                                    <div class="new" style="background-color: grey;color: white">
                                                        Stop selling
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="single-prodcut-img  product-overlay pos-rltv">
                                                @if(count($product->images) == 0)
                                                    <a href="{{Route('productimg.home',['id'=>$product->id])}}"> <img alt src="/frontend/images/no-image.png" class="primary-image" > <img alt src="/frontend/images/no-image.png" class="secondary-image" > </a>
                                                @elseif(count($product->images) == 1)
                                                    <a href="{{Route('productimg.home',['id'=>$product->id])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image" > <img alt src="{{$product->images[0]->image_url}}" class="secondary-image" > </a>
                                                @elseif(count($product->images)>=2)
                                                    <a href="{{Route('productimg.home',['id'=>$product->id])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image" > <img alt src="{{$product->images[1]->image_url}}" class="secondary-image" > </a>
                                                @endif
                                            </div>
                                            <div class="product-icon socile-icon-tooltip text-center">
                                                <ul>
                                                    <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>

                                                    <li><a href="#" data-toggle="modal" data-target="#xemnhanh" class="q-view xemnhanh" data-id_product="{{$product->id}}"><i class="zmdi zmdi-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="prodcut-name"> <a href="{{Route('productimg.home',['id'=>$product->id])}}">{{$product->name}}</a>
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
