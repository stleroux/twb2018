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
	
{{-- 	<div class="col-xs-12 col-md-2">
		@include('layouts.partials.sidebar')
	</div> --}}

	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				@include('layouts.partials.breadcrumbs')
				
				@if(View::hasSection('warning'))
					@yield('warning')
				@endif
				
				@if(View::hasSection('intro'))
					@yield('intro')
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 text-right">
				
			</div>
		</div>
		
		<div class="row">
			@if(View::hasSection('blocks'))
				<div class="col-xs-12 col-md-9">
					@yield('menubar')
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
{{-- Required for spacing at bottom of page otherwise the side bar blocks are partially hidden --}}
{{-- <br /><br /> --}}