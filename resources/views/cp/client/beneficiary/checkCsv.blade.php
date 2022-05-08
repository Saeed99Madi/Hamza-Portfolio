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
    
    <div class="container-fluid" ng-controller="PageController" id="PageController" name="PageController">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <h4 class="alert-heading">ملاحظات استيراد كشف</h4>
                            <p>1-  يجب ان يكون ملف  Excel بتنسيق xlsx. </p>
                            <p>2-  يجب ان تكون البيانات في أول ورقة عمل</p>
                            <p>3-  يجب ان تكون البيانات بنفس ترتيب النموذج</p>
                            <p>4-   يمكنك تحميل النموذج من <a href="{{route('client.beneficiary.upload.download3')}}" target="_blank"><b><u>هنا</u></b> </a></p>
                        </div>
            </div>
        </div>
        <div style="margin-top:20px;">
        </div>
		<div class="row">
        
			<div class="col-lg-12">
				<div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
						<h3 class="card-title" style="font-weight:bold;">فحص كشف المستفيدين</h3>
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
								<span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
								<span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
							</div>
						</div>
					</div>
					<form class="ajaxForm1" action="{{ route('client.beneficiary.postCheckCsv') }}" method="post" enctype="multipart/form-data">
                        <div class="alert_msg">
                            @include("_msg")
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="card-body">
                        <div class="row">
                                <div class="col-md-6">
									<div class="form-group">
										<label>إختر الملف</label>
										<input type="file" id="file" name="file">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>فلتر البحث</label>
										<select class="form-control" name="filter">
                                            <option value="1">رقم الهوية</option>
                                            <option value="2">الشريك</option>
                                        </select>
									</div>
								</div>
                                
							</div>
                            <div class="row" style="margin-top:40px;">
                                <div class="col-md-6">
                                            <div class="">
                                                <label for="project" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                المشروع
                                                </label>
											    <input type="text" id="project" class="form-control" placeholder="المشروع" autocomplete="off" ng-keydown="$event.keyCode === 13 &amp;&amp; proFun()" />
											</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <label for="project_type" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                نوع المشروع
                                                </label>
											    <input type="text" id="project_type" class="form-control typeahead" placeholder="نوع المشروع" autocomplete="off" ng-keydown="$event.keyCode === 13 &amp;&amp; typeFun()" />
											</div>
                                        </div>
                                        <div class="col-md-6">
                                         <table id="" ng-show="pro.length > 0" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-inline table table-hover table-striped autohide">
                                            <thead>
                                                <tr>
                                                    <th width="70%" style="text-align: center;">
                                                        المشروع
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="r in pro | filter:searchText track by $index">
                                                    <td style="text-align: right; padding-right: 40px;">
                                                        <% r.txt %>
                                                        <input type="hidden" name="project[]" value="<% r.txt %>">
                                                    </td>
                                                    <td>
                                                <button type="button" title="تعديل" class="btn btn-default btn-md" ng-click="btnEditPro(r)">
                                                    <i class='fa fa-edit'></i>
                                                </button>
                                                <a ng-click="btnDeletePro(r)" class='btn btn-default btn-md'><i class='fa fa-trash'></i></a>
                                            </td>
                                                </tr>
                                            </tbody>
                                           </table>
                                        </div>
                                        <div class="col-md-6">
                                         <table id="" ng-show="type.length > 0" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-inline table table-hover table-striped autohide">
                                            <thead>
                                                <tr>
                                                    <th width="70%" style="text-align: center;">
                                                        نوع المشروع
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="r in type | filter:searchText track by $index">
                                                    <td style="text-align: right; padding-right: 40px;">
                                                        <% r.txt %>
                                                        <input type="hidden" name="type[]" value="<% r.txt %>">
                                                    </td>
                                                    <td>
                                                <button type="button" title="تعديل" class="btn btn-default btn-md" ng-click="btnEditType(r)">
                                                    <i class='fa fa-edit'></i>
                                                </button>
                                                <a ng-click="btnDeleteType(r)" class='btn btn-default btn-md'><i class='fa fa-trash'></i></a>
                                            </td>
                                                </tr>
                                            </tbody>
                                           </table>
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
    $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    if (document.activeElement.id != "btnSubmit") {
                        event.preventDefault();
                        return false;
                    }
                }
            });
            $('#project_type').typeahead({
                ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=project_type'
            });
            $('#project').typeahead({
                ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=project'
            });
            $(".form-check-input").change(function(){
                //angular.element('#PageController').scope().Apply();
            });
            myApp.controller('PageController', function ($scope, $http, $rootScope) {
                $scope.init = function () {
                }
                $scope.Apply = function () {
                    $scope.$apply();
                }
                $scope.type = [];
                $scope.EditIndexType = -1;
                $scope.typeFun = function(){
                    var type = $("#project_type").val();
                    if(type != ''){
                        if ($scope.EditIndexType == -1) {
                        $scope.type.push({
                            txt: type
                        });
                        }
                        else{
                             $scope.type[$scope.EditIndexType].txt = $("#project_type").val();
                        }
                    }
                    $("#project_type").val('');
                }
                $scope.btnEditType = function (r) {
                    $scope.EditIndexType = $scope.type.indexOf(r);
                    $("#project_type").val(r.txt);
                }
                $scope.btnDeleteType = function (item) {
                    var index = $scope.type.indexOf(item);
                    $scope.type.splice(index, 1);
                    $scope.EditIndexType = -1;
                    $('#project_type').val('');
                }



                $scope.pro = [];
                $scope.EditIndexPro = -1;
                $scope.proFun = function(){
                    var pro = $("#project").val();
                    if(pro != ''){
                        if ($scope.EditIndexPro == -1) {
                        $scope.pro.push({
                            txt: pro
                        });
                        }
                        else{
                             $scope.pro[$scope.EditIndexPro].txt = $("#project").val();
                        }
                    }
                    $("#project").val('');
                }
                $scope.btnEditPro = function (r) {
                    $scope.EditIndexPro = $scope.pro.indexOf(r);
                    $("#project").val(r.txt);
                }
                $scope.btnDeletePro = function (item) {
                    var index = $scope.pro.indexOf(item);
                    $scope.pro.splice(index, 1);
                    $scope.EditIndexPro = -1;
                    $('#project').val('');
                }
            });
    </script>
@endsection
	

