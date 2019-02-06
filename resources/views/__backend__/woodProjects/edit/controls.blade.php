@include('common.controlCenterHeader')

	{{ Form::submit('Update Project', ['class'=>'btn btn-sm btn-success btn-block']) }}
	<a href="/backend/woodProjects/{{ $project->id}}" class="btn btn-sm btn-default btn-block">Back to Project</a>

@include('common.controlCenterFooter')