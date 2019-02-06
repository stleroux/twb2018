<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>TheWoodBarn.ca</title>

	{{-- Bootstrap 3.3.7 from local machine --}}
	{{-- @if(Auth::check()) --}}
		<link href="{{ asset('css/bootstrap/'. Auth::user()->profile->backendStyle.'.css') }}" rel="stylesheet">
	{{-- @else --}}
		{{-- <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet"> --}}
	{{-- @endif --}}


	{{-- Font Awesome --}}
	<link
		href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
		crossorigin="anonymous">


	{{-- JQuery --}}
{{-- 		<script
		src="https://code.jquery.com/jquery-3.2.1.js"
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		crossorigin="anonymous">
	</script> --}}
	{{--     <script
		src="http://code.jquery.com/jquery-1.12.4.js"
		integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
		crossorigin="anonymous">
	</script> --}}

	{{-- DataTables 1.10.16 with Bootstrap 3.3.7 --}}
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

	{{-- JQuery DateTime picker --}}
	<link type="text/css" href="/css/jquery.datetimepicker.min.css" rel="stylesheet" />
	
	<link href="{{ asset('css/breadcrumbs.css') }}" rel="stylesheet">

	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	
	@yield('stylesheets')
	@include('backend.layouts.partials.easyNavStyles')

</head>

<body style="margin-top: 70px;">
	<div id="app">
		<div class="container-fluid">
		{{-- <div class="{{ Auth::user()->profile->display_size == 'normal' ? 'container' : 'container-fluid' }}"> --}}
			<div class="row">
				<!-- Left Side Of Navbar -->            
				@include('backend.layouts.partials.topMenuLeft')
				<!-- Right Side Of Navbar -->
				@include('backend.layouts.partials.topMenuRight')
			</div>

			<div class="row">
				{{-- Sidebar --}}
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
					@include('backend.layouts.partials.sidebar')
					{{-- @yield('sectionSidebar') --}}
				</div>

				{{-- Content --}}
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
					@if(Auth::user()->profile->backendStyle == 'bootstrap')
						<ol class="breadcrumb breadcrumb-arrow">
							@yield('breadcrumb')
							@include('common.messages')
						</ol>
					@else
						<ol class="breadcrumb">
							@yield('breadcrumb')
							@include('common.messages')
						</ol>
					@endif

					{{-- @include ('layouts.cart') --}}
					@yield('content')
				</div>
			</div>

			@include('common.footer')
		</div>

		<!-- Scripts -->
		
			{{-- JQuery --}}
		<script
			src="https://code.jquery.com/jquery-3.2.1.js"
			integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous">
		</script>

		{{-- Bootstrap 3.3.7 --}}
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		{{-- Required for Multi-select in Index pages --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>

		<script type="text/javascript" language="javascript" src="//bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.16/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
		
		@include('scripts.menuHover')
		@include('scripts.datatables')
		@include('scripts.tinymce')
		@include('scripts.messages')
		@include('scripts.dateTimePicker')
		@include('scripts.popover')
		@include('modals.deleteConfirm')
		<script src="/js/dataTables.searchHighlight.js"></script>
		@yield('scripts')
	</div>
</body>
</html>