@foreach ($albums->chunk(4) as $chunk)
	<div class="row display-flex">
		@foreach ($chunk as $album)
			<div class="col-xs-12 col-sm-3">
				<div class="panel panel-default" style="margin-bottom:0px">
					<div class="panel-heading">
						<h4 class="panel-title text-center">{{ $album->name}}</h4>
					</div>
					<div class="panel-body">
						<div class="thumbnail" style="margin-bottom:0px">
							@auth
								<a href="/albums/{{ $album->id }}" class="album" style="margin-bottom:10px">
							@endauth
								<img
									src="/_albums/cover_images/thumbs/{{ $album->cover_image }}"
									alt="{{ $album->name}}"
									@guest
										style="margin-bottom:10px"
									@endguest
								>
							@auth
								</a>
							@endauth
							{{-- <div class="caption"><h3>Thumbnail label</h3></div> --}}
							<p class="text text-center">
								<span class="badge text text-center">
									@if(count($album->photos) > 0)
										{{ count($album->photos) }}
											@if(count($album->photos) > 1)
												images
											@else
												image
											@endif
									@else
										No Images
									@endif
								</span>
							</p>
						</div>
					</div>
					<div class="panel-footer text-center">{{ $album->description }}</div>
				</div>
			</div>
		@endforeach
	</div>
@endforeach
