<div class="panel panel-primary">
      <div class="panel-heading">
         <div class="panel-title">Album :: {{ $album->name }}</div>
      </div>
      <div class="panel-body">
         @if(count($album->photos) > 0) {{-- Count the photos in this album :: Possible because of relationship --}}

            @foreach ($album->photos->chunk(3) as $chunk)
               <div class="row">
                  @foreach ($chunk as $photo)
                     <div class="col-xs-4">
                        <div class="thumbnail">
                           <a href="/backend/photos/{{ $photo->id }}" class="album">
                              <img src="/_albums/images/thumbs/{{ $photo->album_id }}/{{ $photo->new_name }}" alt="{{ $photo->name}}">
                           </a>
                           <div class="caption">{{ $photo->ori_name }}</div>
                        </div>
                     </div>
                     {{-- <div class="row"> --}}
                        {{-- <div class="col-xs-3">
                           <div class="thumbnail">
                              <img src="/albums/images/thumbs/{{ $photo->new_name }}" alt="{{ $photo->name}}">
                              <div class="caption">
                                 <h3>{{ $photo->ori_name }}</h3>
                                 <p>{{ $photo->description }}</p>
                                 <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                              </div>
                           </div>
                        </div> --}}
                     {{-- </div> --}}
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