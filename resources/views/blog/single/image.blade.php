{{-- <div class="col-xs-12 col-sm-4 col-md-3"> --}}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-camera-retro" aria-hidden="true"></i>
				Post Image
			</h3>
		</div>
		<div class="panel-body">
			@if ($post->image)
				@if(checkACL('author'))
					<a href="" data-toggle="modal" data-target="#imageModal">
						{{ Html::image("_posts/" . $post->image, "", array('height'=>'100%','width'=>'100%')) }}
					</a>
				@else
					{{ Html::image("_posts/" . $post->image, "", array('height'=>'100%','width'=>'100%')) }}
				@endif
			@endif
		</div>
	</div>
{{-- </div> --}}
