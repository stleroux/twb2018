{{-- PROJECT SHOW --}}

@extends('frontend.layouts.app')

@section('title','Woodshop Projects')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
  {{-- @include('backend.projects.sidebar') --}}
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li><a href="{{ route('woodProjects') }}">Woodshop Projects</a></li>
  <li class="active"><span>{{ $project->name }}</span></li>
@stop

@section('content')

	<div class="panel text-right">
		<a href="{{ URL::previous() }}" class="btn btn-default">Back to Projects</a>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">{{ $project->name }}</div>
		</div>
		<div class="panel-body">
			<div class="col-xs-12 col-md-8">
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">Project Details</div>
						</div>
						<div class="panel-body">
							{{-- GENERAL INFORMATION --}}
							@include('frontend.woodProjects.includes.general_information')
							{{-- WOOD INFORMATION --}}
							@include('frontend.woodProjects.includes.wood_information')
							
							{{-- OVERALL DIMENSIONS --}}
							@include('frontend.woodProjects.includes.overall_dimensions')	

							{{-- STAIN INFORMATION --}}
							@include('frontend.woodProjects.includes.stain_information')

							{{-- FINISH INFORMATION --}}
							@include('frontend.woodProjects.includes.finish_information')

							{{-- OTHER INFORMATION --}}
							@include('frontend.woodProjects.includes.other_information')

							@if(!checkACL('user'))
								<div class="alert alert-info text-center">
									If you would like to see more details and more images about this project, please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> an account.
								</div>
							@endif
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">Comments</div>
						</div>
						<div class="panel-body">
							@include('frontend.woodProjects.includes.comments')
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-4">
					{{-- PROJECT MAIN IMAGE --}}
					@include('frontend.woodProjects.includes.project_main_image')
					{{-- IMAGE SLIDESHOW (CAROUSSEL) --}}
					@include('frontend.woodProjects.includes.image_slideshow')

					{{-- PURCHASE FORM --}}
					@include('frontend.woodProjects.includes.purchase')

					{{-- LEAVE COMMENT --}}
					@include('frontend.woodProjects.includes.leave_comment')
				</div>
			</div>
		</div>
	</div>


@include('modals.image', [
	'title'=>'Project Image',
	'img_path'=>'_woodProjects\main_images',
	'img_name'=>'main_image',
	'model'=>$project
	])
  

@endsection