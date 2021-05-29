<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home || Clothing</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
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
        @include('frontend.includes.header')
        @yield('content-carousel')
        @yield('content')
        @include('frontend.includes.footer')
    </div>
    
    <script src="/frontend/js/jquery-1.12.0.min.js"></script>
    <!-- Popper js -->
    <script src="/frontend/js/popper.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="/frontend/js/bootstrap.min.js"></script>
    <!-- Slider js -->
    <script src="/frontend/js/jquery.nivo.slider.pack.js"></script>
    <script src="/frontend/js/nivo-active.js"></script>
    <!-- counterUp-->
    <script src="/frontend/js/jquery.countdown.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="/frontend/js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="/frontend/js/main.js"></script>
    @yield('js')

</body>

</html>