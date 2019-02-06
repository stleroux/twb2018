{{-- ALBUM SHOW --}}

@extends('backend.layouts.app')

@section('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.photos.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li><a href="{{ route('backend.albums.index') }}">Albums</a></li>
  <li class="active"><span>{{ $album->name }}</span></li>
@stop

@section('content')
	@include('backend.albums.show.main')
@stop

@section('blocks')
	@include('backend.albums.show.controls')
@stop




	

