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
									<div class="p-0">
										<!--begin::Heading-->
										<h1 class="anchor fw-bolder mb-5" id="server-side">
										<a href="#server-side"></a>{{__('user.View')}}</h1>
										
										<div class="py-5">
											<div class="d-flex flex-stack mb-5">
												<div class="d-flex align-items-center position-relative my-1">
													<span class="svg-icon svg-icon-1 position-absolute ms-6">
														{!!__("icon.search")!!}
													</span>
													<input type="text" id="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{__('user.Search')}}" />

                                                    <select name="active" id="active" class="form-select form-select-solid" style="margin: 10px;">
														<option value="">{{__('user.activeList')}}</option>
														<option value="1">
														{{__('user.active')}}</option>
														<option value="0">
														{{__('user.inActive')}}</option>
													</select>
                                                    
													
													
												
												</div>
                                                
												<div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

													<a class="btn btn-primary PopUp" href="{{ route('user-create') }}" title="إضافة مستخدم">


                                                    <span class="svg-icon svg-icon-2">
                                                        {!!__("icon.add")!!}
														
													</span>
													{{__('user.AddUser')}}</a>

												</div>
											</div>

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
                                            
											<!--end::Datatable-->
										</div>
									</div>
                                    <div class="tbl_content">
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
														    <th>{{__('user.UserName')}}</th>
														    <th>{{__('user.Email')}}</th>
														    <th>{{__('user.Active')}}</th>
														    <th>{{__('user.CreatedDate')}}</th>
														    <th class="text-end min-w-100px">{{__('user.Actions')}}</th>
													    </tr>
												    </thead>
												    <tbody class="text-gray-600 fw-bold"></tbody>
											    </table>
                                            </div>
									<!--end::Section-->
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

	<!--
	<script src="{{ asset('assets/js/custom/documentation/documentation.js') }}"></script>
	 <script src="{{ asset('assets/js/custom/documentation/general/datatables/server-side.js') }}"></script>
	-->
    
	<script>
    var data;
    var ajax;
    function filters(){
        data = {
			d: document.getElementById("search").value,
            active: document.getElementById("active").value,
		};
        ajax = {
            url: "{{ route('user-get-data') }}"
		    , data: data
	    };
    }
    filters();
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
             d: document.getElementById("search").value,
             active: document.getElementById("active").value,
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
           //$('#kt-datatable').DataTable().destroy();
            //KTDatatablesServerSide.init();
            //$(".form-check-input").prop("checked", '');

            filters();
            $('#kt-datatable').DataTable().ajax = ajax;
            $('#kt-datatable').DataTable().ajax.reload();
            $(".form-check-input").prop("checked", '');
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
                    url: "{{ route('user-get-data') }}"
		            , data: buildSearchData
	            },
                columns: [
				{
                    data: "id"
                }, 
				{
                    data: "name"
                }, 
				{
                    data: "email"
                }, 
				{
                    data: "active"
                }, 
				{
                    data: "created_at"
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
                    targets: 5,
                    data: null,
                    orderable: !1,
                    className: "text-end",
                    render: function (e, t, n) {
                        
                        var x = '\
                                <div class="d-flex justify-content-end flex-shrink-0">\
									<a href="{{ route("user-permission") }}/'+n.id+'" class="btn PopUp btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="{{__("user.Permission")}} '+n.name+'">\
										<span class="svg-icon svg-icon-3">\
											{!!__("icon.permmision")!!}\
										</span>\
									</a>\
									<a href="{{ route("user-update") }}/'+n.id+'" class="btn PopUp btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="{{__("user.Edit")}} '+n.name+'">\
										<span class="svg-icon svg-icon-3">\
											{!!__("icon.edit")!!}\
										</span>\
									</a>\
                                    <a href="{{ route("user_role_view") }}/'+n.id+'" class="btn PopUp btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="{{__("user.Roles")}} '+n.name+'">\
										<span class="svg-icon svg-icon-3">\
											{!!__("icon.points")!!}\
										</span>\
									</a>\
									</div>\
                                    ';
                        return x;
                    }
                },
				{
                    targets: 3,
                    data: null,
                    orderable: !1,
                    className: "text-end",
                    render: function(e, t, n) {
						if(n.active == 1)
							return '<div class="badge badge-light-success fw-bolder">Enabled</div>'
						else
							return '<div class="badge badge-light-danger fw-bolder">Disable</div>'
					}
				}
				]
            })
			//, e.$, e.on("draw", (function ()	{
            //    t(), n(), KTMenu.createInstances()
           // })), document.querySelector('[data-kt-docs-table-filter="search"]').addEventListener("keyup", (function (t) {
             //   e.search(t.target.value).draw()
            //})), t()
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTDatatablesServerSide.init()
}));
$("#btnSearch").click(function(){
	KTDatatablesServerSide.reload();
});
$(document).on('click', '.include', function(){
    /*event.preventDefault();
    var link = $(this).attr("href");
    console.log(link + '?date=' + Date());
    angular.element('#IncludeController').scope().link = link + '?date=' + Date();
    angular.element('#IncludeController').scope().$apply();
    $("#IncludeController").modal("show");*/
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
                    url: '{{ route("user-active") }}'
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
