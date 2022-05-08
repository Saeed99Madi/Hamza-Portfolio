@extends('layouts.panel')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/base/vendors.bundle.rtl.css')}}" />

    <style>
        .alert_msg{
            direction: rtl;
            text-align: right;
            margin-bottom: 0;
            padding-top: 20px;
        }
        .close{
            float: left;
            border: none;
            margin-top: -12px;
            margin-left: -10px;
            font-size: 20pt;
            background: none;
        }
        .alert{
            font-size: 14pt;
        }
        input#project_type {
            margin-right: 40px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group {
            margin-top: 10px;

        }
        .form-control.form-control-solid{
            background-color: #fff !important;
            border-color: #2a2b3a;
        }
        textarea{
            border-color: #2a2b3a !important;
        }
        .red_border{
            border-color: red !important;
        }
        .form-control:focus {
            border-color: 3px #000000 !important;
        }
        input#project_administrator {
            margin-right: 40px;
        }
        .form-check {
            float: right;
        }
        .content {
            padding: 0px 0px !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid ajaxForm">
        <div class="row">
            <div class="alert_msg">
                @include("_msg")
            </div>

            <div class="col-lg-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title" style="font-weight:bold;">{{__('project.info')}}</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-c">
                                <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
                            </div>
                        </div>
                    </div>

                    <div class="ErrorController" id="ErrorController"  ng-controller="ErrorController">
                        <div class="alert alert-danger" ng-show="list.length > 0">
                            <ul>
                                <li ng-repeat="r in list | filter:searchText track by $index"><% r.text %></li>
                            </ul>
                        </div>
                    </div>
                    <form class="form ajaxForm" action="{{ url()->current() }}" name="PageController" method="post" id="PageController" ng-controller="PageController" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <input type="hidden" name="id" value="{{$obj?$obj->id:''}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("project.title")}}</label>
                                        <input type="text" id="title" name="title" value="{{$obj?$obj->title:''}}" class="form-control form-control-solid" placeholder="{{__("project.enter").' '.__("project.title")}}" autocomplete="off">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("project.subtitle")}}</label>
                                        <input type="text" id="subtitle" name="subtitle" value="{{$obj?$obj->subtitle?$obj->subtitle:'':''}}" class="form-control form-control-solid" placeholder="{{__("project.enter").' '.__("project.subtitle")}}" autocomplete="off">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("project.cost")}}</label>
                                        <input type="text" id="cost" name="cost" value="{{$obj?$obj->cost:''}}" class="form-control form-control-solid" placeholder="{{__("project.enter").' '.__("project.cost")}}" autocomplete="off">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("project.youtube")}}</label>
                                        <input type="text" id="youtube" name="youtube" value="{{$obj?$obj->youtube?$obj->youtube:'':''}}" class="form-control form-control-solid" placeholder="{{__("project.enter").' '.__("project.youtube")}}" autocomplete="off">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" style="direction:ltr;">
                                        <label style="width: 100%; text-align: right;">{{__("project.desccode")}}</label>
                                        <textarea class="form-control summernote1" id="desccode" name="desccode" rows="3"></textarea>
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <input type="hidden" name="desc" id="desc" value="{{$obj?$obj->desccode:''}}">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="clear: both; display: block;">{{__("project.file")}}</label>
                                        <input type="file" id="file" name="file">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("project.catid")}}</label>

                                        <select id="catid" name="catid[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" style="width:100%;">
                                            <option></option>
                                            @foreach ($cats as $cat)
                                                <option value="{{$cat->id}}"> {{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" value="{{$typeString}}" id="typeString">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("project.kindid")}}</label>

                                        <select id="kindid" name="kindid[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" style="width:100%;">
                                            <option></option>
                                            @foreach ($kinds as $kind)
                                                <option value="{{$kind->id}}"> {{ $kind->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" value="{{$typeString_k}}" id="typeString_k">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="form-group" style="width: 100px; height: 100px;">
                                        <label style="clear: both; display: block; margin-bottom: 20px;">{{__("art.mainfile")}}</label>
                                        <img style="width: 100px; " src="{{ route("admin.project.getimg") }}/{{$obj->id}}/1&&date=<%date%>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="clear: both; display: block;">{{__("project.icon")}}</label>
                                        <input type="file" id="icon" name="icon">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="width: 100px; height: 100px;">
                                        <label style="clear: both; display: block; margin-bottom: 20px;">{{__("art.mainfile")}}</label>
                                        <img style="width: 100px; " src="{{ route("admin.project.getimg") }}/{{$obj->id}}/2&&date=<%date%>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="clear: both; display: block;">{{__("project.cover")}}</label>
                                        <input type="file" id="cover" name="cover">
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="clear: both; display: block; margin-bottom: 20px;">{{__("art.mainfile")}}</label>
                                        <img style="width: 100%;" src="{{ route("admin.project.getimg") }}/{{$obj->id}}/3&&date=<%date%>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="clear: both; display: block;">Project Gallery</label>
                                        <input type="file" id="images" name="images" multiple>
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                                @php
                                    $images_g = explode(',' , $obj->images);
                                @endphp

                                @foreach($images_g as $image_g)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img style="width: 100%;" src="{{asset('upload/')}}/{{$image_g}}">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="clear: both; margin-top: 15px; margin-bottom: 15px; display: block;">
                                        </label>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" name="active" type="checkbox" data-kt-check="true" data-kt-check-target="#kt-datatable .form-check-input" value="1" {{$obj->active == 1?'checked=checked':''}} />
                                            <span style="font-weight: bold; margin-right: 10px;">
                                            {{__("project.active")}}
                                            </span>
                                        </div>
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="btnSubmit" class="btn btn-primary mr-2">{{__('comn.Submit')}}
                                <span class="svg-icon svg-icon-3 ms-1 me-0">
												{!!__("icon.save")!!}
											</span>
                            </button>
                            <input type="reset" id="btnReset" style="display:none;">
                            </input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
    <!--<script src="{{asset('js/summernote.min.js')}}"></script>-->

    <script>
        $(".form-check-input").change(function(){
            angular.element('#PageController').scope().Apply();
        });
        $(function () {
            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    if (document.activeElement.id != "btnSubmit") {
                        event.preventDefault();
                        return false;
                    }
                }
            });
            //$(".summernote").summernote({ height: 200 });
            //var SummernoteDemo={init:function(){$(".summernote").summernote({height:350})}};jQuery(document).ready(function(){SummernoteDemo.init()});

            $('.summernote').summernote({
                height: 400,
                tabsize: 2
            });

            $("#desccode").summernote('code', $("#desc").val());

            if($("#typeString").val() != ''){
                var str = $("#typeString").val();
                var arr = str.split(',');
                $("#catid").val(arr).change();
            }
            if($("#typeString_k").val() != ''){
                var str = $("#typeString_k").val();
                var arr = str.split(',');
                $("#kindid").val(arr).change();
            }
        });
        myApp.controller('PageController', function ($scope, $http, $rootScope) {
            $scope.init = function () {
            }
            $scope.date = Date.now();
            $scope.Apply = function () {
                $scope.date = Date.now();
                $scope.$apply();
            }
        });
        $(".form-check-input").change(function(){
            angular.element('#PageController').scope().Apply();
        });
    </script>
@endsection


