@extends('layouts.panel')


@section('css')


@endsection


@section('content')
	<form class="docs-content d-flex flex-column flex-column-fluid ViewController" id="kt_docs_content" name="ViewController" id="ViewController" method="post" ng-controller="ViewController">
    						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />

    <!--begin::Container-->
						<div class="container" id="kt_docs_content_container">
							<!--begin::Card-->
							<div class="card mb-2">
								<!--begin::Card Body-->
								<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
									<!--begin::Section-->
                                    <div class="row p-0">
                                        <h1 class="anchor fw-bolder mb-5" style="width: 50%;" id="server-side">
										<a href="#server-side"></a>المقالات</h1>
                                        <div class="d-flex justify-content-end" style="width: 50%;" data-kt-docs-table-toolbar="base">
											<a class="btn btn-primary" target="_blank" href="{{ route('admin.article.add') }}" title="إضافة جديد">
                                            <span class="svg-icon svg-icon-2">
                                                {!!__("icon.add")!!}
														
											</span>
											إضافة جديد</a>
										</div>
                                    </div>
                                     <div class="row" style="margin-top:20px;">
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="date_from" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                بحث
                                                </label>
											    <input type="text" id="q" class="form-control" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="date_from" style="margin-bottom: 10px; color: #181c32; font-weight: bold; width: 100%;">
                                                تاريخ من
                                                <div style="float: left;" class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" id="ch_date">
                                                </div>
                                                </label>
											    <input type="text" id="date_from" class="form-control date" placeholder="تاريخ من" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="date_to" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                تاريخ الى
                                                </label>
											    <input type="text" id="date_to" class="form-control date" placeholder="تاريخ الى" />
											</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex align-items-center position-relative my-5" style="margin-top:-15px;">
                                            <button type="button" id="btnSearch" class="btn btn-warning">

                                                <span class="svg-icon svg-icon-2">
                                                    {!!__("icon.search")!!}
														
											    </span>
											    {{__('user.Search')}}</button>
                                        </div>
                                        <div>
                                            <button type="button" id="btnActive" ng-click="btnActiveFun(1)" class="btn btn-light-primary me-3">
											{{__('user.btnactive')}}</button>
                                            <button type="button" id="btnInActive" ng-click="btnActiveFun(0)" class="btn btn-light-danger me-3">
											{{__('user.btninActive')}}</button>
                                        </div>
                                    </div>
                                    </div class="row">
                                    
                                    <div class="tbl_content" style="padding:40px;">
											    <!--end::Wrapper-->
											    <!--begin::Datatable-->
											    <table id="kt-datatable" class="table align-middle table-row-dashed fs-6 gy-5">
												    <thead>
													    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
														    <th class="" width="5%">
															    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt-datatable .form-check-input" value="1" />
															    </div>
														    </th>
														    <th style="padding-right: 10px;" width="50%">العنوان</th>
                                                            <th style="padding-right: 10px;">الحالة</th>
														    <th>تاريخ الإدخال</th>
														    <th class="text-end min-w-100px">{{__('user.Actions')}}</th>
													    </tr>
												    </thead>
												    <tbody class="text-gray-600 fw-bold"></tbody>
											    </table>
                                            </div>
									<!--end::Section-->
								</div>
								</div>
                                
								<!--end::Card Body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Container-->
					</form>

    
@endsection

@section('js')
	
	<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
	<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

	<script>
    var data;
    var ajax;
    function buildSearchData(){
        var len = 10;
        var sort_by;
        var $sort_type;
        if($("[name=kt-datatable_length]").val() != null){
            len = $("[name=kt-datatable_length]").val();

            sort_by =  $('#kt-datatable').DataTable().settings().init().aoColumns[
                $('#kt-datatable').DataTable().order()[0][0]
            ]['data'];
            
            sort_type = $('#kt-datatable').DataTable().order()[0][1];
        }
        
         var obj = {
             //d: document.getElementById("search").value,
             q: document.getElementById("q").value,
             ch_date: $("#ch_date").prop("checked") ? 1 : 0,
            date_from: document.getElementById("date_from").value,
            date_to: document.getElementById("date_to").value,

             _token: $("[name=_token]").val(),
             length: len,
             sort_by: sort_by,
             sort_type: sort_type

        };
        return obj;
    }

    var table;
	"use strict";
