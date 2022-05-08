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
						<h3 class="card-title" style="font-weight:bold;">{{__('menu.info')}}</h3>
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
										<label>{{__("menu.title")}}</label>
										<input type="text" id="title" name="title" value="{{$obj?$obj->title:''}}" class="form-control form-control-solid" placeholder="{{__("menu.enter").' '.__("menu.title")}}" autocomplete="off">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("menu.link")}}</label>
										<input type="text" id="link" name="link" value="{{$obj?$obj->link:''}}" class="form-control form-control-solid" placeholder="{{__("menu.enter").' '.__("menu.link")}}" autocomplete="off">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("menu.order")}}</label>
										<input type="text" id="order" name="order" value="{{$obj?$obj->order:''}}" class="form-control form-control-solid" placeholder="{{__("menu.enter").' '.__("menu.order")}}" autocomplete="off">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>                                
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("menu.parentid")}}</label>
                                        <select id="parentid" name="parentid" class="form-control">
                                            <option value="">إختر من القائمة</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{$cat->id}}" {{$obj->parentid == $cat->id?'selected':''}}> {{ $cat->title }}</option>
                                            @endforeach
                                        </select>
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("menu.typeid")}}</label>
                                        <select id="typeid" name="typeid" class="form-control">
                                            <option value="">إختر من القائمة</option>
                                            <option value="0" {{$obj->typeid == 0?'selected':''}}> قائمة الرئيسية</option>
                                            <option value="1" {{$obj->typeid == 1?'selected':''}}> قائمة footer 1</option>
                                            <option value="2" {{$obj->typeid == 2?'selected':''}}> قائمة footer 2</option>
                                            <option value="3" {{$obj->typeid == 3?'selected':''}}> قائمة footer 3</option>
                                            <option value="4" {{$obj->typeid == 4?'selected':''}}> قائمة footer 4</option>
                                            <option value="5" {{$obj->typeid == 5?'selected':''}}> قائمة footer 5</option>
                                        </select>
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-2" style="padding-top:40px;">
									<div class="form-group">
										<label style="clear: both; margin-top: 15px; margin-bottom: 15px; display: block;">
                                        </label>
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" name="active" type="checkbox" data-kt-check="true" data-kt-check-target="#kt-datatable .form-check-input" value="1" {{$obj->active == 1?'checked=checked':''}} />
                                            <span style="font-weight: bold; margin-right: 10px;">
                                            {{__("menu.active")}}
                                            </span>
										</div>
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-2" style="padding-top:40px;">
									<div class="form-group">
										<label style="clear: both; margin-top: 15px; margin-bottom: 15px; display: block;">
                                        </label>
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" name="external" type="checkbox" data-kt-check="true" data-kt-check-target="#kt-datatable .form-check-input" {{$obj->external == 1?'checked=checked':''}}  />
                                            <span style="font-weight: bold; margin-right: 10px;">
                                            {{__("menu.external")}}
                                            </span>
										</div>
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-2" style="padding-top:40px;">
									<div class="form-group">
										<label style="clear: both; margin-top: 15px; margin-bottom: 15px; display: block;">
                                        </label>
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" name="newtap" type="checkbox" data-kt-check="true" data-kt-check-target="#kt-datatable .form-check-input" value="1" {{$obj->newtap == 1?'checked=checked':''}} />
                                            <span style="font-weight: bold; margin-right: 10px;">
                                            {{__("menu.newtap")}}
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
                var SummernoteDemo={init:function(){$(".summernote").summernote({height:350})}};jQuery(document).ready(function(){SummernoteDemo.init()});

                
                $("#desccode").summernote('code', $("#desc").val());

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
	

