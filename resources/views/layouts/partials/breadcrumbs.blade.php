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