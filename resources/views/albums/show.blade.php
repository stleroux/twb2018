{{-- ALBUM SHOW --}}

@extends('layouts.app')

@section('stylesheets')
@stop

@section('sectionSidebar')
  {{-- @include('backend.photos.sidebar') --}}
@stop

@section('breadcrumb')
  <li><a href="\">Home</a></li>
  <li><a href="{{ route('albums.index') }}">Albums</a></li>
  <li class="active"><span>{{ $album->name }}</span></li>
@stop

@section('content')
   @include('albums.show.datagrid')
@stop

@section('blocks')
   @include('albums.show.controls')
@stop