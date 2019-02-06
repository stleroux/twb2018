@extends('layouts.app')

@section('title','Unauthorized Access')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}

	{{-- <style>
		html, body {
			height: 100%;
		}

		body {
			/*margin: 0;*/
			margin-top: 70px;
			padding: 0;
			width: 100%;
			/*color: #B0BEC5;*/
			display: table;
			font-weight: 100;
			font-family: 'Lato', sans-serif;
		}

		.container {
			text-align: center;
			display: table-cell;
			vertical-align: middle;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 72px;
			margin-bottom: 40px;
		}
	</style> --}}
@stop

@section('sectionSidebar')
  {{-- @include('backend.projects.sidebar') --}}
@stop

{{-- @section('breadcrumb') --}}
	{{-- <li><a href="/">Home</a></li> --}}
{{-- @stop --}}

@section('content')
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<div class="panel panel-danger">
			
			<div class="panel-heading">
				<h3 class="panel-title text-center">Unauthorized access.</h3>
			</div>
			
			<div class="panel-body">
				<div class="col-xs-12 text-center">
					<img src="\images\dog.jpg">
				</div>
				
				<div class="col-xs-12 text-center">
					<br />
					<p>It seems like you do not have sufficient permissions to view this page or your session has timed out due to inactiviy.</p>
				</div>
				
				<div class="col-xs-12 text-center">
					<p>If you think this is an error, please contact the system administrator by using the <a href="/contact">Contact Us</a> page</p>
				</div>
			</div>

			<div class="panel-footer text-center">
				<a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Return to previous page</a>
			</div>
		</div>
	</div>
@endsection