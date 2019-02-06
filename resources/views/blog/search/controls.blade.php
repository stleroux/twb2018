@include('common.controlCenterHeader')

	<!-- Only show the Search Results button if coming from the search results page -->
	@if (false !== stripos($_SERVER['HTTP_REFERER'], "/blog/search"))
		<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> Search Results
		</a>
	@endif

	@if (true !== stripos($_SERVER['HTTP_REFERER'], "/search/posts"))
		<a href="{{ route('blog.index') }}" class="btn btn-default btn-block">
			<i class="fa fa-newspaper-o" aria-hidden="true"></i> Blog
		</a>
	@endif

@include('common.controlCenterFooter')