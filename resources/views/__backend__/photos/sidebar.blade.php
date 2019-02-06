<div class="panel panel-primary">

	<div class="panel-heading">
		<h4 class="panel-title"><i class="fa fa-picture-o" aria-hidden="true"></i> Photos</h4>
	</div>

	<div class="list-group">

		<a href="{{ route('backend.albums.index') }}" class="list-group-item {{ Nav::isRoute('backend.albums.index') }}">
			<i class="fa fa-leanpub" aria-hidden="true"></i>
			Albums
		</a>
	
	@if(Request::route()->getName() == 'backend.photos.show')
		<a href="{{ route('backend.albums.show', $photo->album_id) }}" class="list-group-item {{ Nav::isRoute('backend.photos.show') }}">
			<i class="fa fa-picture-o" aria-hidden="true"></i>
			{{ $photo->album->name }}
		</a>
	@endif

	@if(Request::route()->getName() == 'backend.albums.show')
		<a href="{{ route('backend.albums.show', $album->id) }}" class="list-group-item {{ Nav::isRoute('backend.albums.show') }}">
			<i class="fa fa-picture-o" aria-hidden="true"></i>
			{{ $album->name }}
		</a>
	@endif


	@if(Request::route()->getName() == 'backend.albums.show')
		<a href="{{ route('backend.photos.create', $album->id) }}" class="list-group-item {{ Nav::isRoute('backend.photos.create') }}">
			<i class="fa fa-plus-square" aria-hidden="true"></i>
			Add Photo
		</a>
	@endif

	</div>

</div>
