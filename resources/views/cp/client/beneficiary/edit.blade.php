
	<div class="container-fluid ajaxForm">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Card-->
				<div class="card card-custom gutter-b example example-compact">
					<form class="form" action="{{ url()->current() }}" name="form" id="form" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="card-body">
                        <div class="row">
                                <input type="hidden" id="id" name="id" value="{{$ob->id}}">
								<div class="col-md-6">
									<div class="form-group">
										<label>الإسم</label>
										<input type="text" id="name" name="name" value="{{$ob->name}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>رقم الهوية</label>
										<input type="text" id="identity" name="identity" value="{{$ob->identity}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>المدينة</label>
										<input type="text" id="city" name="city" value="{{$ob->city}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>المشروع</label>
										<input type="text" id="project" name="project" value="{{$ob->project}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>المؤسسة</label>
										<input type="text" id="institute" name="institute" value="{{$ob->institute}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>الممول</label>
										<input type="text" id="donor" name="donor" value="{{$ob->donor}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>قيمة التمويل</label>
										<input type="text" id="budget" name="budget" value="{{$ob->budget}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>تاريخ الإستفاده</label>
										<input type="text" id="date" name="date" value="{{date('d/m/Y', strtotime($ob->date))}}" class="form-control form-control-solid date" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>نوع المشروع</label>
										<input type="text" id="project_type" name="project_type" value="{{$ob->project_type}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>رقم هوية الشريك</label>
										<input type="text" id="partnarId" name="partnarId" value="{{$ob->partnarId}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>إسم الشريك</label>
										<input type="text" id="partnarName" name="partnarName" value="{{$ob->partnarName}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
										<span class="form-text text-muted"></span>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>إسم الكشف</label>
										<input type="text" id="book" name="book" value="{{$ob->book}}" class="form-control form-control-solid" placeholder="" autocomplete="off">
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
