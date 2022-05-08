@extends('layouts.site')

@section('css')
    <style>
        #slide-3045-layer-4 {
            font-size: 25pt !important;
        }
        .sliderTitle{
            font-size: 25pt !important;
        }
        .solve-item{
            min-height: 222px;
        }
        .sx-count{

        }
    </style>
@endsection


@section('content')


@if($pt1->active == 1)
    <!-- SLIDER START -->
    <div id="rev_slider_one_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase" data-source="gallery" style="background:#aaaaaa;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
        <div id="rev_slider_one" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
            <ul>
                @foreach ($sliderList as $x)
                <!-- SLIDE 1 -->
                    <li data-index="rs-{{$x->id}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default"
                    data-masterspeed="300"  data-thumb="images/main-slider/slider2/slide3.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="" data-param1="1" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ route("home.index.project.getimg") }}/{{$x->id}}/1"
                         data-bgcolor='#f8f8f8' alt=""  data-bgposition="center center"
                         data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

                    <!-- LAYER 1  right image overlay dark-->
                    <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup"
                         id="slide-70-layer-1"
                         data-x="['right','right','right','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontweight="['100','100','400','400']"
                         data-width="['full','full','full','full']"
                         data-height="['full','full','full','full']"
                         data-whitespace="nowrap"

                         data-type="shape"
                         data-basealign="slide"
                         data-responsive_offset="off"
                         data-responsive="off"
                         data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
                         data-textAlign="['left','left','left','left']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 6;background-color:rgba(0,0,0,0.5);">
                    </div>

                    <!-- LAYER 3  Thin text title-->
                    <div class="tp-caption   tp-resizeme slider-tag-line"
                         id="slide-70-layer-3"
                         data-x="['left','left','left','center']" data-hoffset="['50','50','70','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-50','-50','-50','-50']"
                         data-fontsize="['22',22','20','16']"
                         data-lineheight="['26','26','26','22']"
                         data-width="['700','650','620','380']"
                         data-height="none"
                         data-whitespace="nowrap"

                         data-type="text"
                         data-responsive_offset="on"

                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;",
                                "mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                         data-textAlign="['left','left','left','center']"
                         data-paddingtop="[10,10,10,10]"
                         data-paddingright="[20,20,20,20]"
                         data-paddingbottom="[10,10,10,10]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 10; color: #fff;font-family: 'Poppins', sans-serif;">{{$x->title}}</div>

                    <!-- LAYER 4  Bold Title-->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-70-layer-4"
                         data-x="['left','left','left','center']" data-hoffset="['50','50','70','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['10','10','10','10']"
                         data-fontsize="['64','64','60','40']"
                         data-lineheight="['74','74','70','50']"
                         data-width="['700','700','700','90%']"
                         data-height="none"
                         data-whitespace="normal"

                         data-type="text"
                         data-responsive_offset="on"

                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;",
                                "mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                         data-textAlign="['left','left','left','center']"
                         data-paddingtop="[20,20,20,20]"
                         data-paddingright="[20,20,20,20]"
                         data-paddingbottom="[30,30,30,30]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 10; text-transform:uppercase; white-space: normal;font-weight: 800; color: #fff;font-family: 'Poppins', sans-serif;">{{$x->subtitle}}</div>

{{--                    <!-- LAYER 5  Paragraph-->--}}
{{--                    <div class="tp-caption   tp-resizeme"--}}
{{--                         id="slide-70-layer-5"--}}
{{--                         data-x="['left','left','left','center']" data-hoffset="['50','50','70','0']"--}}
{{--                         data-y="['middle','middle','middle','middle']" data-voffset="['80','80','80','80']"--}}
{{--                         data-fontsize="['16','16','16','16']"--}}
{{--                         data-lineheight="['22','22','22','22']"--}}
{{--                         data-width="['600','600','600','380']"--}}
{{--                         data-height="none"--}}
{{--                         data-whitespace="normal"--}}

{{--                         data-type="text"--}}
{{--                         data-responsive_offset="on"--}}

