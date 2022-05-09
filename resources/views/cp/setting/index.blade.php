@extends('layouts.panel')

@section('css')
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
                width: 90%;
    margin: auto;
    margin-top: 15px;
    border-radius: 4px;
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
						<h3 class="card-title" style="font-weight:bold;">{{__('setting.title')}}</h3>
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
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
					<form class="form" action="{{ url()->current() }}" id="PageController" ng-controller="PageController" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="card-body">
                        <div class="row">
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.title")}}</label>
										<input type="text" id="title" name="title" value="{{$obj?$obj->title:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.facebook")}}</label>
										<input type="text" id="facebook" name="facebook" value="{{$obj?$obj->facebook:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.twitter")}}</label>
										<input type="text" id="twitter" name="twitter" value="{{$obj?$obj->twitter:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.instagram")}}</label>
										<input type="text" id="instagram" name="instagram" value="{{$obj?$obj->instagram:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.linkedin")}}</label>
										<input type="text" id="linkedin" name="linkedin" value="{{$obj?$obj->linkedin:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.footer1")}}</label>
										<input type="text" id="footer1" name="footer1" value="{{$obj?$obj->footer1:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.footer2")}}</label>
										<input type="text" id="footer2" name="footer2" value="{{$obj?$obj->footer2:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.footer3")}}</label>
										<input type="text" id="footer3" name="footer3" value="{{$obj?$obj->footer3:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("setting.footer4")}}</label>
										<input type="text" id="footer4" name="footer4" value="{{$obj?$obj->footer4:''}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("setting.logo")}}</label>
                                        <input type="file" id="logo" name="logo">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("setting.favicon")}}</label>
                                        <input type="file" id="favicon" name="favicon">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block; margin-bottom: 20px;">{{__("setting.logo")}}</label>
                                        <img style="width: 200px;" src="{{ route("admin.setting.getimg") }}/1?type=1&&date=<%date%>">
                                    </div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block; margin-bottom: 20px;">{{__("setting.favicon")}}</label>
                                        <img style="width: 200px;" src="{{ route("admin.setting.getimg") }}/2?type=2&&date=<%date%>">
                                    </div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("setting.footer")}}</label>
                                        <input type="file" id="footer" name="footer">
										<span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                 <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block; margin-bottom: 20px;">{{__("setting.footer")}}</label>
                                        <img style="width: 200px;" src="{{ route("admin.setting.getimg") }}/3?type=3&&date=<%date%>">
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
	

