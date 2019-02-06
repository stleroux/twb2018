<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-pagelines" aria-hidden="true"></i>
			Wood Project Images
		</h3>
	</div>
	<div class="panel-body">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ol class="carousel-indicators">
				@foreach( $woodprojects as $project )
					<li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
				@endforeach
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				@foreach( $woodprojects as $project )
					<div class="item {{ $loop->first ? ' active' : '' }}" >
						{{-- <a href="/woodProjects/{{ $project->id }}"> --}}
							<img
								class="center-block"
								src="/_woodProjects/main_images/{{ $project->main_image }}"
								alt="{{ $project->main_image}}"
								heigth="300px"
								width="300px"
							>
							<div class="text text-center">{{ ucfirst($project->name) }}</div>
						{{-- </a> --}}
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
	</div>
	<div class="panel-footer">
		To see more information on the projects, please go to the Woodshop Projects page.
	</div>
</div>