@include('common.controlCenterHeader')

  	{{ Form::submit('Save', ['class'=>'btn btn-success btn-block']) }}
  	<a href="/albums/{{ $album_id }}" class="btn btn-default btn-block">Cancel</a>

@include('common.controlCenterFooter')
