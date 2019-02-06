@extends('layouts.app')

@section ('title','| ')

@section ('stylesheets')
  {{ Html::style('css/frontend.css') }}
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li><a href="{{ route('blog.index') }}">Blog</a></li>
  <li class="active">Blog Search</li>
@stop

@section ('content')
  <div class="row">
    <div class="col-xs-12 col-md-9">
      @include('blog.search.main')
    </div>
    <div class="col-md-3">
        @include('blog.search.controls')
        @include('homepage.blogArchives')
    </div>
  </div>
@stop

@section ('scripts')
@stop
