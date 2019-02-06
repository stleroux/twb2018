{{-- ALBUM SHOW --}}

@extends('frontend.layouts.app')

@section('stylesheets')
@stop

@section('sectionSidebar')
  {{-- @include('backend.photos.sidebar') --}}
@stop

@section('breadcrumb')
  <li><a href="\">Home</a></li>
  <li><a href="{{ route('albums') }}">Albums</a></li>
  <li class="active"><span>{{ $album->name }}</span></li>
@stop

@section('content')
	@include('frontend.albums.show.main')
@stop

@section('blocks')
   @include('frontend.albums.show.controls')
@stop