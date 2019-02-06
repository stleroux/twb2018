@include('common.controlCenterHeader')

	{!! Form::open(['action' => ['Backend\PhotosController@destroy', $photo->id], 'method'=>'POST', 'style'=>'display:inline;']) !!}
	
		{{ Form::hidden('_method', 'DELETE') }}

		<a href="/backend/albums/{{ $photo->album_id }}" class="btn btn-sm btn-default btn-block">Back to Album</a>
		{!! Form::submit('Delete Photo', ['class'=>'btn btn-sm btn-danger btn-block']) !!}

	{!! Form::close() !!}

@include('common.controlCenterFooter')