@include('common.controlCenterHeader')

	<a href="/albums/{{ $photo->album_id }}" class="btn btn-sm btn-default btn-block">Back to Album</a>

   {{ link_to_action('Frontend\AlbumsController@download', 'Download File',
         $parameters = array('ptf'=>'_albums\images\\'.$photo->album_id.'\\'.$photo->new_name),
         $attributes = array('class' => 'btn btn-sm btn-default btn-block'))
   }}

@include('common.controlCenterFooter')