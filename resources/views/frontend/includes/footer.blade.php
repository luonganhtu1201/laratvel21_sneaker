<!-- footer area start-->
<div class="footer-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="single-footer contact-us">
                            <div class="footer-title uppercase">
                                <h5>Contact US</h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-pin-drop"></i> </div>
                                    <div class="contact-text">
                                        <p>Address: Thai Hoa - Ba Vi - Ha Noi</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>
                                    <div class="contact-text">
                                        <p><span><a href="mailto://demo@example.com">latu.hubt@gmail.com</a></span> <span><a href="mailto://demo@example.com">contact@tunz.support</a></span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>
                                    <div class="contact-text">
                                        <p><a href="tel://0123456789">(+84) 344 659 691</a> <a href="tel://0123456789">(+84) 421 567 888</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="single-footer informaton-area">
                            <div class="footer-title uppercase">
                                <h5>Information</h5>
                            </div>
                            <div class="informatoin">
                                <ul>
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        <li><a href="{{route('client.profile')}}">My Account</a></li>
                                        <li><a href="{{route('frontend.cart.status')}}">Order Tracking</a></li>
                                    @endif
                                    <li><a href="{{route('frontend.cart.index')}}">View Cart & Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 d-md-none d-block d-lg-block">
                        <div class="single-footer instagrm-area">
                            <div class="footer-title uppercase">
                                <h5>InstaGram</h5>
                            </div>
                            <div class="instagrm">
                                <ul>
                                    <li><a href="#"><img src="/frontend/images/01_1.jpg" alt></a></li>
                                    <li><a href="#"><img src="/frontend/images/02_2.jpg" alt></a></li>
                                    <li><a href="#"><img src="/frontend/images/03_1.jpg" alt></a></li>
                                    <li><a href="#"><img src="/frontend/images/04.jpg" alt></a></li>
                                    <li><a href="#"><img src="/frontend/images/05_1.jpg" alt></a></li>
                                    <li><a href="#"><img src="/frontend/images/06_1.jpg" alt></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 offset-xl-1">
                        <div class="single-footer newslatter-area">
                            <div class="footer-title uppercase">
                                <h5>Social Network</h5>
                            </div>
                            <div class="newslatter">

                                <div class="social-icon socile-icon-style-3 mt-40">
                                    <div class="footer-title uppercase">

                                    </div>
                                    <ul>
                                        <li><a href="https://www.facebook.com/Jikeyazz/" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a> </li>
                                        <li><a href="https://www.instagram.com/_ah.tuu_/" target="_blank" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                                        <li> <a href="https://www.pinterest.com/TunzPint/_saved/" target="_blank" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li> <a href="https://www.youtube.com/channel/UC8MkxFRKqtvu7vGw-lP03jg" target="_blank" title="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer area start-->

        <!--footer bottom area start-->
        <div class="footer-bottom global-table">
            <div class="global-row">
                <div class="global-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                               <div class="copyrigth">
                                    <p>
                                       <span class="text-uppercase">Tun<span style="color: red">z</span> Sneaker</span>  &copy; 2021 . Made
                                        with <i style="color:#f53400;" class="fa fa-heart"></i> by
                                        <a target="_blank" href="devitems.com">LAT</a>
                                      </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="payment-support text-right">
                                    <li>
                                        <img src="/frontend/images/pay1.png" alt>
                                    </li>
                                    <li>
                                        <img src="/frontend/images/pay2.png" alt>
                                    </li>
                                    <li>
                                       <img src="/frontend/images/pay3.png" alt>
                                    </li>
                                    <li>
                                       <img src="/frontend/images/pay4.png" alt>
                                    </li>
                                    <li>
                                       <img src="/frontend/images/pay5.png" alt>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer bottom area end-->
