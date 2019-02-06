<div class="panel panel-primary">

	<div class="panel-heading">
		<div class="panel-title">Album :: {{ $album->name }}</div>
	</div>
	
	<div class="panel-body">
		@if(count($album->photos) > 0) {{-- Count the photos in this album :: Possible because of relationship --}}

			@foreach ($album->photos->chunk(4) as $chunk)
				<div class="row display-flex">

					@foreach ($chunk as $photo)
						<div class="col-xs-4 col-sm-3">
							<div class="thumbnail">
								<a href="/albums/photo/{{ $photo->id }}" class="album">
									<img src="/_albums/images/thumbs/{{ $photo->album_id }}/{{ $photo->new_name }}" alt="{{ $photo->name}}">
								</a>
								<div class="caption">
									<div class="text text-center">{{ $photo->ori_name }}</div>
								</div>
								<div>
									{{-- <a href="/albums/photo/{{ $photo->id }}" class="btn btn-xs btn-default btn-block">View Full Image</a> --}}
									{{ link_to_action('Frontend\AlbumsController@download', 'Download File',
            						$parameters = array('ptf'=>'_albums\images\\'.$photo->album_id.'\\'.$photo->new_name),
            						$attributes = array('class' => 'btn btn-xs btn-primary btn-block'))
      							}}
								</div>
							</div>
						</div>
					@endforeach

				 </div>
			@endforeach

		@else
			<p class="text text-danger">No photos found in this album</p>
		@endif
	</div>
	
	@if(count($album->photos) > 0)
		<div class="panel-footer">
			Click on an image to view it full size
		</div>
	@endif
</div>