@extends('layouts.clientPanel')

@section('css')
    <style>
    .container{
       height:100% !important;
    }
        .card{
            height:100% !important;
        }
        .close{
            border: 1px solid #912741;
    float: left;
    display:none;
        }
        .alert {
            margin: 0;
    padding: 25px;
    border-radius: 3px;
        }
    </style>
@endsection


@section('content')
	<form class="docs-content d-flex flex-column flex-column-fluid ViewController" id="kt_docs_content" name="ViewController" id="ViewController" method="post" >
    				<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
    <!--begin::Container-->
		<div class="container" id="kt_docs_content_container">
			<!--begin::Card-->
			<div class="card mb-2">
				<!--begin::Card Body-->
				<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
					<!--begin::Section-->
					<div class="alert_msg">
                        @include("_msg")
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

@endsection
