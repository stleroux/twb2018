@extends('layouts.app')

@section ('title','Create Article')

@section ('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>Create Article</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'articles.store']) !!}
		@include('articles.create.form')
@stop

@section('blocks')
		@include('articles.create.controls')
	{!! Form::close() !!}
@endsection

@section ('scripts')
@stop