@extends('frontend.layouts.master')
@section('content')
    <div class="breadcumb-area breadcumb-2 overlay pos-rltv">
        <div class="bread-main">
            <div class="bred-hading text-center">
                <h5>Product Grid View</h5> </div>
            <ol class="breadcrumb">
                <li class="home"><a title="Go to Home Page" href="index.html">Home</a></li>
                <li class="active">Shop</li>
            </ol>
        </div>
    </div>
    <!--breadcumb area end -->

    <!--shop main area are start-->
    <div class="shop-main-area grid-view_area ptb-70">
        <div class="container">
            <div class="row">
                <!--main-shop-product start-->
                <div class="col-lg-9 col-md-8 order-lg-2 order-md-2 order-1">
                    <div class="shop-wraper">
                        <div class="col-lg-12">
                            <div class="shop-area-top">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-10 col-md-10">
                                        <div class="row">
                                            <div class="col-2">
                                                <label>Sort By</label>
                                            </div>
                                            <div class="product-type col-10">
                                                <form action="{{Route('frontend.product.filter')}}" id="form_order" method="GET">
                                                <div class="row">
                                                    <select name="category" id="" class="form-control col-3 mr-2">
                                                        <option value="-1">--Select category--</option>
                                                        @foreach($categories as $category)
                                                            <option {{old('category',$category->slug) == request()->category?'selected':''}} value="{{$category->slug}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <select name="orderby" class="form-control col-3 mr-2" id="input-sort">
                                                        <option {{old('orderby',request()->orderby)=='default'?'selected':''}} value="" selected>Default</option>
                                                        <option {{old('orderby',request()->orderby)=='price_asc'?'selected':''}} value="price_asc">Prices go up</option>
                                                        <option {{old('orderby',request()->orderby)=='price_desc'?'selected':''}} value="price_desc">Prices go down</option>
                                                        <option {{old('orderby',request()->orderby)=='name_asc'?'selected':''}} value="name_asc">Name : A - Z</option>
                                                        <option {{old('orderby',request()->orderby)=='name_desc'?'selected':''}} value="name_desc">Name : Z - A</option>
                                                        <option {{old('orderby',request()->orderby)=='id_asc'?'selected':''}} value="id_asc">Oldest Product</option>
                                                        <option {{old('orderby',request()->orderby)=='id_desc'?'selected':''}} value="id_desc">Latest Product</option>
                                                    </select>
                                                    <div class="col-2 d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-light w-100 h-100">Filter</button>
                                                    </div>