{{--                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;",--}}
{{--                                "mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":3500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},--}}
{{--                                {"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'--}}

{{--                         data-textAlign="['left','left','left','center']"--}}
{{--                         data-paddingtop="[20,20,20,20]"--}}
{{--                         data-paddingright="[20,20,20,20]"--}}
{{--                         data-paddingbottom="[30,30,30,30]"--}}
{{--                         data-paddingleft="[0,0,0,0]"--}}

{{--                         style="z-index: 10; white-space: normal; color: #fff;font-family: 'Poppins', sans-serif;">Analysis and planning services that help both the client and architects to work out the forthcoming project...</div>--}}

                    <!-- LAYER 6  Read More-->
                    <div class="tp-caption rev-btn  tp-resizeme"
                         id="slide-70-layer-6"
                         data-x="['left','left','left','center']" data-hoffset="['50','50','70','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['160','160','160','160']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-type="button"
                         data-responsive_offset="on"

                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;",
                                "mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":4000,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'

                         data-textAlign="['left','left','left','center']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index:9; line-height:30px;"><a href="{{route('home.project', $x->id)}}" data-id="{{$x->id}}" class="site-button btn-half"><span> Read More</span></a></div>

                </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer" style="height: 10px; background: rgba(0, 0, 0, 0.15);"></div>

        </div>
    </div>
    <!-- SLIDER END -->
@endif

    <!-- End Sidebar Modal -->
    @if($pt2->active == 1)
    <div class="section-full  mobile-page-padding bg-white  p-t80 p-b80">

        <div class="container">
            <!-- TITLE START -->
            <div class="section-head">
                <div class="sx-separator-outer separator-center">
                    <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url({{asset('assets/site/images/background/cross-line2.png')}})">
                        <h3 class="sep-line-one">Our Projects</h3>
                    </div>
                </div>
            </div>
            <!-- TITLE END -->

            <!-- Filter Nav START -->
            <div class="filter-wrap p-b30 text-center">
                <ul class="filter-navigation masonry-filter clearfix">
                    <li class="active"><a class="btn from-top" data-filter="*" href="#" data-hover="All">All</a></li>
                    <li><a class=" btn from-top" data-filter=".cat-1" href="#">Architecture</a></li>
                    <li><a class=" btn from-top" data-filter=".cat-2" href="#">Decore</a></li>
                    <li><a class=" btn from-top" data-filter=".cat-3" href="#">Outdoor</a></li>
                    <li><a class=" btn from-top" data-filter=".cat-4" href="#">Interiors </a></li>
                    <li><a class=" btn from-top" data-filter=".cat-5" href="#">Residential</a></li>
                </ul>
            </div>
            <!-- Filter Nav END -->

            <!-- GALLERY CONTENT START -->
            <ul  class="masonry-outer mfp-gallery work-grid row clearfix list-unstyled m-b0">


                <!-- COLUMNS 1 -->
                @foreach ($projects_m as $x)
                    @php
                        $kinds = $x->kinds;
@endphp

                <li class="masonry-item @foreach($kinds as $kind){{$kind->title .' '}} @endforeach col-lg-4 col-md-6 col-sm-12 m-b30">
                    <div class="sx-box   image-hover-block">
                        <div class="sx-thum-bx">
                            <img src="{{ route("home.index.project.getimg") }}/{{$x->id}}/1" alt="{{$x->title}}">
                        </div>
                        <div class="sx-info  p-t20 text-white">
                            <h4 class="sx-tilte"><a href="{{route('home.project' , $x->id)}}">{{$x->title}}</a></h4>
                            <p class="m-b0">{{$x->subtitle}}</p>
                        </div>
                        <a class="mfp-link" href="{{ route("home.index.project.getimg") }}/{{$x->id}}/1">
                            <i class="fa fa-arrows-alt"></i>
                        </a>
                    </div>
                </li>
            @endforeach
                <!-- COLUMNS 2 -->

            </ul>
            <!-- GALLERY CONTENT END -->

            <div class="text-center load-more-btn-outer" style="background-image:url({{asset('assets/site/images/background/cross-line.png')}})">
                <button class="site-button-secondry btn-half"><span>Load More</span></button>
            </div>
        </div>
    </div>
    @endif


    <!-- Start Country Area -->

    <!-- End Country Area -->

    <!-- Start Fun Facts Area -->
    @if($st1->active == 1)
        <!-- OUR TEAM START -->
        <div class="section-full p-t80 p-b50 bg-gray mobile-page-padding">
            <div class="container">

                <!-- TITLE START -->
                <div class="section-head">
                    <div class="sx-separator-outer separator-center">
                        <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url({{asset('assets/site/images/background/cross-line2.png')}})">
                            <h3 class="sep-line-one">Our Experts</h3>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->

                <!-- IMAGE CAROUSEL START -->
                <div class="section-content">
                    <div class="row justify-content-center">
                        @foreach($members as $member)
                            <div class="col-lg-4 col-md-6 col-sm-12 m-b30">
                                <div class="our-team-3">
                                    <div class="our-team-info ">
                                        <img src="{{ asset('/upload') }}/{{$member->file}}" alt="{{$member->name}}"/>
                                        <div class="our-team-content">
                                            <h4 class="sx-team-name"><a href="team-single.html">{{$member->name}}</a></h4>
                                            <span class="sx-team-position text-white">{{$member->major}}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="hilite-title text-left p-l50 text-uppercase">
                <strong>Experts</strong>
            </div>
        </div>
        <!-- OUR TEAM END -->

    @endif
    <!--<section class="fun-facts-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-fact">
                            <p>Beneficiaries</p>
                            <h3>
                                <span class="sign-icon dolor">$</span>
                                <span class="odometer" data-count="500">00</span>
                                <span class="sign-icon">M</span>
                            </h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-fact">
                            <p>Happy Donators</p>
                            <h3>
                                <span class="odometer" data-count="458">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-fact">
                            <p>Volunteer</p>
                            <h3>
                                <span class="odometer" data-count="45">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-fact">
                            <p>Donated Poor</p>
                            <h3>
                                <span class="odometer" data-count="20">00</span>
                                <span class="sign-icon">K</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->
    <!-- End Fun Facts Area -->

    <!-- Start Causes Area -->

    <!-- End Causes Area -->

    <!-- Start Donor Area -->


@if($st1->active == 1)
    <a class="staticLink" data-id="{{$st1->id}}">

        {!!
            $st1->desccode
        !!}
    </a>

@endif
    @if($pt3->active == 1)

        <!-- OUR SERVICES START -->
        <div class="section-full mobile-page-padding p-t80 bg-white bg-change-section">
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head">
                    <div class="sx-separator-outer separator-center">
                        <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url({{asset('assets/site/images/background/cross-line2.png')}})">
                            <h3 class="sep-line-one">Services</h3>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->
            </div>
            <div class="owl-carousel service-slider owl-btn-vertical-center">
                @foreach($services as $service)
                    <div class="item">
                        <div class="bgcall-block d-flex flex-wrap justify-content-center align-content-end bg-cover overlay-wraper" style="background-image:url({{ asset('/upload') }}/{{$service->file}});">
                            <div class="overlay-main bg-black opacity-05"></div>
                            <div class="bg-content-mid-outer">
                                <div class="bg-content-mid">
                                    <div class="sx-icon-box-wraper center   text-white">
                                        <div class="icon-lg m-b15">
                                            <span class="icon-cell"><i class="{{$service->icon_name}}"></i></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="sx-tilte"> <a href="#" class="sx-text-white"> {{$service->name}}</a></h4>
                                        </div>
                                    </div>
                                    <span class="bgcall-block-number">{{$service->id}}</span>
                                    <div class="bg-overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- OUR SERVICES END -->






    @endif
    <!-- End Donor Area -->

    @if($pt4->active == 1)

    @endif



    @if($pt5->active == 1)

    @endif

    @if($pt6->active == 1)
        <!-- Start Team Area -->
    @endif








    <!-- End Team Area -->

    <!-- Start Events Area -->

    <!-- End Events Area -->

    <!-- Start Testimonials Area -->
    <!-- End Testimonials Area -->



    <!-- Start Blog Area -->

    <!-- End Blog Area -->
@endsection

@section('js')
@endsection
