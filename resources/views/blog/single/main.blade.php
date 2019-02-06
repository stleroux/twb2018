<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-newspaper-o" aria-hidden="true"></i>
				Content
			</h3>
		</div>
		<div class="panel-body">
			@if(checkACL('author'))
				{!! $post->body !!}
			@else
				<p>{!! substr(strip_tags($post->body), 0, 250) !!} {{ strlen(strip_tags($post->body)) > 250 ? ' [More]...' : '' }}</p>
			@endif
		</div>
	</div>
</div>
