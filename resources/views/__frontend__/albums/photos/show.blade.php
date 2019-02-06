{{-- PHOTO SHOW --}}

@extends ('frontend.layouts.app')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	{{-- @include('backend.photos.sidebar') --}}
@stop

@section('breadcrumb')
	<li><a href="\">Home</a></li>
	<li><a href="{{ route('albums') }}">Albums</a></li>
	<li><a href="{{ route('albums.show', $photo->album_id) }}">{{ $photo->album->name }}</a></li>
	<li class="active"><span>View Photo</span></li>
@stop

@section('content')
	@include('frontend.albums.photos.show.main')
@endsection

@section('blocks')
	@include('frontend.albums.photos.show.controls')
@stop
