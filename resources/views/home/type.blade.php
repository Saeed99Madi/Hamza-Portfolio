@extends('layouts.site')

@section('css')
    <style>
    </style>
@endsection

@section('content')
        
        @if($obj)
        @if($obj->active)

        <!-- Start Blog Area -->
        <section class="blog-section pt-100 pb-100">
            <div class="container">
                <div class="col-md-12">
                <span style="text-align: center; display: block; font-size: 40pt; margin-bottom: 40px; color: #ff6217;">{{$obj->title}}</span>
                </div>
                <div class="row">
                    @foreach($items as $x)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-blog">
                            <img style="width: 100%;" src="{{ route("home.index.project.getimg") }}/{{$x->id}}/1" class="shadow" alt="image">

                            <div class="content">
                                <!--<span>Poor, 22 January</span>-->
                                <h3>
                                    <a href="#">
                                        {{$x->title}}
                                    </a>
                                </h3>
                                <a href="{{route('home.project', $x->id)}}" class="blog-btn projectLink" data-id="{{$x->id}}">للمزيد من المعلومات</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                            
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
        </section>
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
@endsection
