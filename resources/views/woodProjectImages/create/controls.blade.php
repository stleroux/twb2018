@include('common.controlCenterHeader')

	{{ Form::submit('Save', ['class'=>'btn btn-success btn-block']) }}
   <a href="/woodProjectImages/{{ $project_id }}/manageImages" class="btn btn-default btn-block">Manage Images</a>
	<a href="/woodProjects/{{ $project_id }}" class="btn btn-default btn-block">Wood Project</a>
   <a href="/woodProjects" class="btn btn-default btn-block">Wood Projects</a>

@include('common.controlCenterFooter')