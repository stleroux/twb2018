{{-- PROJECT SHOW --}}

@extends('layouts.app')

@section('title','Woodshop Projects')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
  @auth
	  @include('woodProjects.sidebar')
	@endauth
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li><a href="{{ route('woodProjects.index') }}">Woodshop Projects</a></li>
  <li class="active"><span>{{ $project->name }}</span></li>
@stop

@section('content')
	{!! Form::open(['action' => ['WoodProjectsController@destroy', $project->id], 'method'=>'POST', 'style'=>'display:inline;', 'onsubmit' => 'return confirm("Are you sure you want to delete the Project AND all associated images?")']) !!}
		{{ Form::hidden('_method', 'DELETE') }}

		@include('woodProjects.show.header')
		@include('woodProjects.show.general_information')
		<div class="row">
			@include('common.view_more', ['message'=>'If you would like to see more details about the wood projects'])
		</div>
		@include('woodProjects.show.wood_information')
		@include('woodProjects.show.overall_dimensions')	
		@include('woodProjects.show.stain_information')
		@include('woodProjects.show.finish_information')
		@include('woodProjects.show.other_information')
		@include('woodProjects.show.comments')

		@include('modals.image', [
			'title'=>'Project Image',
			'img_path'=>'_woodProjects\main_images',
			'img_name'=>'main_image',
			'model'=>$project
			])
@stop

@section('blocks')
		@include('woodProjects.show.controls')
		@include('woodProjects.show.project_main_image')
		@include('woodProjects.show.image_slideshow')
		@include('woodProjects.show.purchase')
		@include('woodProjects.show.leave_comment')
	{{ Form::close() }}
@stop
