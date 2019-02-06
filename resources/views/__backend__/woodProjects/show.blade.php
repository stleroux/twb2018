{{-- PROJECT SHOW --}}

@extends('backend.layouts.app')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.woodProjects.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li><a href="{{ route('backend.woodProjects.index') }}">Woodshop Projects</a></li>
  <li class="active"><span>{{ $project->name }}</span></li>
@stop

@section('content')

{!! Form::open(['action' => ['Backend\WoodProjectsController@destroy', $project->id], 'method'=>'POST', 'style'=>'display:inline;', 'onsubmit' => 'return confirm("Are you sure you want to delete the Project AND all associated images?")']) !!}
   {{ Form::hidden('_method', 'DELETE') }}

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-pagelines" aria-hidden="true"></i>
					{{ ucfirst($project->name) }} Project Details
				</h3>
			</div>
			<div class="panel-body">
				@include('backend.woodProjects.show.main')
				@include('backend.woodProjects.show.woodInfo')
				@include('backend.woodProjects.show.dimensions')
				@include('backend.woodProjects.show.stainInfo')
				@include('backend.woodProjects.show.finishInfo')
				@include('backend.woodProjects.show.otherInfo')
			</div>
		</div>
					
		@include('modals.image', [
			'title'=>'Project Image',
			'img_path'=>'_woodProjects\main_images',
			'img_name'=>'main_image',
			'model'=>$project
			])
@endsection

@section('blocks')
		@include('backend.woodProjects.show.controls')
		@include('backend.woodProjects.show.mainImage')
		@include('backend.woodProjects.show.slideshow')
	{!! Form::close() !!}
@endsection