@extends('layouts.site')

@section('css')
{{--    <style>--}}
{{--        h5.vc_custom_heading.custom-sidebar-head-bg {--}}
{{--            color: #FFF;--}}
{{--            background-color: #154272;--}}
{{--            padding: 6px 12px;--}}
{{--        }--}}

{{--        /* Sidebar Donation Styling*/--}}
{{--        .donation-aside-cont .row .col-12{--}}
{{--            /*background-color: #EDFFFF;*/--}}
{{--            background-color: #659ad2;--}}
{{--            text-transform: uppercase;--}}
{{--            font-weight: 600;--}}
{{--        }--}}

{{--        .custom-heading-sidebar .custom-sidebar-head-bg{--}}
{{--            color: #FFF;--}}
{{--            background-color: #154272;--}}
{{--            padding: 6px 12px;--}}
{{--        }--}}

{{--        .donation-aside-cont .plus-treatment p{--}}
{{--            /*color: #154272;*/--}}
{{--            color: #ffffff;--}}
{{--            font-weight: bold;--}}
{{--            font-size: 14px;--}}
{{--            font-family: inherit !important;--}}
{{--        }--}}
{{--        .form-control {--}}
{{--            webkit-appearance: auto;--}}
{{--            -moz-appearance: auto;--}}
{{--            appearance: auto;--}}
{{--        }--}}
{{--        /*.donation-aside-cont .aside-donate-amount2{*/--}}
{{--        /*    display: none;*/--}}
{{--        /*}*/--}}

{{--        .donation-aside-cont .aside-donate-amount label,--}}
{{--        .donation-aside-cont .aside-donate-amount2 label,--}}
{{--        .donation-aside-cont .aside-donate-types label{--}}
{{--            width: 100%;--}}
{{--            cursor: pointer;--}}
{{--        }--}}

{{--        .donation-aside-cont .aside-donate-amount input[type="radio"],--}}
{{--        .donation-aside-cont .aside-donate-amount2 input[type="radio"],--}}
{{--        .donation-aside-cont .aside-donate-types input[type="radio"]{--}}
{{--            display: none;--}}
{{--        }--}}

{{--        .donation-aside-cont .aside-donate-amount input[type="radio"]:checked + label,--}}
{{--        .donation-aside-cont .aside-donate-amount2 input[type="radio"]:checked + label,--}}
{{--        .donation-aside-cont .aside-donate-types input[type="radio"]:checked + label{--}}
{{--            background-color: #FF8031;--}}
{{--            color: #FFF;--}}
{{--            border: 2px solid #FF8031;--}}
{{--        }--}}

{{--        .donation-aside-cont .aside-donate-types .donate-single{--}}
{{--            background-color: #ffffff;--}}
{{--            /*border: 2px solid #659ad2;*/--}}
{{--            border: 2px solid #ffffff;--}}
{{--            color: #659ad2;--}}
{{--        }--}}

{{--        .donation-aside-cont .aside-donate-types .p-r{--}}
{{--            padding-right: 0px;--}}
{{--        }--}}

{{--        .donation-aside-cont .aside-donate-types .p-l{--}}
{{--            padding-left: 0px;--}}
{{--        }--}}

{{--        .donation-aside-cont .aside-donate-types .donate-monthly{--}}
{{--            /*border: 2px solid #659ad2;*/--}}
{{--            border: 2px solid #ffffff;--}}
{{--            color: #154272;--}}
{{--            background-color: #FFF;--}}
{{--        }--}}

{{--        .donation-aside-cont .aside-donate-amount2 .col-3 label,--}}
{{--        .donation-aside-cont .aside-donate-amount .col-3 label{--}}
{{--            background-color: #f1f1f1;--}}
{{--            /*border: 2px solid #659ad2;*/--}}
{{--            border: 2px solid #f1f1f1;--}}
{{--            text-align: center;--}}
{{--            margin-top: 5px;--}}
{{--            margin-bottom: 5px;--}}
{{--        }--}}

{{--        .donation-aside-cont .custom-amount-input .custom-amount{--}}
{{--            border: 1px solid #659ad2;--}}
{{--            padding: .375rem .75rem;--}}
{{--        }--}}

{{--        .donation-aside-cont .side-dnt-cont .side-dnt-btn{--}}
{{--            color: #FFF;--}}
{{--            font-weight: bold;--}}
{{--            background-color: #d20001;--}}
{{--        }--}}

{{--        .donation-aside-cont .side-dnt-cont .side-dnt-btn .fa-chevron-right{--}}
{{--            padding-left: 10px;--}}
{{--        }--}}


{{--        /* Donation 100 Styling*/--}}
{{--        .wpb_wrapper {--}}
{{--            background: #659ad2;--}}
{{--        }--}}
{{--        #sidebardonate-container-sticky {--}}
{{--            min-height: auto;--}}
{{--            overflow: auto;--}}
{{--            position: -webkit-sticky;--}}
{{--            position: sticky;--}}
{{--            top: 30%;--}}
{{--        }--}}
{{--    </style>--}}
@endsection

@section('content')

    @if($obj)
        @if($obj->active)
            @if($obj->cover)


                <div class="sx-bnr-inr overlay-wraper bg-parallax bg-top-center"  data-stellar-background-ratio="0.5"  style="background-image:url({{ route("home.index.project.getimg") }}/{{$obj->id}}/3);">
                    <div class="overlay-main bg-black opacity-07"></div>
                    <div class="container">
                        <div class="sx-bnr-inr-entry">
                            <div class="banner-title-outer">
                                <div class="banner-title-name">
                                    <h2 class="m-tb0">{{$obj->title}}</h2>
                                    <p>{{$obj->subtitle}}</p>
                                </div>
                            </div>
                            <!-- BREADCRUMB ROW -->

                            <div>
                                <ul class="sx-breadcrumb breadcrumb-style-2">
                                    <li><a href="/">Home</a></li>
                                    <li>Project-detail</li>
                                </ul>
                            </div>

                            <!-- BREADCRUMB ROW END -->
                        </div>
                    </div>
                </div>
                <!-- INNER PAGE BANNER END -->

            @endif
            <!-- SECTION CONTENT START -->
            <div class="section-full p-tb80 inner-page-padding stick_in_parent">
                <div class="container">
                    <div class="row">
                        <div  class="col-lg-7 col-md-7  sticky_column">
                            <div  class="project-detail-containt">
                                <div class="bg-white text-black">
                                    <h3>{{$obj->title}} </h3>
                                    <p> {!!$obj->desccode!!}.</p>
                                    <div class="product-block">
                                        <ul>
                                            <li>
                                                <h4 class="m-b10">Date</h4>
                                                <p>October 10, 2019</p>
                                            </li>
                                            <li>
                                                <h4 class="m-b10">Client</h4>
                                                <p>Studio Massimo, Italy</p>
                                            </li>
                                            <li>
                                                <h4 class="m-b10">Project type</h4>
                                                <p>Contruction, Brading</p>
                                            </li>
                                            <li>
                                                <h4 class="m-b10">Location</h4>
                                                <p>Mountain View CA 94043</p>
                                            </li>
                                            <li>
                                                <h4 class="m-b10">Year</h4>
                                                <p>2019</p>
                                            </li>
                                        </ul>
                                    </div>


                                    <div class="m-b0">
                                        <div class="sx-divider divider-1px  bg-black"><i class="icon-dot c-square"></i></div>
                                    </div>
                                    {{--                            <ul class="social-icons social-square social-darkest m-b0">--}}
                                    {{--                                <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>--}}
                                    {{--                                <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>--}}
                                    {{--                                <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>--}}
                                    {{--                                <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>--}}
                                    {{--                                <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>--}}
                                    {{--                                <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>--}}
                                    {{--                            </ul>--}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5 ">

                            <div class="project-detail-outer">

                                <div class="project-detail-pic m-b30">
                                    <div class="sx-media">
                                        <img src="{{asset('assets/site/images/projects/portrait/pic7.jpg')}}" alt="">
                                    </div>
                                </div>

                                <div class="project-detail-pic m-b30">
                                    <div class="sx-media">
                                        <img src="{{asset('assets/site/images/projects/portrait/pic4.jpg')}}" alt="">
                                    </div>
                                </div>

                                <div class="project-detail-pic m-b30">
                                    <div class="sx-media">
                                        <img src="{{asset('assets/site/images/projects/portrait/pic5.jpg')}}" alt="">
                                    </div>
                                </div>

                                <div class="sx-box">

                                    <div class="sx-thum-bx sx-img-overlay1 sx-img-effect yt-thum-box">
                                        <img src=" https://img.youtube.com/vi/{{ $obj->youtube }}/mqdefault.jpg" alt="">
                                        <a href="https://www.youtube.com/watch?v={{$obj->youtube}}"  class="mfp-video play-now" data-id="{{$obj->id}}">
                                            <i class="icon fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                    {{--            <div  class="project-detail-containt-2 m-t50">--}}
                    {{--                <h3>Creating a sustainable future through building preservation, green architecture, and smart design</h3>--}}
                    {{--                <p class="m-b0"> Designers think everything done by someone else is awful, and that they could do it better themselves, which explains why I designed my own living room carpet, I suppose. the architect represents neither a Dionysian nor an Apollinian condition: here it is the mighty act of will, the will which moves mountains, the intoxication of the strong will, which demands artistic expression. The most powerful men have always inspired the architects; the architect has always been influenced by power.</p>--}}
                    {{--            </div>--}}
                </div>
            </div>
            <!-- SECTION CONTENT END  -->


        @else
            <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>
        @endif
    @else
        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>
    @endif



    <!-- Similar projects START -->

    <div class="section-full p-tb80 bg-gray inner-page-padding">
        <div class="container">
            <div class="section-content">
                <!-- TITLE START -->
                <div class="section-head">
                    <div class="sx-separator-outer separator-left">
                        <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url({{asset('assets/site/images/background/cross-line2.png')}})">
                            <h3 class="sep-line-one">Similar Project</h3>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->
                <div class="work-carousel-outer">
                    <div class="owl-carousel mfp-gallery project-carousel project-carousel3 owl-btn-vertical-center p-lr80">
                        <!-- COLUMNS 1 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic4.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/portrait/pic4.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Life style building</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 2 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic9.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/square/pic9.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Modern Bathroom</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 3 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic10.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/square/pic10.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Dream House</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 4 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic6.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/portrait/pic6.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Bellevue Projects</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 5 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic7.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/square/pic7.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Modish Interior</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 6 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic8.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/square/pic8.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Vilters</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 7 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic9.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/portrait/pic9.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Dream Home</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 8 -->
                        <div class="item">
                            <div class="project-mas m-a30">
                                <div class="image-effect-one">
                                    <img src="{{asset('assets/site/images/projects/square/pic2.jpg')}}" alt="" />
                                    <div class="figcaption">
                                        <a class="mfp-link" href="{{asset('assets/site/images/projects/square/pic2.jpg')}}">
                                            <i class="fa fa-arrows-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-info p-t20">
                                    <h4 class="sx-tilte  m-t0"><a href="javascript:;">Living Room</a></h4>
                                    <p>Engineering your dreams with us the architect has always.</p>
                                    <a href ="#"><i class="link-plus bg-primary"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Similar projects END -->









@endsection

@section('js')
@endsection
