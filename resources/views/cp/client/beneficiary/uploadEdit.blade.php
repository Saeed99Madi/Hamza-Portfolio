@extends('layouts.clientPanel')

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
        .alert-info{
            background-color: #e0ebf9;
    color: black;
    margin: 0;
    width: 100%;
    border-color: #dedef5;
        }
    </style>
@endsection
@section('content')
    
    <div class="container-fluid ajaxForm">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <h4 class="alert-heading">ملاحظات استيراد كشف</h4>
                            <p>1-  يجب ان يكون ملف  Excel بتنسيق xlsx. </p>
                            <p>2-  يجب ان تكون البيانات في أول ورقة عمل</p>
                            <p>3-  يجب ان تكون البيانات بنفس ترتيب النموذج</p>
                            <p>4-   يمكنك تحميل النموذج من <a href="{{route('client.beneficiary.upload.download2')}}" target="_blank"><b><u>هنا</u></b> </a></p>
                        </div>
            </div>
        </div>
		<div class="row">
        <div class="alert_msg">
            @include("_msg")
        </div>
			<div class="col-lg-12">
				<div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
						<h3 class="card-title" style="font-weight:bold;">
                        تعديل بيانات الزوجة
                        </h3>
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
					<form class="form ajaxForm" action="{{ route('client.beneficiary.upload.edit') }}" name="PageController" id="PageController" method="post" ng-controller="PageController" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="card-body">
                        <div class="row">
                                <div class="col-md-4">
									<div class="form-group">
										<label>إختر الملف</label>
										<input type="file" id="file" name="file">
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
            $(".form-check-input").change(function(){
                angular.element('#PageController').scope().Apply();
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
	

