@include('common.controlCenterHeader')

	<a href="{{ route('backend.woodProjects.edit', $project->id) }}" class="btn btn-sm btn-primary btn-block">Edit Project</a>
	<a href="{{ route('backend.woodProjectImage.create', $project->id) }}" class="btn btn-sm btn-primary btn-block">Add Image</a>
	{!! Form::submit('Delete Project', ['class'=>'btn btn-sm btn-danger btn-block']) !!}
	<a href="{{ route('backend.woodProjects.index') }}" class="btn btn-sm btn-default btn-block">Back to Projects</a>

@include('common.controlCenterFooter')