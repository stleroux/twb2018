{{-- PHOTO SHOW --}}

@extends ('backend.layouts.app')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.photos.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.albums.index') }}">Albums</a></li>
	<li><a href="{{ route('backend.albums.show', $photo->album_id) }}">{{ $photo->album->name }}</a></li>
	<li class="active"><span>View Photo</span></li>
@stop

@section('content')
	@include('backend.photos.show.main')
@endsection

@section('blocks')
	@include('backend.photos.show.controls')
@endsection