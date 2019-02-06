@include('common.controlCenterHeader')

	{{ Form::submit('Save', ['class'=>'btn btn-sm btn-success btn-block']) }}
	<a href="/backend/albums/{{ $album_id }}" class="btn btn-sm btn-default btn-block">Cancel</a>

@include('common.controlCenterFooter')