<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
			Project Main Image
		</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">
				@if(checkACL('author'))
					<a href="" data-toggle="modal" data-target="#imageModal">
						<img src="/_woodProjects/main_images/thumbs/{{ $project->main_image }}" alt="{{ $project->name}}" height="100%" width="100%">
					</a>
				@else
					<img src="/_woodProjects/main_images/thumbs/{{ $project->main_image }}" alt="{{ $project->name}}" height="100%" width="100%">
				@endif
			</div>
		</div>
	</div>
</div>
