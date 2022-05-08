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
						<h3 class="card-title" style="font-weight:bold;">{{__('profile.title')}}</h3>
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
					<form class="form" action="{{ url()->current() }}" name="form" id="form" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="card-body">
                        <div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>{{__("profile.name")}}</label>
										<input type="text" id="name" name="name" value="{{$prof?$prof->name:''}}" class="form-control form-control-solid" placeholder="{{__("profile.Entername")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>{{__("profile.identity")}}</label>
										<input type="text" id="identity" name="identity" value="{{$prof?$prof->identity:''}}" class="form-control form-control-solid" placeholder="{{__("profile.Enteridentity")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>{{__("profile.account")}}</label>
										<input type="text" id="account" name="account" value="{{$prof?$prof->account:''}}" class="form-control form-control-solid" placeholder="{{__("profile.Enteraccount")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("profile.first_kafel_name")}}</label>
										<input type="text" id="first_kafel_name" name="first_kafel_name" value="{{$prof?$prof->first_kafel_name:''}}" class="form-control form-control-solid" placeholder="{{__("profile.Enterfirst_kafel_name")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("profile.first_kafel_account")}}</label>
										<input type="text" id="first_kafel_account" name="first_kafel_account" value="{{$prof?$prof->first_kafel_account:''}}" class="form-control form-control-solid" placeholder="{{__("profile.Enterfirst_kafel_account")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("profile.second_kafel_name")}}</label>
										<input type="text" id="second_kafel_name" name="second_kafel_name" value="{{$prof?$prof->second_kafel_name:''}}" class="form-control form-control-solid" placeholder="{{__("profile.Entersecond_kafel_name")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("profile.second_kafel_account")}}</label>
										<input type="text" id="second_kafel_account" name="second_kafel_account" value="{{$prof?$prof->second_kafel_account:''}}" class="form-control form-control-solid" placeholder="{{__("profile.Entersecond_kafel_account")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
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
    
@endsection
	

