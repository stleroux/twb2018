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
	{{-- <link
		href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
		crossorigin="anonymous"> --}}
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

	{{-- DataTables 1.10.16 with Bootstrap 3.3.7 --}}
	{{-- <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> --}}
	<link href="{{ asset('css/datatables.css') }}" rel="stylesheet">

	<link href="{{ asset('css/breadcrumbs.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	{{-- <link href="{{ asset('css/backend.css') }}" rel="stylesheet"> --}}

	@yield('stylesheets')
	@include('layouts.partials.easyNavStyles')
</head>

<body>
	<div id="app">
		<div class="container-fluid">
			<div class="col-xs-12">
				<div class="row">
					@include('layouts.partials.topMenuLeft')
					{{-- @include ('layouts.cart') --}}
					@include('layouts.partials.topMenuRight')
				</div>

				@if(Auth::check())
					@if(Auth::user()->profile->layout == 1)
						@include('layouts.partials.lay_1')
					@elseif(Auth::user()->profile->layout == 2)
						@include('layouts.partials.lay_2')
					@elseif(Auth::user()->profile->layout == 3)
						@include('layouts.partials.lay_3')
					@elseif(Auth::user()->profile->layout == 4)
						@include('layouts.partials.lay_4')
					@endif
				@else
					@include('layouts.partials.lay_1')
				@endif
			</div>
		</div> {{-- End of container --}}

	</div>
		<div id="footer" class="container-fluid">
			@include('common.footer')
		</div>
		<!-- Scripts -->
		{{-- JQuery 3.2.1 --}}
		{{-- <script
			src="https://code.jquery.com/jquery-3.2.1.js"
			integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous">
		</script> --}}
		{{ Html::script('js/jquery_3.3.1.js') }}
		{{-- Bootstrap 3.3.7 --}}
		{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
		{{ Html::script('js/bootstrap.min.js') }}

		@include('scripts.datatables')
		@include('scripts.messages')
		@include('scripts.menuHover')
		@include('scripts.popover')
		@include('scripts.tinymce')
		@include('scripts.dateTimePicker')
		@yield('scripts')
</body>
</html>
