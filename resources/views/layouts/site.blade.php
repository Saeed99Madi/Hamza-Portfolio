
    <!DOCTYPE html>
<html lang="en">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />

    <!-- FAVICONS ICON -->

{{--    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/favicon.png')}}" />--}}

    <!-- PAGE TITLE HERE -->


    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/bootstrap.min.css')}}">
    <!-- BOOTSTRAP SLECT BOX STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/bootstrap-select.min.css')}}">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/fontawesome/css/font-awesome.min.css')}}" />
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/owl.carousel.min.css')}}">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/magnific-popup.min.css')}}">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/loader.min.css')}}">
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/flaticon.min.css')}}">
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/style.css')}}">
    <!-- Price Range Slider -->
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap-slider.min.css')}}" />
    <!-- Color Theme Change Css -->
    <link rel="stylesheet" class="skin" type="text/css" href="{{asset('assets/site/css/skin/skin-1.css')}}">


    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/plugins/revolution/revolution/css/settings.css')}}">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/plugins/revolution/revolution/css/navigation.css')}}">

	<link rel="stylesheet" href="{{ asset('site/assets/css/modify.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    @if($pagetitle)
        <title>{{$pagetitle}}</title>
    @else
        <title>{{$setting->title}}</title>
    @endif
    <link rel="icon" type="image/png" href="{{ route('home.logo') }}/2">

    @yield('css')

</head>

<body class="footer-fixed">

