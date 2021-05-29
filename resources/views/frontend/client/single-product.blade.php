@extends('frontend.layouts.master')
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
                                        @foreach($imgg as $images)
                                       <li>
                                        <a class="imgActive" href="{{'#view'.$images->id}}" aria-controls="{{'view'.$images->id}}" data-toggle="tab"><img src="{{$images->path}}" alt></a>
                                       </li>
                                       @endforeach
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
                           @foreach($imgg as $images)
                            <div role="tabpanel" class="tab-pane" id="{{'view'.$images->id}}">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="/frontend/images/product/01.jpg"><img src="{{$images->path}}" alt="Single portfolio"></a>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div role="tabpanel" class="tab-pane" id="view22">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="/frontend/images/product/02.jpg"><img src="/frontend/images/02.jpg" alt="Single portfolio"></a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="view33">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="/frontend/images/product/03.jpg"><img src="/frontend/images/03.jpg" alt="Single portfolio"></a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="view44">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="/frontend/images/product/04.jpg"><img src="/frontend/images/04.jpg" alt="Single portfolio"></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                    <div class="col-lg-5">
                        <div class="single-product-description">
                           <div class="sp-top-des">
                                <h3>GLOB t-SHIRT <span>(Brand)</span></h3>
                                <div class="prodcut-ratting-price">
                                    <div class="prodcut-ratting"> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                    </div>
                                    <div class="prodcut-price">
                                        <div class="new-price"> $220 </div>
                                        <div class="old-price"> <del>$250</del> </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sp-des">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                            </div>
                            <div class="sp-bottom-des">
                            <div class="single-product-option">
                                <div class="sort product-type">
                                    <label>Color: </label>
                                    <select id="input-sort-color">
                                        <option value="#">Red</option>
                                        <option value="#">Blue</option>
                                        <option value="#">Green</option>
                                        <option value="#">Purple</option>
                                        <option value="#">Yellow</option>
                                        <option value="#">Black</option>
                                        <option value="#">Grey</option>
                                        <option value="#">White</option>
                                        <option value="#" selected>Chose Your Color</option>
                                    </select>
                                </div>
                                <div class="sort product-type">
                                    <label>Size: </label>
                                    <select id="input-sort-size">
                                        <option value="#">S</option>
                                        <option value="#">M</option>
                                        <option value="#">L</option>
                                        <option value="#">XL</option>
                                        <option value="#">XXL</option>
                                        <option value="#" selected>Chose Your Size</option>
                                    </select>
                                </div>
                            </div>
                            <div class="quantity-area">
                                <label>Qty :</label>
                                <div class="cart-quantity">
                                    <form action="#" method="POST" id="myform">
                                        <div class="product-qty">
                                            <div class="cart-quantity">
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton">-</div>
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="social-icon socile-icon-style-1">
                                <ul>
                                    <li><a href="#" data-tooltip="Add To Cart" class="add-cart add-cart-text" data-placement="left" tabindex="0">Add To Cart<i class="fa fa-cart-plus"></i></a></li>
                                    <li><a href="#" data-tooltip="Wishlist" class="w-list" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#" data-tooltip="Compare" class="cpare" tabindex="0"><i class="fa fa-refresh"></i></a></li>
                                    <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal" tabindex="0"><i class="fa fa-eye"></i></a></li>
                                </ul>
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
                                        <li role="presentation"><a class="active" href="#bestsellr" aria-controls="bestsellr" role="tab" data-toggle="tab">Review</a></li>
                                        <li role="presentation"><a href="#specialoffer" aria-controls="specialoffer" role="tab" data-toggle="tab">Tags</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12">
                                <div class="content-tab-product-category">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fix fade in" id="newarrival">
                                        <div class="review-wraper">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                <br> veniam, quis nostrud exercitation.</p>
                                            <h5>ABOUT ME</h5>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                                            <h5>SIZE & FIT</h5>
                                            <ul>
                                                <li>Model wears: Style Photoliya U2980</li>
                                                <li>Model's height: 185”66</li>
                                            </ul>
                                            <h5>Overview</h5>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fix fade show active" id="bestsellr">
                                        <div class="review-wraper">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br> veniam, quis nostrud exercitation.</p>
                                           <h5>SIZE & FIT</h5>
                                           <ul>
                                               <li>Model wears: Style Photoliya U2980</li>
                                               <li>Model's height: 185”66</li>
                                           </ul>
                                            <h5>ABOUT ME</h5>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                                           <h5>Overview</h5>
                                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                        </div>
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
                            <div class="col-lg-3">
                                <!-- single product start-->
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="product-label">
                                            <div class="new">New</div>
                                        </div>
                                        <div class="single-prodcut-img  product-overlay pos-rltv">
                                            <a href="single-product.html"> <img alt src="/frontend/images/01.jpg" class="primary-image"> <img alt src="/frontend/images/02.jpg" class="secondary-image"> </a>
                                        </div>
                                        <div class="product-icon socile-icon-tooltip text-center">
                                            <ul>
                                                <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a>
                                        </div>
                                        <div class="prodcut-ratting-price">
                                            <div class="prodcut-price">
                                                <div class="new-price"> $220 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single product end-->
                            </div>
                            <div class="col-lg-3">
                                <!-- single product start-->
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="single-prodcut-img  product-overlay pos-rltv">
                                            <a href="single-product.html"> <img alt src="/frontend/images/03.jpg" class="primary-image"> <img alt src="/frontend/images/04.jpg" class="secondary-image"> </a>
                                        </div>
                                        <div class="product-icon socile-icon-tooltip text-center">
                                            <ul>
                                                <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a>
                                        </div>
                                        <div class="prodcut-ratting-price">
                                            <div class="prodcut-price">
                                                <div class="new-price"> $220 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single product end-->
                            </div>
                            <div class="col-lg-3">
                                <!-- single product start-->
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="product-label">
                                            <div class="new">Sale</div>
                                        </div>
                                        <div class="single-prodcut-img  product-overlay pos-rltv">
                                            <a href="single-product.html"> <img alt src="/frontend/images/02.jpg" class="primary-image"> <img alt src="/frontend/images/03.jpg" class="secondary-image"> </a>
                                        </div>
                                        <div class="product-icon socile-icon-tooltip text-center">
                                            <ul>
                                                <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a>
                                        </div>
                                        <div class="prodcut-ratting-price">
                                            <div class="prodcut-ratting">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                            </div>
                                            <div class="prodcut-price">
                                                <div class="new-price"> $220 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single product end-->
                            </div>
                            <div class="col-lg-3">
                                <!-- single product start-->
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="single-prodcut-img  product-overlay pos-rltv">
                                            <a href="single-product.html"> <img alt src="/frontend/images/04.jpg" class="primary-image"> <img alt src="/frontend/images/03.jpg" class="secondary-image"> </a>
                                        </div>
                                        <div class="product-icon socile-icon-tooltip text-center">
                                            <ul>
                                                <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a>
                                        </div>
                                        <div class="prodcut-ratting-price">
                                            <div class="prodcut-price">
                                                <div class="new-price"> $220 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single product end-->
                            </div>
                            <div class="col-lg-3">
                                <!-- single product start-->
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="single-prodcut-img  product-overlay pos-rltv">
                                            <a href="single-product.html"> <img alt src="/frontend/images/05.jpg" class="primary-image"> <img alt src="/frontend/images/06.jpg" class="secondary-image"> </a>
                                        </div>
                                        <div class="product-icon socile-icon-tooltip text-center">
                                            <ul>
                                                <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a>
                                        </div>
                                        <div class="prodcut-ratting-price">
                                            <div class="prodcut-ratting">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a> </div>
                                            <div class="prodcut-price">
                                                <div class="new-price"> $220 </div>
                                                <div class="old-price"> <del>$250</del> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single product end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                              <div class="product-images"> 
                                   <!--modal tab start-->
                                    <div class="portfolio-thumbnil-area-2">
                                        <div class="tab-content active-portfolio-area-2">
                                            <div role="tabpanel" class="tab-pane active" id="view1">
                                                <div class="product-img">
                                                    <a href="#"><img src="/frontend/images/01.jpg" alt="Single portfolio"></a>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="view2">
                                                <div class="product-img">
                                                    <a href="#"><img src="/frontend/images/02.jpg" alt="Single portfolio"></a>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="view3">
                                                <div class="product-img">
                                                    <a href="#"><img src="/frontend/images/03.jpg" alt="Single portfolio"></a>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="view4">
                                                <div class="product-img">
                                                    <a href="#"><img src="/frontend/images/04.jpg" alt="Single portfolio"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-more-views-2">
                                            <div class="thumbnail-carousel-modal-2" data-tabs="tabs">
                                                <a href="#view1" aria-controls="view1" data-toggle="tab"><img src="/frontend/images/01.jpg" alt></a>
                                                <a href="#view2" aria-controls="view2" data-toggle="tab"><img src="/frontend/images/02.jpg" alt></a>
                                                <a href="#view3" aria-controls="view3" data-toggle="tab"><img src="/frontend/images/03.jpg" alt></a>
                                                <a href="#view4" aria-controls="view4" data-toggle="tab"><img src="/frontend/images/04.jpg" alt></a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!--modal tab end-->
                                    <!-- .product-images -->
                                    <div class="product-info">
                                        <h1>Aenean eu tristique</h1>
                                        <div class="price-box-3">
                                            <div class="s-price-box"> <span class="new-price">$160.00</span> <span class="old-price">$190.00</span> </div>
                                        </div> <a href="shop.html" class="see-all">See all features</a>
                                        <div class="quick-add-to-cart">
                                            <form method="post" class="cart">
                                                <div class="numbers-row">
                                                    <input type="number" id="french-hens" value="3" min="1"> </div>
                                                <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                            </form>
                                        </div>
                                        <div class="quick-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.Nam fringilla tristique auctor. </div>
                                        <div class="social-sharing-modal">
                                            <div class="widget widget_socialsharing_widget">
                                                <h3 class="widget-title-modal">Share this product</h3>
                                                <ul class="social-icons-modal">
                                                    <li><a target="_blank" title="Facebook" href="#" class="facebook m-single-icon"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a target="_blank" title="Twitter" href="#" class="twitter m-single-icon"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a target="_blank" title="Pinterest" href="#" class="pinterest m-single-icon"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a target="_blank" title="Google +" href="#" class="gplus m-single-icon"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a target="_blank" title="LinkedIn" href="#" class="linkedin m-single-icon"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .product-info -->
                                </div>
                                <!-- .modal-product -->
                            </div>
                            <!-- .modal-body -->
                        </div>
                        <!-- .modal-content -->
                    </div>
                    <!-- .modal-dialog -->
                </div>
                <!-- END Modal -->
            </div>
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