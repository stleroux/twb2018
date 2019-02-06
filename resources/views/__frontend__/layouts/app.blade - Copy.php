{{-- Bootstrap 3.3.7 --}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>TheWoodBarn.ca</title>

	<!-- Styles -->
	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

	{{-- Bootstrap 3.3.7 from local machine --}}
	@if(Auth::check())
		<link href="{{ asset('css/bootstrap/'. Auth::user()->profile->frontendStyle.'.css') }}" rel="stylesheet">
	@else
		<link href="{{ asset('css/bootstrap/slate.css') }}" rel="stylesheet">
	@endif

	{{-- Font Awesome --}}
	<link
		href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
		crossorigin="anonymous">

	{{-- DataTables 1.10.16 with Bootstrap 3.3.7 --}}
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

	<link href="{{ asset('css/breadcrumbs.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	{{-- <link href="{{ asset('css/backend.css') }}" rel="stylesheet"> --}}

	@yield('stylesheets')
	@include('frontend.layouts.partials.easyNavStyles')

{{-- 	<style>
		body {
	    background-image: url('../images/board_1.jpg');
	    background-repeat: no-repeat;
	    background-size: 100% 100%;
	    background-attachment: fixed;
	    background-color: #ffffff;
		}
	</style> --}}
</head>

<body>
	<div id="app">
		<div class="container-fluid">
			<div class="row">
				<!-- Left Side Of Navbar -->            
				@include('frontend.layouts.partials.topMenuLeft')
				<!-- Right Side Of Navbar -->
				{{-- @include ('layouts.cart') --}}
				@include('frontend.layouts.partials.topMenuRight')
			</div>
		
			<div class="row">
				{{-- Sidebar --}}
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
					@include('frontend.layouts.partials.sidebar')
				</div>
				
				{{-- Content --}}
				{{-- <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
					<div class="">
						@if(View::hasSection('breadcrumb'))
							<ol class="breadcrumb breadcrumb-arrow">
								@yield('breadcrumb')
							</ol>
						@endif
					</div> --}}

				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
					@if(View::hasSection('breadcrumb'))
						@if(Auth::check())
							@if(Auth::user()->profile->frontendStyle == 'bootstrap')
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
						@else
							{{-- Use breadcrumb if non logged in style is not Bootstrap, otherwise use breadcrumb-arrow --}}
							<ol class="breadcrumb"> 
								@yield('breadcrumb')
								@include('common.messages')
							</ol>
						@endif
					@endif

					@yield('content')
				</div>
			</div>

			@include('common.footer')
		</div>

		<!-- Scripts -->
		{{-- JQuery 3.2.1 --}}
		<script
			src="https://code.jquery.com/jquery-3.2.1.js"
			integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous">
		</script>

		{{-- Bootstrap 3.3.7 --}}
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		@include('scripts.datatables')
		@include('scripts.messages')
		@include('scripts.menuHover')
		@include('scripts.popover')
		@yield('scripts')
	</div>
</body>
</html>
