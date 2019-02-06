@include('common.controlCenterHeader')

	@if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'homepage')
	{{-- @if (false !== stripos($_SERVER['HTTP_REFERER'], "/")) --}}
		<a href="{{ route('homepage') }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> Home
		</a>
	@endif

	<!-- Only show the Search Results button if coming from the search results page -->
	@if (false !== stripos($_SERVER['HTTP_REFERER'], "/blog/search"))
		<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> Search Results
		</a>
	@endif

	<!-- Only show the Back to Homepage button if coming from the homepage -->
{{--               @if (false !== stripos($_SERVER['HTTP_REFERER'], "/"))
		<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
			<div class="text text-left">
				<i class="fa fa-arrow-left" aria-hidden="true"></i>
				Home
			</div>
		</a>
	@endif --}}

	<!-- Only show the Back to Archives List button if coming from the archive page -->
	@if ($url = Session::get('backUrl'))
		<a href="{{ $url }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> Archives List
		</a>
	@endif

	<a href="{{ route('blog.index') }}" class="btn btn-default btn-block">
		<i class="fa fa-newspaper-o" aria-hidden="true"></i> Blog
	</a>

	@auth
		@if(!$next)
			<a href="{{ URL::to( 'blog/index' ) }}" class="btn btn-default btn-block disabled">
				<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				Next
			</a>
		@else
			<a href="{{ URL::to( 'blog/' . $next ) }}" class="btn btn-default btn-block">
				<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				Next
			</a>
		@endif
		
		@if(!$previous)
			<a href="{{ URL::to( 'blog/' . $previous ) }}" class="btn btn-default btn-block disabled">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
				Previous
			</a>
		@else
			<a href="{{ URL::to( 'blog/' . $previous ) }}" class="btn btn-default btn-block">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
				Previous
			</a>
		@endif
	@endauth

	@if(checkACL('user'))
		<a href="" type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#printModal">
			<i class="fa fa-print" aria-hidden="true"></i> Print
		</a>
	@endif

@include('common.controlCenterFooter')