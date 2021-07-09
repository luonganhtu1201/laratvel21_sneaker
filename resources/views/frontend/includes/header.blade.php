<header class="header-area header-wrapper">
            <div class="header-top-bar black-bg clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="login-register-area">
                                <ul>
                                @if(!(Illuminate\Support\Facades\Auth::user()))
                                    <li><a href="{{Route('login.form')}}">Login</a></li>
                                    <li><a href="{{Route('user.register.form')}}">Register</a></li>
                                @else
                                <li><a href="#">{{Illuminate\Support\Facades\Auth::user()->name}}</a></li>
                                <li><a href="{{Route('logout')}}">Logout</a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-md-block">
                            <div class="social-search-area text-center">
                                <div class="social-icon socile-icon-style-2">
                                    <ul>
                                        <li><a href="https://www.facebook.com/Jikeyazz/" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a> </li>
                                        <li><a href="https://www.instagram.com/_ah.tuu_/" target="_blank" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                                        <li> <a href="https://www.pinterest.com/TunzPint/_saved/" target="_blank" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li> <a href="https://www.youtube.com/channel/UC8MkxFRKqtvu7vGw-lP03jg" target="_blank" title="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="cart-currency-area login-register-area text-right">
                                <ul>

                                    <li>
                                        <div class="header-cart">
                                            <div class="cart-icon"> <a href="#">Cart<i class="zmdi zmdi-shopping-cart"></i></a>
                                                <span>
                                                    @if($items)
                                                        {{count($items)}}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="cart-content-wraper">
                                                @if($items)
                                                    <?php $subtotal = 0?>
                                                    @foreach($items as $item)
                                                            <input type="hidden" value="{{$subtotal += $item->price * $item->qty}}">
                                                        <div class="cart-single-wraper">
                                                            <div class="cart-img">
                                                                <a href="#"><img src="{{url(\Illuminate\Support\Facades\Storage::url($item->options->image))}}" alt></a>
                                                            </div>
                                                            <div class="cart-content">
                                                                <div class="cart-name"> <a href="#">{{$item->name}}</a>
                                                                </div>
                                                                <div class="cart-price">{{number_format($item->price).' VNĐ'}}</div>
                                                                <div class="cart-qty"> Qty: <span>{{$item->qty}}</span> </div>
                                                            </div>
                                                            <div class="remove"> <a href="{{ route('frontend.cart.remove', ['id' => $item->rowId]) }}"><i class="zmdi zmdi-close"></i></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="cart-subtotal"> Subtotal: <span>{{number_format($subtotal).' VNĐ'}}</span> </div>
                                                <div class="cart-check-btn">
                                                    <div class="view-cart"> <a class="btn-def" href="{{route('frontend.cart.index')}}">View Cart & Checkout</a> </div>
                                                </div>
                                                @if(\Illuminate\Support\Facades\Auth::user())
                                                    <div class="cart-check-btn">
                                                        <div class="view-cart"> <a class="btn-def" href="{{route('frontend.cart.status')}}">Order Tracking</a> </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="header-middle-area">
                <div class="container">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="logo ptb-20"><a href="{{Route('client.home')}}">
                                        <img src="/frontend/images/logo-1.png" alt="main logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-10 d-none d-md-block">
                                <nav id="primary-menu">
                                    @if($menus)
                                        <ul class="main-menu">
                                            <li class=""><a href="{{Route('client.home')}}">Home</a></li>
                                            @foreach($menus as $value)
                                                <li class="">
                                                    <a class="" href="{{Route('client.category').'?category='.$value->id}}">{{$value->name}}</a>
                                                    @if($value->children)
                                                        @foreach($value->children as $children)
                                                        <ul class="dropdown">
                                                            <li><a href="{{Route('client.category').'?category='.$children->id}}">{{$children->name}}</a></li>
                                                        </ul>
                                                        @endforeach

                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
{{--                                    <ul class="main-menu">--}}
{{--                                        @foreach($categories as $cate)--}}
{{--                                            <li>{{$cate->name}}</li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
                                </nav>
                            </div>
                            @if(!(request()->key_search))
                            <div class="col-lg-3 d-none d-lg-block">
                                <div class="search-box global-table">
                                    <div class="global-row">
                                        <div class="global-cell">
                                            <form action="{{route('client.category').'?key_search='.request()->key_search}}">
                                                <div class="input-box">
                                                    <input name="key_search" class="single-input" placeholder="Search anything"
                                                           type="text">
                                                    <button class="src-btn"><i class="fa fa-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- mobile-menu-area start -->
                            <div class="mobile-menu-area">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <nav id="dropdown">
                                                @if($menus)
                                                    <ul>
                                                        <li class=""><a href="{{Route('client.home')}}">Home</a></li>
                                                        @foreach($menus as $value)
                                                            <li class="">
                                                                <a class="" href="{{Route('client.category').'?category='.$value->id}}">{{$value->name}}</a>
                                                                @if($value->children)
                                                                    @foreach($value->children as $children)
                                                                        <ul class="">
                                                                            <li><a href="{{Route('client.category').'?category='.$children->id}}">{{$children->name}}</a></li>
                                                                        </ul>
                                                                    @endforeach

                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--mobile menu area end-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