{{--                                                    <input type="submit" value="Lọc" >--}}
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2">
                                        <div class="list-grid-view text-center">
                                            <ul class="nav" role="tablist">
                                                <li role="presentation"><a class="active" href="#grid" aria-controls="grid" role="tab" data-toggle="tab"><i class="zmdi zmdi-widgets"></i></a>
                                                </li>
                                                <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12">
                            <div class="shop-total-product-area clearfix mt-35">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--tab grid are start-->
                                    <div role="tabpanel" class="tab-pane fade show active" id="grid">
                                        <div class="total-shop-product-grid row">
                                            <form>
                                                @csrf
                                            </form>
                                            @foreach($productAll as $product)
                                            <div class="col-lg-4 col-md-6 item">
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
                                                                <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="/frontend/images/no-image.png" class="primary-image"> <img alt src="/frontend/images/no-image.png" class="secondary-image"> </a>
                                                            @elseif(count($product->images) == 1)
                                                                <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image"> <img alt src="{{$product->images[0]->image_url}}" class="secondary-image"> </a>
                                                            @elseif(count($product->images)>=2)
                                                                <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image"> <img alt src="{{$product->images[1]->image_url}}" class="secondary-image"> </a>
                                                            @endif
                                                        </div>
                                                        <div class="product-icon socile-icon-tooltip text-center">
                                                            <ul>
                                                                <li><a href="{{ route('frontend.cart.add', ['id' => $product->slug]) }}" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                                <li><a href="#" data-toggle="modal" data-target="#xemnhanh" class="q-view xemnhanh" data-id_product="{{$product->id}}"><i class="zmdi zmdi-eye"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-text">
                                                        <div class="prodcut-name"> <a href="{{Route('productimg.home',['id'=>$product->slug])}}">{{$product->name}}</a>
                                                        </div>
                                                        <div class="prodcut-ratting-price">
                                                            <div class="prodcut-price">
                                                                <div class="new-price">{{ number_format($product->sale_price).' $' }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single product end-->
                                            </div>
                                            @endforeach

                                            <div class="col-lg-12">
                                                <div class="pagination-btn text-center d-flex justify-content-center mt-3">{!! $productAll->appends(request()->input())->links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--main-shop-product start-->

                <!--shop sidebar start-->
                <div class="col-lg-3 col-md-4 order-lg-1 order-md-1 order-2">
                    <div class="shop-sidebar">
                        <!--single aside start-->
                        <aside class="single-aside search-aside search-box">
                            <form action="" method="GET">
                                <div class="input-box">
                                    <input name="key_search" class="single-input" value="{{request()->key_search}}" placeholder="Search...." type="text">
                                    <button class="src-btn sb-2"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </aside>
                        <!--single aside end-->

                        <!--single aside start-->
                        <aside class="single-aside catagories-aside">
                            <div class="heading-title aside-title pos-rltv">
                                <h5 class="uppercase">categories</h5>
                            </div>
                            @if($menus)
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                @foreach($menus as $value)
                                            <li class="closed">
                                                <a href="{{Route('client.category').'?category='.$value->slug}}">{{$value->name}}</a>
                                                @if($value->children)

                                                        @foreach($value->children as $children)
                                                        <ul>
                                                            <li>
                                                                <a href="{{Route('client.category').'?category='.$children->slug}}">{{$children->name}}</a>
{{--                                                                @if($children->children)--}}
{{--                                                                    @foreach($children->children as $child)--}}
{{--                                                                        <ul>--}}
{{--                                                                            <li><a href="">{{$child->name}}</a></li>--}}
{{--                                                                        </ul>--}}
{{--                                                                    @endforeach--}}
{{--                                                                @endif--}}
                                                            </li>
                                                        </ul>
                                                        @endforeach
                                                @endif
                                            </li>
                                @endforeach
                                    </ul>
                                </div>
                            @endif
                        </aside>
                        <!--single aside end-->

                        <!--single aside start-->
                        <aside class="single-aside price-aside fix">
                            <div class="heading-title aside-title pos-rltv mb-4">
                                <h5 class="uppercase">price</h5>
                            </div>
                            <div class="">
                                <div id=""></div>
                                <div>
                                    <p><i class="fa fa-caret-right price_a" aria-hidden="true"><a class="price_a" href="{{request()->fullUrlWithQuery(['price'=>1])}}"> Less than 500 $</a></i></p>
                                    <p><i class="fa fa-caret-right price_a" aria-hidden="true"><a class="price_a" href="{{request()->fullUrlWithQuery(['price'=>2])}}"> From 500 $ to 1.000 $</a></i></p>
                                    <p><i class="fa fa-caret-right price_a" aria-hidden="true"><a class="price_a" href="{{request()->fullUrlWithQuery(['price'=>3])}}"> From 1.000 $ to 2.500 $</a></i></p>
                                    <p><i class="fa fa-caret-right price_a" aria-hidden="true"><a class="price_a" href="{{request()->fullUrlWithQuery(['price'=>4])}}"> Over 2.500 $</a></i></p>
                                </div>
                            </div>
                        </aside>
                        <!--single aside end-->



                        <!--single aside start-->
                        <aside class="single-aside size-aside">
                            <div class="heading-title aside-title pos-rltv">
                                <h5 class="uppercase">Size Option</h5>
                            </div>
                            <ul class="size-filter mt-30">
                                @foreach(\App\Models\Product::$size_text as $key => $value)
                                    <li><a href="{{request()->fullUrlWithQuery(['size'=>$key])}}" class="{{request()->size==$key?'size-bg':''}} mb-2">{{$value}}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <!--single aside start-->
                        <aside class="single-aside product-aside">
                            <div class="heading-title aside-title pos-rltv">
                                <h5 class="uppercase">Recent Product</h5>
                            </div>
                            <div class="recent-prodcut-wraper total-rectnt-slider">
                                <div class="single-rectnt-slider">
                                    <!-- single product start-->
                                    @foreach($recent as $product)
                                    <div class="single-product recent-single-product">
                                        <div class="row">
                                            <div class="product-img col-5">
                                                <div class="single-prodcut-img  product-overlay pos-rltv">
                                                    @if(count($product->images) == 0)
                                                        <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="/frontend/images/no-image.png" class="primary-image"> <img alt src="/frontend/images/no-image.png" class="secondary-image"> </a>
                                                    @elseif(count($product->images) == 1)
                                                        <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image"> <img alt src="{{$product->images[0]->image_url}}" class="secondary-image"> </a>
                                                    @elseif(count($product->images)>=2)
                                                        <a href="{{Route('productimg.home',['id'=>$product->slug])}}"> <img alt src="{{$product->images[0]->image_url}}" class="primary-image"> <img alt src="{{$product->images[1]->image_url}}" class="secondary-image"> </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-text col-7">
                                                <div class="prodcut-name"> <a href="single-product.html">{{$product->name}}</a> </div>
                                                <div class="prodcut-ratting-price">
                                                    <div class="prodcut-ratting"> <a href="#"><i class="fa fa-star"></i></a> <a href="#"><i class="fa fa-star"></i></a> <a href="#"><i class="fa fa-star"></i></a> <a href="#"><i class="fa fa-star"></i></a> <a href="#"><i class="fa fa-star-o"></i></a> </div>
                                                    <div class="prodcut-price">
                                                        <div class="new-price">{{number_format($product->sale_price).' $'}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- single product end-->
                                </div>
                            </div>

                        </aside>
                        <!--single aside end-->

                        <!--single aside start-->
                        <aside class="single-aside add-aside">
                            <a href="single-product.html"><img src="images/add.jpg" alt></a>
                        </aside>
                        <!--single aside end-->
                    </div>
                </div>
                <!--shop sidebar end-->
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
{{--@section('js')--}}
{{--    <script>--}}
{{--        $(function(){--}}
{{--            $('.orderby').change(function (){--}}
{{--                $('#form_order').submit();--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
{{--@stop--}}
