@include('common.controlCenterHeader')
	
	{{-- @if (false !== stripos($_SERVER['HTTP_REFERER'], "/")) --}}
	@if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'homepage')
		<a href="{{ route('homepage') }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> Home
		</a>
	@endif

	<a href="{{ route('woodProjects.index') }}" class="btn btn-default btn-block">
		<i class="fa fa-pagelines" aria-hidden="true"></i>
		Wood Projects
	</a>

	@auth
		<a href="{{ URL::to( 'woodProjects/' . $next ) }}" class="btn btn-default btn-block">
			<i class="fa fa-angle-double-right" aria-hidden="true"></i>
			Next Project
		</a>

		<a href="{{ URL::to( 'woodProjects/' . $previous ) }}" class="btn btn-default btn-block">
			<i class="fa fa-angle-double-left" aria-hidden="true"></i>
			Previous Project
		</a>
	@endauth

	<a href="{{ route('woodProjects.edit', $project->id) }}" class="btn btn-default btn-block">
		<i class="fa fa-edit" aria-hidden="true"></i>
		Edit
	</a>

	{{-- <a href="{{ route('woodProjects.edit', $project->id) }}" class="btn btn-sm btn-primary btn-block">Edit Project</a> --}}

	<a href="{{ route('woodProjectImages.index', $project->id) }}" class="btn btn-default btn-block">Manage Images</a>
	{{-- <a href="{{ route('woodProjectImages.create', $project->id) }}" class="btn btn-default btn-block">Add Image</a> --}}

	{!! Form::submit('Delete Project', ['class'=>'btn btn-danger btn-block']) !!}

{{-- 	<a href="{{ route('woodProjects.index') }}" class="btn btn-sm btn-default btn-block">Back to Projects</a> --}}

@include('common.controlCenterFooter')