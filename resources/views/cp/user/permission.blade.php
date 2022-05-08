
	<div class="container ajaxForm">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Card-->
				<div class="card card-custom gutter-b example example-compact">
					<!--<div class="card-header">
						<h3 class="card-title">{{ __('user.UserPermission') }}</h3>
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
					<form class="form PageController" action="{{ url()->current() }}" name="PageController" id="PageController" method="post" ng-controller="PageController">
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div id="kt_jstree"></div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" id="btnSave" ng-click="btnSaveFun()" class="btn btn-primary mr-2">{{ __('comn.Submit') }}</button>
							<!--<a href="{{ route('user-view') }}" id="btnBack" class="btn btn-secondary">{{ __('comn.Back') }}</a>
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
	var data = '{{ $json }}';
	var ob = JSON.parse(data.replaceAll('&quot;', '"'));//(data);//.replace(//g,'"'));
	
	//console.log(data.replaceAll('&quot;', '"'));

	
	$('#kt_jstree').jstree({
    'plugins': ["wholerow", "checkbox", "types"],
    'core': {
        "themes" : {
            "responsive": false
        },
        'data': ob
						
    },
    "types" : {
        "default" : {
            "icon" : "fa fa-folder text-warning"
        },
        "file" : {
            "icon" : "fa fa-file  text-warning"
        }
    },
});
$("#btnSave").click(function(){
				var checked_ids = []; 
				var selectedNodes = $('#kt_jstree').jstree("get_selected", true);
				$.each(selectedNodes, function() {
					checked_ids.push(this.id);
				});

				$.ajax({
                    method: 'POST',
                    data: {
                        _token: $("[name=_token]").val(),
                        data: checked_ids,
						id:{{ $userid }}
                    },
                    url: '{{ route("user-permission-store") }}'
                }).then(function successCallback(json) {
                    //console.log(json);
                    ShowMessage(json.msg);
                }, function errorCallback(json) {
                });
			});
</script>

