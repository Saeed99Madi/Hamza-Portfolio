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

<div class="PageController" id="PageController" ng-controller="PageController">

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
                    <li class="active">
						<a class="btn from-top" data-filter="*" href="#" ng-click="loadcat(0)" data-hover="All">All</a></li>
                    @foreach ($cats as $cat)
						<li><a class=" btn from-top"  ng-click="loadcat({{$cat->id}})" href="#">{{ $cat->title }}</a></li>
					@endforeach
                </ul>
            </div>
            <!-- Filter Nav END -->

            <!-- GALLERY CONTENT START -->
            <ul  class="masonry-outer1 mfp-gallery work-grid row clearfix list-unstyled m-b0 dulproject">


                <!-- COLUMNS 1 -->
                
                <li class="masonry-item col-lg-4 col-md-6 col-sm-12 m-b30" ng-repeat="r in arr | filter:searchText track by $index">
                        <div class="sx-box   image-hover-block">
                            <div class="sx-thum-bx">

                                <img src="./thumb.php?src=./upload/<%r.file%>&size=400x300&trim=1&zoom=1" alt="<%r.title%>">
                            </div>
                            <div class="sx-info  p-t20 text-white">
                                <h4 class="sx-tilte"><a href="{{route('home.project')}}/<%r.id%>"><%r.title%></a></h4>
                                <p class="m-b0"><%r.subtitle%></p>
                            </div>
                            <a class="mfp-link" href="{{ route("home.index.project.getimg") }}/<%r.id%>/1">
                                <i class="fa fa-arrows-alt"></i>
                            </a>
                        </div>
                </li>

                <!-- COLUMNS 2 -->

            </ul>
            <!-- GALLERY CONTENT END -->

            <div class="text-center load-more-btn-outer" style="background-image:url({{asset('assets/site/images/background/cross-line.png')}})">
                <button class="site-button-secondry btn-half" id="btnLoadMore" ng-click="loadmore()"><span>Load More</span></button>
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

    @endif
    
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
    
</div>
@endsection

@section('js')
<script>
	$("#btnLoadMore1").click(function(){
		angular.element('#PageController').scope().loadmore();
		angular.element('#PageController').scope().Apply();
	});
	myApp.controller('PageController', function ($scope, $http, $rootScope) {
		$scope.init = function () {
		}
		$scope.date = Date.now();
		$scope.arr = [];
		$scope.catid = 0;
		$scope.skip = 0;
		$scope.take = 3;
		$scope.Apply = function () {
			$scope.date = Date.now();
			$scope.$apply();
		}
        $scope.loadimage = function () {
            gifFun(1);
            $http({
                    method: 'GET',
                    params: {
                        catid: $scope.catid,
						skip: $scope.skip,
						take: $scope.take 
                    },
                    url: 'loadImage'
                }).then(function successCallback(response) {
                    console.log(response.data.list);
					if($scope.arr.length == 0){
						$scope.arr = response.data.list;
					}
					else {
                        console.log($scope.arr);
                        console.log(response.data.list);

                        $scope.arr.push.apply($scope.arr, response.data.list);
					}
					if(response.data.list.length > 0){
					console.log($scope.skip);
					console.log(response.data.list.length);
					 $scope.skip = $scope.skip + response.data.list.length;
					}
                gifFun(0);
            }, function errorCallback(response) {
                gifFun(0);
            });
         }
		$scope.loadimage();
		$scope.loadmore = function () {
			$scope.loadimage();
           // setTimeout(function(){
                //var height = document.getElementById('divul').offsetHeight;
             //   $(".ulproject").css({ 'height' : '' });
            //}, 500);
        }
		$scope.loadcat = function (cat) {
                $scope.arr = [];
				
				if($scope.catid != cat) {
					$scope.skip = 0;
				}
				$scope.catid = cat;
				$scope.loadimage();

                //setTimeout(function(){
				 // var height = document.getElementById('divul').offsetHeight;
               // $(".ulproject").css({ 'height' : '' });
				//}, 500);
         }
	});
</script>
@endsection