var KTDatatablesServerSide = function () {
    var e, t = function () {
        document.querySelector("#kt-datatable").querySelectorAll('[type="checkbox"]').forEach((e => {
            e.addEventListener("click", (function () {
                setTimeout((function () {
                    //n()
                }), 50)
            }))
        }))
    },
        table = function () {
            const e = document.querySelector("#kt-datatable"),
                t = document.querySelector('[data-kt-docs-table-toolbar="base"]'),
                table = document.querySelector('[data-kt-docs-table-toolbar="selected"]'),
                a = document.querySelector('[data-kt-docs-table-select="selected_count"]'),
                r = e.querySelectorAll('tbody [type="checkbox"]');
            let s = !1,
                o = 0;
            r.forEach((e => {
                e.checked && (s = !0, o++)
            })), s ? (a.innerHTML = o, t.classList.add("d-none"), table.classList.remove("d-none")) : (t.classList.remove("d-none"), table.classList.add("d-none"))
        };
    return {
        reload: function () {
            $('#kt-datatable').DataTable().ajax = ajax;
            $('#kt-datatable').DataTable().ajax.reload();
            $("#kt-datatable .form-check-input").prop("checked", '');
        },
        init: function () {
            e = $("#kt-datatable").DataTable({
                responsive: !0,
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                order: [
                    [1, "desc"]
                ],
                stateSave: !0,
                select: {
                    style: "os",
                    selector: "td:first-child",
                    className: "row-selected"
                },
                ajax: {
                    url: "{{ route('admin.article.index.ajax') }}"
		            , data: buildSearchData
	            },
                columns: [
				{
                    data: "id"
                },
                {
                    data: "title"
                },
                {
                    data: "active"
                },
                {
                    'data': 'created_at' ,
                    "type": "date",
                    "render": function (value) {
                        if (value === null) return "";
                        return window.moment(value).format('MM/DD/YYYY HH:mm');
                    }
                },
				{
                    data: null
                }
				],
                columnDefs: [
				{
                    targets: 0,
                    orderable: !1,
                    render: function (e, t, n) {
                        return `\n                            <div class="form-check form-check-sm form-check-custom form-check-solid">\n                                <input class="form-check-input" type="checkbox" value="${e}" />\n                            </div>`
                    }
                },
                {
                    targets: 2,
                    data: null,
                    orderable: !1,
                    className: "text-end",
                    render: function(e, t, n) {
						if(n.active == 1)
							return '<div class="badge badge-light-success fw-bolder">Enabled</div>'
						else
							return '<div class="badge badge-light-danger fw-bolder">Disable</div>'
					}
				},
				{
                    targets: 4,
                    data: null,
                    orderable: !1,
                    className: "text-end",
                    render: function (e, t, n) {
                        
                        var x = '\
                                <div class="d-flex justify-content-end flex-shrink-0">\
									<a target="_blank" href="{{ route("admin.article.edit") }}/'+n.id+'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank" title="تعديل بيانات مقال '+n.title+'">\
										<span class="svg-icon svg-icon-3">\
											{!!__("icon.permmision")!!}\
										</span>\
									</a>\
									</div>\
                                    ';
                        return x;
                    }
                }
                ]
            })
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTDatatablesServerSide.init()
}));
$("#btnSearch").click(function(){

    var q = $('#q').val();
                var name = $('#name').val();
                //var date_from = $("#date_from").val();
                //var date_to = $("#date_to").val();
                
                /*if (book == "" && name == "" && donor == "" && institute == "" && project == "" && project_type == '' && date_from == '' && date_to == ''
                && p_project_type == "" && p_project == "" && p_date == "") {
                    Swal.fire('خطأ...', 'الرجاء ادخال حقل واحد على الاقل!', 'warning');
                    return false;
                }
                */

	KTDatatablesServerSide.reload();
});

myApp.controller('ViewController', function ($scope, $http, $rootScope) {
            $scope.init = function () {
            }
            $scope.Apply = function () {
                $scope.$apply();
            }
            $scope.btnActiveFun = function($active){
                var arr = [];
                $(".dtr-control input.form-check-input:checked").each(function()
                {
                    arr.push($(this).val())
                });
                if(arr.length > 0){
                    $http({
                    method: 'POST',
                    data: {
                        _token: $("[name=_token]").val(),
                        data: arr,
                        active: $active
                    },
                    url: '{{ route("art-active") }}'
                    }).then(function successCallback(json) {
                        //console.log(json.data);
                        ShowMessage(json.data.msg);
                        KTDatatablesServerSide.reload();
                    }, function errorCallback(json) {
                    });
                }
                else{
        
                }
                
            }
 });
 
 
	</script>
@endsection
