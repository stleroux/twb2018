@extends('layouts.app')

@section ('title','| ')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('categories.sidebar')
@stop

@section('breadcrumb')
	<li><a href="{{ route('homepage') }}">Home</a></li>
	<li><a href="{{ route('categories.index') }}">Categories</a></li>
	<li><span class="active">Edit Category</span></li>
@stop

@section('content')
	{!! Form::model($category, ['route'=>['categories.update', $category->id], 'method' => 'PUT']) !!}

		<div class="row">
		
			<div class="col-xs-12 col-sm-9">
				@include('categories.edit.form')
			</div>
			
			<div class="col-xs-12 col-sm-3">
				@include('categories.edit.controls')
				{{-- @include('block_info', ['model'=>$category, 'title'=>'Categories']) --}}
			</div>
		</div>

	{!! Form::close() !!}
@stop

@section ('scripts')
@stop