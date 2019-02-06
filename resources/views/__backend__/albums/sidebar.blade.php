<div class="panel panel-primary">

	<div class="panel-heading">
		<h4 class="panel-title">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
			Photo Albums
		</h4>
	</div>

	<div class="list-group">

		<a href="{{ route('backend.albums.newAlbums') }}" class="list-group-item {{ Nav::isRoute('backend.albums.newAlbums') }}">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
			New Albums
         <div class="badge pull-right">
            {{ App\Album::newAlbums()->count() }}
         </div>
		</a>
		
		<a href="{{ route('backend.albums.index') }}" class="list-group-item {{ Nav::isRoute('backend.albums.index') }}">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
			Albums
			<div class="badge pull-right">
            {{ App\Album::count() }}
         </div>
		</a>

		<a href="{{ route('backend.albums.create') }}" class="list-group-item {{ Nav::isRoute('backend.albums.create') }}">
			<i class="fa fa-plus-square" aria-hidden="true"></i>
			Add Album
		</a>
	</div>

</div>
