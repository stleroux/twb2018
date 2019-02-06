<div class="well well-sm text-center" style="padding-top:4px; padding-bottom:4px; margin-top:0px; margin-bottom:0px;">
	<a href="{{ route('articles.index') }}" class="{{ Request::is('articles') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
	@foreach($letters as $value)
		<a href="{{ route('articles.index', $value) }}" class="{{ Request::is('articles/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
	@endforeach
</div>
