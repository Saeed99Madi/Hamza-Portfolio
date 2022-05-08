@extends('layouts.ClientPanel')


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
										<a href="#server-side"></a>المستفيدين</h1>
                                        <div class="d-flex justify-content-end" style="width: 50%;" data-kt-docs-table-toolbar="base">
											<a class="btn btn-primary PopUp" href="{{ route('client.beneficiary.create') }}" title="إضافة مستفيد جديد">
                                            <span class="svg-icon svg-icon-2">
                                                {!!__("icon.add")!!}
														
											</span>
											إضافة مستفيد جديد</a>

										</div>
                                    </div>
                                    <div class="p-0 row" style="margin-top:20px;">
										<!--begin::Heading-->
									
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="identity" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                رقم الهوية
                                                </label>
											    <input type="text" id="identity" class="form-control" placeholder="رقم الهوية" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="name" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                الإسم
                                                </label>
											    <input type="text" id="name" class="form-control" placeholder="الإسم" autocomplete="off" />
											</div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="donor" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                الممول
                                                </label>
											    <input type="text" id="donor" class="form-control" placeholder="الممول" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="institute" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                المؤوسسة
                                                </label>
											    <input type="text" id="institute" class="form-control" placeholder="المؤوسسة" />
											</div>
                                        </div>

                                     </div>
                                            
                                     <div class="row" style="margin-top:20px;">
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="project" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                المشروع
                                                </label>
											    <input type="text" id="project" class="form-control" placeholder="المشروع" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="project_type" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                نوع المشروع
                                                </label>
											    <input type="text" id="project_type" class="form-control typeahead" placeholder="نوع المشروع" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="date_from" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                تاريخ الإستفادة من
                                                </label>
											    <input type="text" id="date_from" class="form-control date" placeholder="تاريخ الإستفادة" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="date_to" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                تاريخ الإستفادة الى
                                                </label>
											    <input type="text" id="date_to" class="form-control date" placeholder="تاريخ الإستفادة" />
											</div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="book" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                إسم الكشف
                                                </label>
											    <input type="text" id="book" class="form-control" placeholder="إسم الكشف" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="city" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                المنطقة
                                                </label>
											    <input type="text" id="city" class="form-control" placeholder="المنطقة" />
											</div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="p_project_type" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                لم يستفيد من نوع مشروع
                                                </label>
											    <input type="text" id="p_project_type" class="form-control" placeholder="" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label for="p_project" style="margin-bottom: 10px; color: #181c32; font-weight: bold;">
                                                لم يستفيد من مشروع
                                                </label>
											    <input type="text" id="p_project" class="form-control" placeholder="" />
											</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                
                                                <label for="p_date" style="margin-bottom: 10px; width: 100%; color: #181c32; font-weight: bold;">
                                                خلال سنة
                                                <div style="float: left;" class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" id="ch_date">
                                                </div>
                                                </label>
											    <input type="text" id="p_date" class="form-control date" placeholder="" />
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
                                    </div>
                                    </div class="row">
                                    <div class="row">
                                        <div class="" style="width: 100%;" data-kt-docs-table-toolbar="base">
											<button style="float:left; margin-left:30px;" class="btn btn-success" id="export" ng-click="exportFun()" title="تصدير بيانات">
                                            <span class="svg-icon svg-icon-2">
                                                {!!__("icon.add")!!}
														
											</span>
											تصدير بيانات</button>

										</div>
                                    </div>
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
														    <th style="padding-right: 10px;">الإسم</th>
                                                            <th style="padding-right: 10px;">رقم الهوية</th>
                                                            <th style="padding-right: 10px;">المدينة</th>
                                                            <th style="padding-right: 10px;">المشروع</th>
														    <th>تاريخ الإدخال</th>
                                                            <th style="padding-right: 10px;">تاريخ الإستفادة</th>  
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

	<!--
	<script src="{{ asset('assets/js/custom/documentation/documentation.js') }}"></script>
	 <script src="{{ asset('assets/js/custom/documentation/general/datatables/server-side.js') }}"></script>
	-->
    
	<script>
    $('#project_type').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=project_type'
    });
    $('#project').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=project'
    });
    $('#name').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=name'
    });
    $('#donor').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=donor'
    });
    $('#institute').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=institute'
    });
    $('#book').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=book'
    });
    $('#city').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=city'
    });
    $('#p_project').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=project'
    });
    $('#p_project_type').typeahead({
        ajax: '{{route('client.beneficiary.view.typeahead')}}?parm=project_type'
    });
    /*$('.typeahead').typeahead({
        source: [
            { id: 1, full_name: 'محمد علي', first_two_letters: 'To' },
            { id: 2, full_name: 'Montreal', first_two_letters: 'Mo' },
            { id: 3, full_name: 'New York', first_two_letters: 'Ne' },
            { id: 4, full_name: 'Buffalo', first_two_letters: 'Bu' },
            { id: 5, full_name: 'Boston', first_two_letters: 'Bo' },
            { id: 6, full_name: 'Columbus', first_two_letters: 'Co' },
            { id: 7, full_name: 'Dallas', first_two_letters: 'Da' },
            { id: 8, full_name: 'Vancouver', first_two_letters: 'Va' },
            { id: 9, full_name: 'Seattle', first_two_letters: 'Se' },
            { id: 10, full_name: 'Los Angeles', first_two_letters: 'Lo' }
        ],
        displayField: 'full_name'
    });*/

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
             identity: document.getElementById("identity").value,
            name: document.getElementById("name").value,
            donor: document.getElementById("donor").value,
            institute: document.getElementById("institute").value,
            project: document.getElementById("project").value,
            project_type: document.getElementById("project_type").value,
            date_from: document.getElementById("date_from").value,
            date_to: document.getElementById("date_to").value,
            book: document.getElementById("book").value,
            ch_date: $("#ch_date").prop("checked") ? 1 : 0,
            p_project_type: document.getElementById("p_project_type").value,
            p_project: document.getElementById("p_project").value,
            p_date: document.getElementById("p_date").value,
            city: document.getElementById("city").value,

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
                    url: "{{ route('beneficiary.view.ajax') }}"
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
                    data: "identity"
                },
                {
                    data: "city"
                },
				{
                    data: "project"
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
                    'data': 'date' ,
                    "type": "date",
                    "render": function (value) {
                        if (value === null) return "";
                        return window.moment(value).format('MM/DD/YYYY');
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
                    targets: 7,
                    data: null,
                    orderable: !1,
                    className: "text-end",
                    render: function (e, t, n) {
                        
                        var x = '\
                                <div class="d-flex justify-content-end flex-shrink-0">\
									<a href="{{ route("client.beneficiary.edit") }}/'+n.id+'" class="btn PopUp btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank" title="تعديل بيانات مستفيد '+n.name+'">\
										<span class="svg-icon svg-icon-3">\
											{!!__("icon.permmision")!!}\
										</span>\
									</a>\
									</div>\
                                    ';
                        return x;
                    }
                },
				/*{
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
				}*/
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

    var identity = $('#identity').val();
                var name = $('#name').val();
                var donor = $('#donor').val();
                var institute = $('#institute').val();
                var project = $('#project').val();
                var project_type = $("#project_type").val();
                var date_from = $("#date_from").val();
                var date_to = $("#date_to").val();
                var book = $("#book").val();

                var p_project_type = $("#p_project_type").val();
                var p_project = $("#p_project").val();
                var p_date = $("#p_date").val();

                if (book == "" && name == "" && donor == "" && institute == "" && project == "" && project_type == '' && date_from == '' && date_to == ''
                && p_project_type == "" && p_project == "" && p_date == "") {
                    Swal.fire('خطأ...', 'الرجاء ادخال حقل واحد على الاقل!', 'warning');
                    return false;
                }

			//Swal.fire("إنتظر", "أدخل حقل واحد على الأقل ", "warning");

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
            $scope.exportFun = function(){
                var identity = $('#identity').val();
                var name = $('#name').val();
                var donor = $('#donor').val();
                var institute = $('#institute').val();
                var project = $('#project').val();
                var project_type = $("#project_type").val();
                var date_from = $("#date_from").val();
                var date_to = $("#date_to").val();
                var book = $("#book").val();

                var p_project_type = $("#p_project_type").val();
                var p_project = $("#p_project").val();
                var p_date = $("#p_date").val();

                if (book == "" && name == "" && donor == "" && institute == "" && project == "" && project_type == '' && date_from == '' && date_to == ''
                && p_project_type == "" && p_project == "" && p_date == "") {
                    Swal.fire('خطأ...', 'الرجاء ادخال حقل واحد على الاقل!', 'warning');
                    return false;
                }
                var link = "/client/beneficiary/export?identity=" + $("#identity").val()
                + "&name=" + $("#name").val()
                + "&donor=" + $("#donor").val()
                + "&institute=" + $("#institute").val()
                + "&project=" + $("#project").val()
                + "&project_type=" + $("#project_type").val()
                + "&date_from=" + $("#date_from").val()
                + "&date_to=" + $("#date_to").val()
                + "&book=" + $("#book").val()
                + "&p_project_type=" + $("#p_project_type").val()
                + "&p_project=" + $("#p_project").val()
                + "&p_date=" + $("#p_date").val()
                + "&city=" + $("#city").val()
                window.open(link,'_blank');
            }
 });
 
 
	</script>
@endsection
