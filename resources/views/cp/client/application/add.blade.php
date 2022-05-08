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
						<h3 class="card-title" style="font-weight:bold;">{{__('appadd.appinfo')}}</h3>
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
										<label>{{__("appadd.name")}}</label>
										<input type="text" id="name" name="name" value="{{$prof?$prof->name:''}}" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.name")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>-->
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert">
                                            <strong class="error_text"></strong>
                                        </span>
                                    </div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.study")}}</label>
										<input type="text" id="study" name="study" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.study")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.dob")}}</label>
										<input type="text" id="dob" name="dob" value="" class="form-control date form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.dob")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.mobile")}}</label>
										<input type="text" id="mobile" name="mobile" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.mobile")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.identity")}}</label>
										<input type="text" id="identity" name="identity" value="{{$prof?$prof->identity:''}}" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.identity")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.tell")}}</label>
										<input type="text" id="tell" name="tell" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.tell")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.address")}}</label>
										<input type="text" id="address" name="address" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.address")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.family_num")}}</label>
										<input type="text" id="family_num" name="family_num" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.family_num")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("appadd.income_1")}}</label>
										<input type="text" id="income_1" name="income_1" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.income_1")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("appadd.income_1")}}</label>
										<input type="text" id="income_2" name="income_2" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.income_1")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("appadd.income_1")}}</label>
										<input type="text" id="income_3" name="income_3" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.income_1")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.job_now")}}</label>
										<input type="text" id="job_now" name="job_now" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.job_now")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.income_monthly")}}</label>
										<input type="text" id="income_monthly" name="income_monthly" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.income_monthly")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.job_prev")}}</label>
										<input type="text" id="job_prev" name="job_prev" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.job_prev")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.craft")}}</label>
										<input type="text" id="craft" name="craft" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.craft")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.years_without_job")}}</label>
										<input type="text" id="years_without_job" name="years_without_job" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.years_without_job")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.partner_job")}}</label>
										<input type="text" id="partner_job" name="partner_job" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.partner_job")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="separator separator-dashed border-dark my-10" style="margin-bottom: 0rem!important;"></div>

                                <div class="card-header" style="margin-bottom: 15px;">
						            <h3 class="card-title" style="font-weight:bold;">{{__('appadd.projectinfo')}}</h3>
						            <div class="card-toolbar">
							            <div class="example-tools justify-content-c">
								            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
								            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
							            </div>
						            </div>
					            </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.project_title")}}</label>
										<input type="text" id="project_title" name="project_title" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_title")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.project_place")}}</label>
										<input type="text" id="project_place" name="project_place" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_place")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label style="clear: both; margin-top:15px; margin-bottom:15px; display: block;">{{__("appadd.project_type")}}</label>
										<!--<input type="text" id="project_type" name="project_type" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_type")}}" autocomplete="off">
                                        -->
                                        <label style="margin-right:0px;" class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" id="project_type" name="project_type" type="radio" value="1"/>
                                            <span class="form-check-label">
                                                 تجاري
                                            </span>
                                        </label>
                                        <label class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" id="project_type" name="project_type" type="radio" value="2"/>
                                            <span class="form-check-label">
                                                 صناعي
                                            </span>
                                        </label>
                                        <label class="form-check form-check-custom form-check-solid">
                                            
                                            <input class="form-check-input" id="project_type" name="project_type" type="radio" value="3"/>
                                            <span class="form-check-label">
                                                 زراعي
                                            </span>
                                        </label>
                                        <label class="form-check form-check-custom form-check-solid">
                                            
                                            <input class="form-check-input" id="project_type" name="project_type" type="radio" value="4"/>
                                            <span class="form-check-label">
                                                 خدماتي
                                            </span>
                                        </label>
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                
                                <div class="col-md-12">
									<div class="form-group">
										<label>{{__("appadd.project_desc")}}</label>
                                        <textarea class="form-control" id="project_desc" name="project_desc" rows="3"></textarea>
                                        <!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label>{{__("appadd.project_req")}}</label>
                                        <textarea class="form-control" id="project_req" name="project_req" rows="3"></textarea>
                                        <!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label>{{__("appadd.project_beneficiary")}}</label>
                                        <textarea class="form-control" id="project_beneficiary" name="project_beneficiary" rows="3"></textarea>

                                        <!--<input type="text" id="project_beneficiary" name="project_beneficiary" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_beneficiary")}}" autocomplete="off">-->
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.project_cost")}}</label>
										<input type="number" id="project_cost" name="project_cost" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_cost")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.project_finance")}}</label>
										<input type="number" id="project_finance" name="project_finance" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_finance")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.project_income_monthly_expected")}}</label>
										<input type="number" id="project_income_monthly_expected" name="project_income_monthly_expected" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_income_monthly_expected")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.project_pay")}}</label>
										<input type="number" id="project_pay" name="project_pay" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_pay")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.expected_period_for_total_cost")}}</label>	
										<input type="number" id="expected_period_for_total_cost" name="expected_period_for_total_cost" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.expected_period_for_total_cost")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.project_similar")}}</label>
										<input type="number" id="project_similar" name="project_similar" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_similar")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-group">
										<label style="clear: both; margin-top: 15px; margin-bottom: 15px; display: block;">{{__("appadd.project_administrator")}}</label>
										<!--<input type="text" id="project_administrator" name="project_administrator" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.project_administrator")}}" autocomplete="off">-->
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value="1" id="project_administrator" name="project_administrator"  checked="checked" />
                                            <label class="form-check-label" for="flexRadioChecked">
                                                بنفسك
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid">
                                            
                                            <input class="form-check-input" type="radio" value="2" id="project_administrator" name="project_administrator" />
                                            <label class="form-check-label" for="flexRadioChecked">
                                                أخرين
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid">
                                            
                                            <input class="form-check-input" type="radio" value="3" id="project_administrator" name="project_administrator"  />
                                            <label class="form-check-label" for="flexRadioChecked">
                                                بمشاركة مع أخرين
                                            </label>
                                        </div>
                                        <!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-12" ng-show="show_fun() == true">
									<div class="form-group">
										<label>{{__("appadd.project_administrator_other")}}</label>
                                        <textarea class="form-control" id="project_administrator_other" name="project_administrator_other" rows="3"></textarea>
                                        <!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="separator separator-dashed border-dark my-10" style="margin-bottom: 0rem!important;"></div>

                                <div class="card-header" style="margin-bottom: 15px;">
						            <h3 class="card-title" style="font-weight:bold;">{{__('appadd.kafel1')}}</h3>
						            <div class="card-toolbar">
							            <div class="example-tools justify-content-c">
								            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
								            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
							            </div>
						            </div>
					            </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_name")}}</label>
										<input type="text" id="kafel1_name" name="kafel1_name" value="{{$prof?$prof->first_kafel_name:''}}" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_name")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_identity")}}</label>
										<input type="text" id="kafel1_identity" name="kafel1_identity" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_identity")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_address")}}</label>
										<input type="text" id="kafel1_address" name="kafel1_address" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_address")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_tell")}}</label>
										<input type="text" id="kafel1_tell" name="kafel1_tell" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_tell")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_salary")}}</label>
										<input type="number" id="kafel1_salary" name="kafel1_salary" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_salary")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_account")}}</label>
										<input type="number" id="kafel1_account" name="kafel1_account" value="{{$prof?$prof->first_kafel_account:''}}" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_account")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_job_place")}}</label>
										<input type="text" id="kafel1_job_place" name="kafel1_job_place" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_job_place")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel1_bank")}}</label>
										<input type="text" id="kafel1_bank" name="kafel1_bank" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel1_bank")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>


                                <div class="separator separator-dashed border-dark my-10" style="margin-bottom: 0rem!important;"></div>

                                <div class="card-header" style="margin-bottom: 15px;">
						            <h3 class="card-title" style="font-weight:bold;">{{__('appadd.kafel2')}}</h3>
						            <div class="card-toolbar">
							            <div class="example-tools justify-content-c">
								            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
								            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
							            </div>
						            </div>
					            </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_name")}}</label>
										<input type="text" id="kafel2_name" name="kafel2_name" value="{{$prof?$prof->second_kafel_name:''}}" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_name")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_identity")}}</label>
										<input type="text" id="kafel2_identity" name="kafel2_identity" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_identity")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_address")}}</label>
										<input type="text" id="kafel2_address" name="kafel2_address" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_address")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_tell")}}</label>
										<input type="text" id="kafel2_tell" name="kafel2_tell" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_tell")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_salary")}}</label>
										<input type="number" id="kafel2_salary" name="kafel2_salary" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_salary")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_account")}}</label>
										<input type="number" id="kafel2_account" name="kafel2_account" value="{{$prof?$prof->second_kafel_account:''}}" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_account")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_job_place")}}</label>
										<input type="text" id="kafel2_job_place" name="kafel2_job_place" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_job_place")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("appadd.kafel2_bank")}}</label>
										<input type="text" id="kafel2_bank" name="kafel2_bank" value="" class="form-control form-control-solid" placeholder="{{__("appadd.enter").' '.__("appadd.kafel2_bank")}}" autocomplete="off">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>

                                <div class="separator separator-dashed border-dark my-10" style="margin-bottom: 0rem!important;"></div>

                                <div class="card-header" style="margin-bottom: 15px;">
						            <h3 class="card-title" style="font-weight:bold;">{{__('appadd.documents')}}</h3>
						            <div class="card-toolbar">
							            <div class="example-tools justify-content-c">
								            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
								            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
							            </div>
						            </div>
					            </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("appadd.img_identity")}}</label>
                                        <input type="file" id="img_identity" name="img_identity[]">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("appadd.img_salary")}}</label>
                                        <input type="file" id="img_salary" name="img_salary[]">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("appadd.img_kafel_identity")}}</label>
                                        <input type="file" id="img_kafel_identity" name="img_kafel_identity[]">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("appadd.img_kafel_salary")}}</label>
                                        <input type="file" id="img_kafel_salary" name="img_kafel_salary[]">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label style="clear: both; display: block;">{{__("appadd.img_finance")}}</label>
                                        <input type="file" id="img_finance" name="img_finance[]">
										<!--<span class="form-text text-muted"></span>--><span class="fv-plugins-message-container invalid-feedback" role="alert"><strong class="error_text"></strong></span>
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
                $scope.show_fun = function(){
                    if($("#project_administrator:checked").val() == 2){
                        return true;
                    }
                    else {
                        return false;
                    }

                }
            });
    </script>
@endsection
	

