@include('common.controlCenterHeader')

   <a href="/backend/woodProjects/{{ $image->wood_project_id }}" class="btn btn-sm btn-default btn-block">Back to Project</a>
	{!! Form::submit('Delete Image', ['class'=>'btn btn-sm btn-danger btn-block']) !!}

@include('common.controlCenterFooter')