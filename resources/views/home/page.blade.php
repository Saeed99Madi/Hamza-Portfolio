@extends('layouts.site')

@section('css')
{{--    <style>--}}
{{--        button.close {--}}
{{--            display: none;--}}
{{--        }--}}
{{--    </style>--}}
@endsection

@section('content')

{{--    @if($obj)--}}
{{--        @if($obj->active)--}}

    <div class="page-wraper">


        <!-- CONTENT START -->
        <div class="page-content">

            <!-- INNER PAGE BANNER -->
            <div class="sx-bnr-inr overlay-wraper bg-parallax bg-top-center"  data-stellar-background-ratio="0.5"  style="background-image:url({{asset('assets/site/images/background/f-bg.jpg')}})">
                <div class="overlay-main bg-black opacity-07"></div>
                <div class="container">
                    <div class="sx-bnr-inr-entry">
                        <div class="banner-title-outer">
                            <div class="banner-title-name">
                                <h2 class="m-tb0">{{$obj->title}}</h2>
                                {!!$obj->desccode!!}
{{--                                <p>The essence of interior design will always be about people and how they live. It is about the realities of what makes for an attractive, civilized.</p>--}}
                            </div>
                        </div>
                        <!-- BREADCRUMB ROW -->

                        <div>
                            <ul class="sx-breadcrumb breadcrumb-style-2">
                                <li><a href="/">Home</a></li>
                                <li>{{$obj->title}}</li>
                            </ul>
                        </div>

                        <!-- BREADCRUMB ROW END -->
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->

            <!-- SECTION CONTENTG START -->
            <div class="section-full p-tb80 inner-page-padding">
                <!-- LOCATION BLOCK-->
                <div class="container">

                    <!-- GOOGLE MAP & CONTACT FORM -->
                    <div class="section-content">
                        <!-- CONTACT FORM-->
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <form class="contact-form  bg-gray p-a30"  novalidate="true" method="post" action="{{route('home.contact')}}" >
                                    @csrf
                                    <div class="contact-one">

                                        <!-- TITLE START -->
                                        <div class="section-head">
                                            <div class="sx-separator-outer separator-left">
                                                <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url({{asset('assets/site/images/background/cross-line2.png')}})">
                                                    <h3 class="sep-line-one">Form</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- TITLE END -->

                                        <div class="form-group">
                                            <input name="name" type="text" required class="form-control" placeholder="Name">
                                        </div>

                                        <div class="form-group">
                                            <input name="email" type="text" class="form-control" required placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <input name="subjects" type="text" class="form-control" required placeholder="Subjects">
                                        </div>

                                        <div class="form-group">
                                            <textarea name="message" rows="4" class="form-control " required placeholder="Message"></textarea>
                                        </div>

                                        <div class="text-right">
                                            <button name="submit" type="submit" value="Submit" class="site-button btn-half"><span> submit</span>

                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="contact-info block-shadow bg-white bg-center p-a40" style="background-image:url({{asset('assets/site/images/background/bg-map.png')}})">

                                    <div>
                                        <!-- TITLE START -->
                                        <div class="section-head">
                                            <div class="sx-separator-outer separator-left">
                                                <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url({{asset('assets/site/images/background/cross-line2.png')}})">
                                                    <h3 class="sep-line-one">Info</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- TITLE END -->
                                        <div class="sx-icon-box-wraper left p-b30">
                                            <div class="icon-xs"><i class="fa fa-phone"></i></div>
                                            <div class="icon-content">
                                                <h5 class="m-t0">Phone number</h5>
                                                <p>{{$settings->phone}}</p>
                                            </div>
                                        </div>

                                        <div class="sx-icon-box-wraper left p-b30">
                                            <div class="icon-xs"><i class="fa fa-envelope"></i></div>
                                            <div class="icon-content">
                                                <h5 class="m-t0">Email address</h5>
                                                <p>{{$settings->email}}</p>
                                            </div>
                                        </div>

                                        <div class="sx-icon-box-wraper left">
                                            <div class="icon-xs"><i class="fa fa-map-marker"></i></div>
                                            <div class="icon-content">
                                                <h5 class="m-t0">Address info</h5>
                                                <p>{{$settings->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="gmap-outline">
                <div id="gmap_canvas2" class="google-map"></div>
            </div>
            <!-- SECTION CONTENT END -->

        </div>
        <!-- CONTENT END -->



    </div>



{{--    --}}{{--    fasel --}}

{{--<div class="PageController" id="PageController" ng-controller="PageController">--}}

{{--    <div id="rev_slider_one_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase" data-source="gallery" style="background:#aaaaaa;padding:0px;">--}}
{{--        @if($obj)--}}
{{--        @if($obj->active)--}}

{{--        <!-- Start Causes Details Area -->--}}
{{--        <section class="causes-details-area ptb-100">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12 col-md-12">--}}
{{--                        <div class="causes-details-desc">--}}
{{--                            <div class="causes-details-text">--}}
{{--                                <div class="progress pink">--}}
{{--                                    <div class="progress-bar">--}}
{{--                                        <div class="progress-value" style="width: 50%;">50%</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3>{{$obj->title}}</h3>--}}
{{--                                {!!$obj->desccode!!}--}}
{{--                            </div>--}}
{{--                            @if($obj->id == 3)--}}
{{--                            <script>--}}
{{--                              setTimeout(() => {--}}
{{--                                window.scrollTo(0,450);--}}
{{--                              }, 2000);--}}

{{--                            </script>--}}
{{--                            <div class="causes-details-payment">--}}
{{--								<div class="payment-method" style="margin-bottom:40px;">--}}
{{--									<h3>تواصل معنا</h3>--}}
{{--                                </div>--}}

{{--                                <div class="row">--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    {!!$con->desccode!!}--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-8">--}}
{{--                                    <div class="contact-area">--}}
{{--                                        <!--<div class="contact-content">--}}
{{--                                            <h3>Let’s talk!</h3>--}}
{{--                                            <p>Contact us to get, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ainim veniam.</p>--}}
{{--                                        </div>--}}
{{--                                        -->--}}
{{--                                        <div class="contact-form">--}}
{{--                                            @include("_msg")--}}
{{--                                            <form id="contactForm1" novalidate="true" method="post" action='{{route("home.contact")}}'>--}}
{{--                                            	<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-lg-6 col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <input type="text" name="name" id="name" value='{{ old("name") }}' class="form-control" required="" data-error="يجب إدخال الإسم" placeholder="أدخل الإسم">--}}
{{--                                                            <div class="help-block with-errors"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-lg-6 col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <input type="email" name="email" id="email" value='{{ old("email") }}' class="form-control" required="" data-error="أدخل البريد الإلكتروني" placeholder="البريد الإلكتروني">--}}
{{--                                                            <div class="help-block with-errors"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-lg-12 col-md-12">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <input type="subjects" name="subjects" id="subjects" value='{{ old("subjects") }}' class="form-control" required="" data-error="أدخل العنوان" placeholder="العنوان">--}}
{{--                                                            <div class="help-block with-errors"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-lg-12 col-md-12">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <textarea style="height:200px;" name="message" value='{{ old("message") }}' class="form-control" id="message" cols="30" rows="8" required="" data-error="أدخل المراسلة هنا" placeholder="أكتب هنا"></textarea>--}}
{{--                                                            <div class="help-block with-errors"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-lg-12">--}}
{{--                                                        <div class="send-btn">--}}
{{--                                                            <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">--}}
{{--                                                                إرسال--}}
{{--                                                                <i class="flaticon-right"></i>--}}
{{--                                                                <span style="top: 59.625px; left: -0.46875px;"></span>--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                        <div id="MsgSubmit" class="h3 text-center hidden"></div>--}}
{{--                                                        <div class="clearfix"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                </div>--}}

{{--							</div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        @else--}}
{{--        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>--}}
{{--        @endif--}}
{{--        @else--}}
{{--        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>--}}
{{--        @endif--}}
{{--    </div>--}}
    <!-- SLIDER END -->


        <!-- End Causes Details Area -->
@endsection

@section('js')
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqwdZHU6gzIhPBEB2VNbIydp4coZmNPy0&callback=initMap"  ></script><!-- GOOGLE MAP -->
    <script  src="{{asset('js/map.script.js')}}"></script><!-- MAP FUCTIONS [ this file use with google map]  -->


@endsection
