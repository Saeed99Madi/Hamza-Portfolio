@extends('layouts.clientPanel')


@section('css')


@endsection


@section('content')
	<form class="docs-content d-flex flex-column flex-column-fluid" id="kt_docs_content" name="ViewController" id="ViewController" method="post">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />

	<div class="container" id="kt_docs_content_container">
    
    
	</div>
	</form>

    
@endsection

@section('js')
@endsection
