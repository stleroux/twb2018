@include('common.controlCenterHeader')

	{!! Form::open([
		'action' => ['Backend\AlbumsController@destroy', $album->id],
		'method'=>'POST',
		'style'=>'display:inline;',
		'onsubmit' => 'return confirm("Are you sure you want to delete the Album AND all photos in it?")'
	])	!!}
		{{ Form::hidden('_method', 'DELETE') }}

		{{-- <a href="{{ route('backend.albums.index') }}" class="btn btn-sm btn-default btn-block">Back to Albums</a> --}}
		<a href="{{ route('backend.photos.create', $album->id) }}" class="btn btn-sm btn-primary btn-block">Add Photo</a>
		{!! Form::submit('Delete Album', ['class'=>'btn btn-sm btn-danger btn-block']) !!}

	{!! Form::close() !!}

@include('common.controlCenterFooter')