@extends('backend.layouts.app')

@section ('title','| ')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.categories.sidebar')
@stop

@section('breadcrumb')
	<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
	<li><a href="{{ route('backend.categories.index') }}">Categories</a></li>
	<li><span class="active">Edit Category</span></li>
@stop

@section('content')
	{!! Form::model($category, ['route'=>['backend.categories.update', $category->id], 'method' => 'PUT']) !!}

		<div class="row">
		
			<div class="col-xs-12 col-sm-9">
				@include('backend.categories.blocks.edit.form')
			</div>
			
			<div class="col-xs-12 col-sm-3">
				@include('backend.categories.blocks.edit.controls')
				@include('backend.block_info', ['model'=>$category, 'title'=>'Categories'])
			</div>
		</div>

	{!! Form::close() !!}
@stop

@section ('scripts')
@stop