<div class="page-wraper">

    <!-- HEADER START -->
    <header class="site-header nav-wide nav-transparent mobile-sider-drawer-menu">
        <div class="top-bar sx-bg-secondry">
            <div class="container">
                <div class="d-flex justify-content-between ">
                    <ul class="list-unstyled e-p-bx text-white">
                        <li><span>Mail us:</span> 7xthemehelp@gmail.com</li>
                        <li><span>Call us:</span>(075) 123-7654</li>
                    </ul>
                    <ul class="list-unstyled social-bx text-white d-flex flex-wrap align-content-center">
                        @if($setting->facebook)

                            <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        @endif

                        @if($setting->twitter)
                            <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        @endif

                        @if($setting->instagram)
                            <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                        @endif

                        @if($setting->linkedin)
                            <a href="{{$setting->linkedin}}" target="_blank">
                                <i class='flaticon-linkedin'></i>
                            </a>
                        @endif
                        <li><a href="javascript:;"><i class="fa fa-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar">

                <div class="container clearfix">
                    <div class="logo-header">
                        <div class="logo-header-inner logo-header-one">
                            <a href="index.html">
                                <img src="{{ route('home.logo') }}/1" class="white-logo" alt="logo">
                            </a>
                        </div>
                    </div>
                    <!-- NAV Toggle Button -->
                    <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggler collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar icon-bar-first"></span>
                        <span class="icon-bar icon-bar-two"></span>
                        <span class="icon-bar icon-bar-three"></span>
                    </button>

                    <!-- EXTRA NAV -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="#search">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <!-- EXTRA Nav -->

                    <!-- MAIN NAVIGATION -->
                    <div class="header-nav nav-dark navbar-collapse collapse justify-content-center collapse">
                        <ul class=" nav navbar-nav">
                            @foreach($menu as $x)
                                @if($x['typeid'] == 0)
                                    <li class="nav-item">
                                        <a {{$x['newtap'] ? 'target="_blank"' : ''}} href="{{$x['ch'] ? '#' : $x['link']}}">
                                            {{$x['title']}}
                                            @if($x['ch'])
                                                {{--                                            <i class='bx bx-chevron-down'></i>--}}
                                            @endif
                                        </a>
                                        @if($x['ch'])
                                            <ul class="sub-menu">
                                                @foreach($x['submenu'] as $y)
                                                    <li >
                                                        <a {{$y['newtap'] ? 'target="_blank"' : ''}} href="{{$y['link']}}" >
                                                            {{$y['title']}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>


                    <!-- SITE SEARCH -->
                    <div id="search">
                        <span class="close"></span>
                        <form role="search" id="searchform" action="{{route("home.search")}}" method="get" class="radius-xl">
                            <div class="input-group">
                                <input value="" name="search" type="search" placeholder="Type to search"/>
                                <span class="input-group-btn"><button type="submit" class="search-btn"><i class="fa fa-search arrow-animation"></i></button></span>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END -->

    <!-- CONTENT START -->
    <div class="page-content">
        @yield('content')

    </div>
    <!-- CONTENT END -->

    <!-- FOOTER START -->








    <!-- FOOTER START -->
    <footer class="site-footer footer-large  footer-dark	footer-wide">

        <!-- FOOTER BLOCKES START -->
        <div class="footer-top overlay-wraper bg-cover" style="background-image:url({{asset('assets/site/images/background/f-bg.jpg')}})">
            <div class="overlay-main sx-bg-secondry opacity-08"></div>
            <div class="container">
                <div class="row">
                    <!-- ABOUT COMPANY -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget_about">
                            <!--<h4 class="widget-title">About Company</h4>-->
                            <div class="logo-footer clearfix p-b15">



                                <a href="/"><img src="{{route('home.logo')}}/1" class="white-logo" alt="logo"></a>
                            </div>
                            <p>7X Theme is a html template for interior and architecture purpose. Today we can tell you, thanks to your passion.</p>

                            <ul class="social-icons  sx-social-links">


                                @if($setting->facebook)
                                    <li><a href="{{$setting->facebook}}" class="fa fa-facebook"></a></li>
                                @endif

                                @if($setting->twitter)
                                        <li><a href="{{$setting->twitter}};" class="fa fa-twitter"></a></li>
                                @endif

                                @if($setting->instagram)
                                        <li><a href="{{$setting->instagram}}" class="fa fa-instagram"></a></li>
                                @endif

                                @if($setting->linkedin)
                                        <li><a href="{{$setting->linkedin}}" class="fa fa-linkedin"></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- RESENT POST -->

                    <!-- USEFUL LINKS -->
                    @if($setting->footer1)
                    <div class="col-lg-3 col-md-6 col-sm-6 footer-col-3">
                        <div class="widget widget_services inline-links">
                            <h5 class="widget-title">{{$setting->footer1}}</h5>
                            <ul>
                                @foreach($menu as $x)
                                    @if($x['typeid'] == 1)
                                        <li>
                                            <a {{$x['newtap'] ? 'target="_blank"' : ''}} href="{{$x['link']}}">
                                                {{$x['title']}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <!-- CONTACT US -->
                    @if($setting->footer2)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget_address_outer">
                            <h5 class="widget-title">{{$setting->footer2}}</h5>
                            <ul class="widget_address">
                                @foreach($menu as $x)
                                    @if($x['typeid'] == 2)
                                        <li>
                                            <a {{$x['newtap'] ? 'target="_blank"' : ''}} href="{{$x['link']}}">
                                                {{$x['title']}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                    </div>
                    @endif
                    @if($setting->footer3)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget widget_address_outer">
                                <h5 class="widget-title">{{$setting->footer3}}</h5>
                                <ul class="widget_address">
                                    @foreach($menu as $x)
                                        @if($x['typeid'] == 3)
                                            <li>
                                                <a {{$x['newtap'] ? 'target="_blank"' : ''}} href="{{$x['link']}}">
                                                    {{$x['title']}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    @endif




                </div>
            </div>
            <div class="container">
                <div class="call-to-action-wrap">
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <div class="call-to-action-left">
                                <h5 class="text-uppercase m-b10 m-t0">Subscribe to our newsletter!</h5>
                                <span>Never Miss Anything From 7xtheme By Signing Up To Our Newsletter.</span>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <div class="call-to-action-right">
                                <div class="widget_newsletter">
                                    <div class="newsletter-bx">
                                        <form role="search" method="post">
                                            <div class="input-group">
                                                <input name="news-letter" class="form-control" placeholder="ENTER YOUR EMAIL" type="text">
                                                <span class="input-group-btn">
                                                        <button type="submit" class="site-button"><i class="fa fa-paper-plane-o"></i></button>
                                                    </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER COPYRIGHT -->
        <div class="footer-bottom overlay-wraper">
            <div class="overlay-main"></div>
            <div class="container">
                <div class="row">
                    <div class="sx-footer-bot-left">
                        <span class="copyrights-text">© 2019 Your Company. Designed By 7xtheme.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->
















{{--    <footer class="site-footer footer-large  footer-dark	footer-wide">--}}

{{--        <!-- FOOTER BLOCKES START -->--}}
{{--        <div class="footer-top overlay-wraper bg-cover" style="background-image:url({{asset('assets/site/images/background/f-bg.jpg')}})">--}}
{{--            <div class="overlay-main sx-bg-secondry opacity-08"></div>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                        <a class="staticLink" data-id="{{$footerContact->id}}">--}}
{{--                            {!!$footerContact->desccode!!}--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @if($setting->footer1)--}}
{{--                        <div class="col-lg-3 col-md-6 col-sm-6 footer-col-3">--}}
{{--                                <div class="widget widget_services inline-links">--}}
{{--                                    <h3 class="widget-title">{{$setting->footer1}}</h3>--}}

{{--                                    <ul class="footer-quick-links">--}}
{{--                                        @foreach($menu as $x)--}}
{{--                                            @if($x['typeid'] == 1)--}}
{{--                                                <li>--}}
{{--                                                    <a {{$x['newtap'] ? 'target="_blank"' : ''}} href="{{$x['link']}}">--}}
{{--                                                        {{$x['title']}}--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if($setting->footer2)--}}
{{--                        <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                            <div class="widget widget_address_outer">--}}
{{--                                <h3 class="widget-title">{{$setting->footer2}}</h3>--}}

{{--                                <ul class="widget_address">--}}
{{--                                    @foreach($menu as $x)--}}
{{--                                        @if($x['typeid'] == 2)--}}
{{--                                            <li>--}}
{{--                                                <a {{$x['newtap'] ? 'target="_blank"' : ''}} href="{{$x['link']}}">--}}
{{--                                                    {{$x['title']}}--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if($setting->footer3)--}}
{{--                        <div class="col-lg-2 col-md-6 col-sm-6">--}}
{{--                            <div class="single-footer-widget">--}}
{{--                                <h3>{{$setting->footer3}}</h3>--}}

{{--                                <ul class="footer-quick-links">--}}
{{--                                    @foreach($menu as $x)--}}
{{--                                        @if($x['typeid'] == 3)--}}
{{--                                            <li>--}}
{{--                                                <a {{$x['newtap'] ? 'target="_blank"' : ''}} href="{{$x['link']}}">--}}
{{--                                                    {{$x['title']}}--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}



{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--      --}}
{{--        --}}
{{--        <div class="footer-bottom overlay-wraper">--}}
{{--            <div class="overlay-main"></div>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="sx-footer-bot-left">--}}
{{--                        <a class="copyrights-text" data-id="{{$Copyright->id}}">--}}
{{--                            <i class="far fa-copyright"></i>--}}
{{--                            {!!$Copyright->desccode!!}--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="{{route('home.page', 5)}}">شروط الخدمة</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{route('home.page', 4)}}">الأحكام و السياسات</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
{{--    <!-- FOOTER END -->--}}

    <!-- BUTTON TOP START -->
    <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>

</div>

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-spinner">
            <div class="cssload-cube cssload-cube0"></div>
            <div class="cssload-cube cssload-cube1"></div>
            <div class="cssload-cube cssload-cube2"></div>
            <div class="cssload-cube cssload-cube3"></div>
            <div class="cssload-cube cssload-cube4"></div>
            <div class="cssload-cube cssload-cube5"></div>
            <div class="cssload-cube cssload-cube6"></div>
            <div class="cssload-cube cssload-cube7"></div>
            <div class="cssload-cube cssload-cube8"></div>
            <div class="cssload-cube cssload-cube9"></div>
            <div class="cssload-cube cssload-cube10"></div>
            <div class="cssload-cube cssload-cube11"></div>
            <div class="cssload-cube cssload-cube12"></div>
            <div class="cssload-cube cssload-cube13"></div>
            <div class="cssload-cube cssload-cube14"></div>
            <div class="cssload-cube cssload-cube15"></div>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->

<!-- JAVASCRIPT  FILES ========================================= -->
<script  src="{{asset('assets/site/js/jquery-1.12.4.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script  src="{{asset('assets/site/js/popper.min.js')}}"></script><!-- POPPER.MIN JS -->
<script  src="{{asset('assets/site/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script  src="{{asset('assets/site/js/bootstrap-select.min.js')}}"></script><!-- Form js -->
<script  src="{{asset('assets/site/js/magnific-popup.min.js')}}"></script><!-- MAGNIFIC-POPUP JS -->
<script  src="{{asset('assets/site/js/waypoints.min.js')}}"></script><!-- WAYPOINTS JS -->
<script  src="{{asset('assets/site/js/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script  src="{{asset('assets/site/js/waypoints-sticky.min.js')}}"></script><!-- sticky header JS -->
<script  src="{{asset('assets/site/js/isotope.pkgd.min.js')}}"></script><!-- MASONRY  -->
<script  src="{{asset('assets/site/js/owl.carousel.min.js')}}"></script><!-- OWL  SLIDER  -->
<script  src="{{asset('assets/site/js/jquery.owl-filter.js')}}"></script>
<script  src="{{asset('assets/site/js/stellar.min.js')}}"></script><!-- PARALLAX BG IMAGE   -->
<script  src="{{asset('assets/site/js/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->
<script  src="{{asset('assets/site/js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script  src="{{asset('assets/site/js/jquery.bgscroll.js')}}"></script><!-- BACKGROUND SCROLL -->
<script  src="{{asset('assets/site/js/theia-sticky-sidebar.js')}}"></script><!--sticky content-->

<script  src="{{asset('assets/site/js/bootstrap-slider.min.js')}}"></script><!-- Price range slider -->




<!-- REVOLUTION JS FILES -->

<script  src="{{asset('assets/site/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script  src="{{asset('assets/site/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script  src="{{asset('assets/site/plugins/revolution/revolution/js/extensions/revolution-plugin.js')}}"></script>

<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script  src="{{asset('assets/site/js/rev-script-2.js')}}"></script>


@yield('js')

<script>
    var myApp = angular.module('myApp', ['angular.filter']);//ngMaterial
    myApp.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    jQuery('.projectLink').bind('click', function(e) {
        var id = $(this).attr("data-id");
        if (e.ctrlKey){
            e.preventDefault();
            window.open('{{route('admin.project.edit')}}'+'/' + id +'','_blank')
        }
    });
    jQuery('.staticLink').bind('click', function(e) {
        var id = $(this).attr("data-id");
        if (e.ctrlKey){
            e.preventDefault();
            window.open('{{route('admin.staticpage.edit')}}'+'/' + id +'','_blank')
        }
    });
    jQuery('.typeLink').bind('click', function(e) {
        var id = $(this).attr("data-id");
        if (e.ctrlKey){
            e.preventDefault();
            window.open('{{route('admin.projecttype.edit')}}'+'/' + id +'','_blank')
        }
    });


</script>



</body>

</html>







