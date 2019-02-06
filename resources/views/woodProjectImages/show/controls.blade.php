@include('common.controlCenterHeader')

   {{-- <a href="/woodProjects/{{ $image->wood_project_id }}" class="btn btn-sm btn-default btn-block">Back to Project</a> --}}
   <a href="/woodProjectImages/{{ $image->wood_project_id}}/manageImages" class="btn btn-default btn-block">Manage Images</a>
   
	{!! Form::submit('Delete Image', ['class'=>'btn btn-danger btn-block']) !!}

@include('common.controlCenterFooter')