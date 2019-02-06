{{-- IMAGE SLIDESHOW (CAROUSSEL) --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
			Project Images
		</h3>
	</div>
	<div class="panel-body">
		@if($project->projectImages->count() > 0)
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

				<!-- Indicators -->
				<ol class="carousel-indicators">
					@foreach( $project->projectImages as $image )
						<li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
					@endforeach
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					@foreach( $project->projectImages as $image )
						<div class="item {{ $loop->first ? ' active' : '' }}" >
							<a href="{{ route('backend.woodProjectImage.show', $image->id) }}" class="">
								<img class="center-block" src="/_woodProjects/images/thumbs/{{ $image->wood_project_id }}/{{ $image->new_name }}" alt="{{ $image->name}}">
							</a>
							<div class="text text-center">{{ $image->ori_name }}</div>
						</div>
					@endforeach
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class=""></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		@else
			No Extra Images Available At This Time
		@endif

	</div>
	<div class="panel-footer">
		Click on image to view it full size
	</div>
</div>
