
	<div class="container-fluid ajaxForm">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Card-->
				<div class="card card-custom gutter-b example example-compact">
					<!--<div class="card-header">
						<h3 class="card-title"></h3>
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
					</div>-->
					<!--begin::Form-->
					<form class="form" action="{{ url()->current() }}" name="form" id="form" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>{{__("user.name")}}</label>
										<input type="text" id="name" name="name" class="form-control form-control-solid" placeholder="{{__("user.Entername")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>{{__("user.email")}}</label>
										<input type="text" id="email" name="email" class="form-control form-control-solid" placeholder="{{__("user.Enteremail")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{{__("user.password")}}</label>
										<input type="password" id="password" name="password" class="form-control form-control-solid" placeholder="{{__("user.Enterpassword")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{{__("user.passwordConfirm")}}</label>
										<input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-solid" placeholder="{{__("user.Enterpassword")}}" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label></label>
										<div class="checkbox-list">
											<input type="checkbox" style="margin-top: 8px;" class="form-check-input" name="active" id="active">
											<label style="font-size: 18px;">{{ __('user.active') }}</label>
										</div>
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
							<button type="reset" id="btnReset" class="btn btn-secondary">{{__('comn.cancel')}}</button>
							<!--<a href="{{ route('user-view') }}" id="btnBack" class="btn btn-secondary">Back</a>
                            -->
						</div>
					</form>
					<!--end::Form-->
				</div>
				<!--end::Card-->
				<!--begin::Card-->
																										
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    PageLoadActions();
</script>
