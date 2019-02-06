@include('common.controlCenterHeader')

  	{!! Form::open(['action' => ['AlbumsController@destroyPhoto', $photo->id], 'method'=>'POST', 'style'=>'display:inline;']) !!}
         
      {{ Form::hidden('_method', 'DELETE') }}

      <a href="/albums/{{ $photo->album_id }}" class="btn btn-default btn-block">Back to Album</a>

      {{ link_to_action('AlbumsController@download', 'Download File',
         $parameters = array('ptf'=>'_albums\images\\'.$photo->album_id.'\\'.$photo->new_name),
         $attributes = array('class' => 'btn btn-default btn-block'))
      }}

      {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger btn-block']) !!}

   {!! Form::close() !!}

@include('common.controlCenterFooter')
