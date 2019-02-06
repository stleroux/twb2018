<div class="well well-sm text text-center" style="padding-top:4px; padding-bottom:4px; margin-top:0px; margin-bottom:0px;">
	<a href="{{ route('articles.newArticles') }}" class="{{ Request::is('articles/newArticles') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
	@foreach($letters as $value)
		<a href="{{ route('articles.newArticles', $value) }}" class="{{ Request::is('articles/newArticles/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
	@endforeach
</div>