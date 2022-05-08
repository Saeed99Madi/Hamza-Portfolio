
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Card-->
				<div class="card card-custom gutter-b example example-compact">
					<form class="form ajaxForm" action="{{ route('user-role-store') }}" name="form" id="form" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="userid" value="{{ $user->id }}" />
						<div class="card-body">
							<div class="row">
                            <div class="table-responsive mb-10">
															<!--begin::Table-->
															<table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
																<!--begin::Table head
																<thead>
																	<tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
																		<th class="" width="10%">
                                                                        </th>
																		<th class="" style="padding-right: 0;">{{__('role.titleCol')}}</th>
																	</tr>
																</thead>-->
																<tbody>
                                                                    @foreach($items as $c)
																	<tr class="border-bottom border-bottom-dashed" data-kt-element="item">
																		<td class="pe-0">
                                                                            @php
                                                                                $co = count($data->where('roles_id', '=', $c->id))
                                                                            @endphp
																			<input class="form-check-input" {{$co>0?"checked":""}} type="checkbox" name="data[]" value="{{$c->id}}">
                                                                            
																		</td>
																		<td class="ps-1">
																			{{$c->title}}
																		</td>
																	</tr>
                                                                    @endforeach
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
							<button type="reset" id="btnReset" class="btn btn-secondary">{{__('comn.cancel')}}</button>
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
