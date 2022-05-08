
	<div class="container-fluid ajaxForm">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Card-->
				<div class="card card-custom gutter-b example example-compact">
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
							<!--<button type="reset" id="btnReset" class="btn btn-secondary">{{__('comn.cancel')}}</button>
                            -->
						</div>
					</form>
					<!--end::Form-->
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    PageLoadActions();
</script>
