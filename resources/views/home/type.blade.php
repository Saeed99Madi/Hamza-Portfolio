@extends('layouts.site')

@section('css')
    <style>
    </style>
@endsection

@section('content')

    @if($obj)
        @if($obj->active)

            <div class="page-content PageController"  id="PageController" ng-controller="PageController">
                <!-- INNER PAGE BANNER -->
                <div class="sx-bnr-inr overlay-wraper bg-parallax bg-top-center"  data-stellar-background-ratio="0.5"  style="background-image:url({{asset('assets/site/images/background/f-bg.jpg')}})">
                    <div class="overlay-main bg-black opacity-07"></div>
                    <div class="container">
                        <div class="sx-bnr-inr-entry">
                            <div class="banner-title-outer">
                                <div class="banner-title-name">
                                    <h2 class="m-tb0">{{$obj->title}}</h2>
                                    <p>
                                        The essence of interior design will always be about people and how they live. It is
                                        about the realities of what makes for an attractive, civilized.
                                    </p>
                                </div>
                            </div>
                            <!-- BREADCRUMB ROW -->

                            <div>
                                <ul class="sx-breadcrumb breadcrumb-style-2">
                                    <li><a href="javascript:void(0);">Home</a></li>
                                    <li>Project With Grid 3 Columns</li>
                                </ul>
                            </div>

                            <!-- BREADCRUMB ROW END -->
                        </div>
                    </div>
                </div>
                <div class="filter-wrap p-b30 text-center" style="margin-top: 40px;">
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
                <ul style="padding: 30px;"  class="masonry-outer1 mfp-gallery work-grid row clearfix list-unstyled m-b0 dulproject">


                    <!-- COLUMNS 1 -->

                    <li class="masonry-item col-lg-4 col-md-6 col-sm-12 m-b30" ng-repeat="r in arr | filter:searchText track by $index">
                        <div class="sx-box image-hover-block">
                            <div class="sx-thum-bx">

                                <img src="../thumb.php?src=./upload/<%r.file%>&size=400x300&trim=1&zoom=1" alt="<%r.title%>">
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

                <div class="text-center load-more-btn-outer" style="background-image:url({{asset('assets/site/images/background/cross-line.png')}})">
                    <button class="site-button-secondry btn-half" id="btnLoadMore" ng-click="loadmore()"><span>Load More</span></button>
                </div>
                <div ng-show="gif == true"></div>
            </div>
        <!-- Start Blog Area -->
{{--        <section class="blog-section pt-100 pb-100">--}}
{{--            <div class="container">--}}
{{--                <div class="col-md-12">--}}
{{--                <span style="text-align: center; display: block; font-size: 40pt; margin-bottom: 40px; color: #ff6217;">{{$obj->title}}</span>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @foreach($items as $x)--}}
{{--                    <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                        <div class="single-blog">--}}
{{--                            <img style="width: 100%;" src="{{ route("home.index.project.getimg") }}/{{$x->id}}/1" class="shadow" alt="image">--}}

{{--                            <div class="content">--}}
{{--                                <!--<span>Poor, 22 January</span>-->--}}
{{--                                <h3>--}}
{{--                                    <a href="#">--}}
{{--                                        {{$x->title}}--}}
{{--                                    </a>--}}
{{--                                </h3>--}}
{{--                                <a href="{{route('home.project', $x->id)}}" class="blog-btn projectLink" data-id="{{$x->id}}">للمزيد من المعلومات</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}

                            
                    @if ($paginator->hasPages())
                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                            <!-- Previous Page Link -->
                            @if ($paginator->onFirstPage())
                            @else
                                <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers">
                                    <i class="flaticon-left"></i>
                                </a>
                            @endif

                            <!-- Pagination Elements -->
                            @foreach ($elements as $element)
                                <!-- "Three Dots" Separator -->
                                @if (is_string($element))
                                <li class="disabled"><span>{{ $element }}</span></li>
                                @endif

                                <!-- Array Of Links -->
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                                        @else
                                            <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($paginator->hasMorePages())
                                <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers">
                                    <i class="flaticon-right"></i>
                                </a>
                            @else
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        <!-- End Blog Area -->
        @else
        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>
        @endif
        @else
        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>
        @endif
        <!-- End Causes Details Area -->

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
            $scope.take = 9;
            $scope.gif = false;
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
                    url: '{{route('home.loadImage')}}'
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
