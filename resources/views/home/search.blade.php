@extends('layouts.site')

@section('css')

@endsection

@section('content')
        
        @if($items->count() > 0)
        <!-- Start Blog Area -->
        <div class="page-content">
            <!-- INNER PAGE BANNER -->
            <div class="sx-bnr-inr overlay-wraper bg-parallax bg-top-center"  data-stellar-background-ratio="0.5"  style="background-image:url({{asset('assets/site/images/background/f-bg.jpg')}})">
                <div class="overlay-main bg-black opacity-07"></div>
                <div class="container">
                    <div class="sx-bnr-inr-entry">
                        <div class="banner-title-outer">
                            <div class="banner-title-name">
                                <h2 class="m-tb0">Search Results</h2>
                                <p>
                                    The essence of interior design will always be about people and how they live. It is
                                    about the realities of what makes for an attractive, civilized.
                                </p>
                            </div>
                        </div>
                        <!-- BREADCRUMB ROW -->

                        <div>
                            <ul class="sx-breadcrumb breadcrumb-style-2">
                                <li><a href="/">Home</a></li>
                                <li>Search</li>
                            </ul>
                        </div>

                        <!-- BREADCRUMB ROW END -->
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->
            <div class="section-full p-tb80 inner-page-padding">
                <div class="container">
                    <!-- Filter Nav START -->
                    <ul  class="masonry-outer mfp-gallery work-grid row clearfix list-unstyled">

                        <!-- COLUMNS 1 -->
                        @foreach($items as $x)
                            <li class="masonry-item cat-1 col-lg-4 col-md-6 col-sm-12 m-b30">
                                <div class="sx-box   image-hover-block">
                                    <div class="sx-thum-bx">
                                        <img src="{{asset('upload/'. $x->file)}}" alt="{{$x->title}}">
                                    </div>
                                    <div class="sx-info  p-t20 text-white">
                                        <h4 class="sx-tilte m-t0"><a href="{{route('home.project', $x->id)}}">{{$x->title}}</a></h4>
                                        <p class="m-b0">{{$x->address}}</p>
                                    </div>
                                    <a class="mfp-link" href="{{asset('upload/'. $x->file)}}">
                                        <i class="fa fa-arrows-alt"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>





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
        </div>
        <!-- End Blog Area -->
        @else
        <span style="min-height: 400px; display: block; line-height: 400px; text-align: center; font-size: 45pt; color: #ff5a0b;">لا يوجد بيانات للعرض</span>
        @endif
        <!-- End Causes Details Area -->
@endsection

@section('js')
@endsection
