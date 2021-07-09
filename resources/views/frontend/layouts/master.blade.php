<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tunz || Sneaker</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/register/images/logo-15.png">
    <link rel="apple-touch-icon" href="favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="/frontend/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="/frontend/css/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="/frontend/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/frontend/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="/frontend/css/custom.css">
    <link rel="stylesheet" href="/frontend/css/skin-default.css">

    @yield('css')
    <!-- Modernizr JS -->
    <script src="/frontend/js/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="wrapper home-one">
        @include('sweetalert::alert')
        @include('frontend.includes.header')
        @yield('content-carousel')
        @yield('content')
        @include('frontend.includes.footer')
        <div class="modal fade bd-example-modal-lg pt-5" id="xemnhanh" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content mt-80">
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
                                                <div id="product_quickview_imgone"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-more-views-2">
                                        <div class="thumbnail-carousel-modal-2" data-tabs="tabs">
                                            <div id="product_quickview_gallery"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--modal tab end-->
                            <!-- .product-images -->
                            <div class="product-info mt-3">
                                <h1 id="product_quickview_title"></h1>
                                <div class="price-box-3">
                                    <div class="s-price-box"> <span class="new-price" id="product_quickview_slprice"></span> <span class="old-price" id="product_quickview_orprice"></span> </div>
                                </div>
                                <div id="product_quickview_id" class="quick-add-to-cart">
                                </div>
                                <div id="product_quickview_content"></div>
                                <div class="social-sharing-modal">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal"><i>Share this product</i></h3>
                                        <ul class="social-icons-modal">
                                            <li><a target="_blank" title="Facebook" href="#" class="facebook m-single-icon"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a target="_blank" title="Twitter" href="#" class="twitter m-single-icon"><i class="fa fa-twitter"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest m-single-icon"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li><a target="_blank" title="Google +" href="#" class="gplus m-single-icon"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li><a target="_blank" title="LinkedIn" href="#" class="linkedin m-single-icon"><i class="fa fa-linkedin"></i></a>
                                            </li>
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
    </div>
    <script src="/frontend/js/jquery-1.12.0.min.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <!-- Slider js -->
    <script src="/frontend/js/jquery.nivo.slider.pack.js"></script>
    <script src="/frontend/js/nivo-active.js"></script>
    <!-- counterUp-->
    <script src="/frontend/js/jquery.countdown.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="/frontend/js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="/frontend/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
{{--    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>--}}
    @yield('js')
    <!-- Messenger Plugin chat Code -->
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "100678135617322");
        chatbox.setAttribute("attribution", "biz_inbox");
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v11.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        function updateCart(qty,rowId){
            $.get(
                '{{asset('products/cart/update')}}',
                {qty:qty,rowId:rowId},
                function (){
                    location.reload();
                }
            );
        }
    </script>
    <script>
        $('.xemnhanh').click(function (){
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/quickview')}}",
                method:"POST",
                dataType:"JSON",
                data:{product_id:product_id,_token:_token},
                success:function (data){
                    $('#product_quickview_id').html(data.product_id);
                    $('#product_quickview_title').html(data.product_name);
                    $('#product_quickview_content').html(data.product_content);
                    $('#product_quickview_orprice').html(data.product_origin_price);
                    $('#product_quickview_slprice').html(data.product_sale_price);
                    $('#product_quickview_imgone').html(data.product_imgone);
                    $('#product_quickview_gallery').html(data.product_gallery);
                }
            });
        });
    </script>
</body>

</html>
