@extends('layouts.app')

@section ('title','Edit Album')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('albums.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li><a href="{{ route('albums.index') }}">Albums</a></li>
   <li class="active"><span>Edit Album</span></li>
@stop

@section('content')
   {{-- {!! Form::open(['route'=>'albums.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!} --}}
   {{-- <form enctype="multipart/form-data" style="display:inline;"> --}}
   {!! Form::model($album, ['route'=>['albums.update', $album->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
      {!! csrf_field() !!}
      @include('albums.edit.datagrid')

@endsection

@section('blocks')
      @include('albums.edit.controls')
   {!! Form::close()!!}
@stop