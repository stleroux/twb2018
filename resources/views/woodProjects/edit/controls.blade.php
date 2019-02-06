@include('common.controlCenterHeader')

	{{ Form::submit('Update Project', ['class'=>'btn btn-success btn-block']) }}
	<a href="/woodProjects/{{ $project->id}}" class="btn btn-default btn-block">Back to Project</a>

@include('common.controlCenterFooter')