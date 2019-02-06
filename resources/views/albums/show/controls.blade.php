@include('common.controlCenterHeader')

	{!! Form::open([
		'action' => ['AlbumsController@destroy', $album->id],
		'method'=>'POST',
		'style'=>'display:inline;',
		'onsubmit' => 'return confirm("Are you sure you want to delete the Album AND all photos in it?")'
	]) !!}

		{{ Form::hidden('_method', 'DELETE') }}

		<a href="{{ route('albums.index') }}" class="btn btn-block btn-default">
			<i class="fa fa-picture-o" aria-hidden="true"></i>
			Albums List
		</a>

		{{-- <a href="{{ route('backend.albums.index') }}" class="btn btn-sm btn-default btn-block">Back to Albums</a> --}}
		<a href="{{ route('photo.add', $album->id) }}" class="btn btn-default btn-block">Add Photo</a>

		<a href="{{ route('albums.edit', $album->id) }}" class="btn btn-default btn-block">Edit Album</a>

		{!! Form::submit('Delete Album', ['class'=>'btn btn-danger btn-block']) !!}

	{!! Form::close() !!}

@include('common.controlCenterFooter')