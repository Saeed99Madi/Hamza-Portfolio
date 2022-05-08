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
						<h3 class="card-title" style="font-weight:bold;">{{__('art.info')}}</h3>
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
						<div class="card-body">
                        <div class="row">
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("art.title")}}</label>
										<input type="text" id="title" name="title" value="" class="form-control form-control-solid" placeholder="{{__("art.enter").' '.__("art.title")}}" autocomplete="off">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("art.subtitle")}}</label>
										<input type="text" id="subtitle" name="subtitle" value="" class="form-control form-control-solid" placeholder="{{__("art.enter").' '.__("art.subtitle")}}" autocomplete="off">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label>{{__("art.desccode")}}</label>
										<textarea class="form-control summernote" id="desccode" name="desccode" rows="3"></textarea>
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("art.date")}}</label>
										<input type="text" id="date" name="date" value="" class="form-control form-control-solid date" placeholder="{{__("art.enter").' '.__("art.date")}}" autocomplete="off">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("art.catid")}}</label>
                                        <select id="catid" name="catid" class="form-control">
                                            <option value="">إختر من القائمة</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{$cat->id}}"> {{ $cat->title }}</option>
                                            @endforeach
                                        </select>
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("art.file")}}</label>
                                        <input type="file" id="file" name="file">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>

                                <div class="col-md-12">
									<div class="form-group">
										<label style="clear: both; margin-top: 15px; margin-bottom: 15px; display: block;">
                                        </label>
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" name="active" type="checkbox" data-kt-check="true" data-kt-check-target="#kt-datatable .form-check-input" value="1" />
                                            <span style="font-weight: bold; margin-right: 10px;">
                                            {{__("art.active")}}
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
                var SummernoteDemo={init:function(){$(".summernote").summernote({height:350})}};jQuery(document).ready(function(){SummernoteDemo.init()});

            });
            myApp.controller('PageController', function ($scope, $http, $rootScope) {
                $scope.init = function () {
                }
                $scope.Apply = function () {
                    $scope.$apply();
                }
            });
    </script>
@endsection
	

