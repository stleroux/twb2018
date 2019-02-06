<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         {{-- <i class="fa fa-camera-retro" aria-hidden="true"></i> --}}
         Module Menu
      </h4>
   </div>

   <div class="list-group">

     {{--  <a href="{{ route('albums.newAlbums') }}" class="list-group-item {{ Nav::isRoute('albums.newAlbums') }}">
         <i class="fa fa-camera-retro" aria-hidden="true"></i>
         New Albums
         <div class="badge pull-right">
            {{ App\Album::newAlbums()->count() }}
         </div>
      </a> --}}
      
      <a href="{{ route('albums.index') }}" class="list-group-item {{ Nav::isRoute('albums.index') }}">
         <i class="fa fa-camera-retro" aria-hidden="true"></i>
         Photo Albums
         <div class="badge pull-right">
            {{ App\Album::count() }}
         </div>
      </a>

      {{-- <a href="{{ route('albums.create') }}" class="list-group-item {{ Nav::isRoute('albums.create') }}">
         <i class="fa fa-plus-square" aria-hidden="true"></i>
         Add Album
      </a> --}}
   </div>

</div>