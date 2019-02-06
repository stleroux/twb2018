{{-- 
====================================================
| TOP MENU                                         |
====================================================
| SIDEBAR | BREADCRUMB                             |
|         |========================================|
|         | CONTENT                       |  MENU  |
==================================================== 
 --}}

<div class="row">
	
	<div class="col-xs-12 col-md-2">
		@include('backend.layouts.partials.sidebar')
	</div>

	<div class="col-xs-12 col-md-10">
		<div class="row">
			<div class="col-xs-12">
				@include('backend.layouts.partials.breadcrumbs')
				
				@if(View::hasSection('warning'))
					@yield('warning')
				@endif
				
				@if(View::hasSection('intro'))
					@yield('intro')
				@endif

			</div>
		</div>

		<div class="row">
			
			@if(View::hasSection('blocks'))
				<div class="col-xs-12 col-md-9">
					@yield('content')
				</div>
				<div class="col-xs-12 col-md-3">
					@yield('blocks')
				</div>
			@else
				<div class="col-xs-12">
					@yield('content')
				</div>
			@endif
		</div>

	</div>
</div>
