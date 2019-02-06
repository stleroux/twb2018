@include('common.controlCenterHeader')

	<a href="/" class="btn btn-default btn-block">
		<i class="fa fa-home" aria-hidden="true"></i> Home
	</a>

	@if (true !== stripos($_SERVER['HTTP_REFERER'], "/search/posts"))
		<a href="{{ route('blog.index') }}" class="btn btn-default btn-block">
			<i class="fa fa-newspaper-o" aria-hidden="true"></i> Blog
		</a>
	@endif

@include('common.controlCenterFooter')