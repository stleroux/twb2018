@extends('backend.layouts.app')

@section('title','New Woodshop Projects')

@section('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.woodProjects.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li class="active"><span>New Woodshop Projects</span></li>
@stop

@section('content')

	@if(count($projects) > 0)
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">New Woodshop Projects</div>
			</div>
			<div class="panel-body">
				@foreach ($projects->chunk(4) as $chunk)
					<div class="row display-flex">
						@foreach ($chunk as $project)
							<div class="col-xs-12 col-sm-3">
								<div class="thumbnail">
									<a href="/backend/woodProjects/{{ $project->id }}" class="album">
										<img src="/_woodProjects/main_images/thumbs/{{ $project->main_image }}" alt="{{ $project->name}}">
									</a>
									<p><h3 class="text-center">{{ $project->name}}</h3></p>
									<p class="text-center"><strong>Category</strong> : {{ $project->category->name }}</p>
									<p class="text text-center">
										<span class="badge text text-center">
											@if(count($project->projectImages) > 0)
												{{ count($project->projectImages) }} 
													@if(count($project->projectImages) > 1)
														images
													@else
														image
													@endif
											@else
												No Images
											@endif
										</span>
									</p>
								</div>
							</div>
						 @endforeach
					 </div>
				@endforeach
			</div>
			<div class="panel-footer">
				Click a project to view it's details
			</div>
		</div>
	@else
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">New Wood Projects</h3>
			</div>
			<div class="panel-body">
				<div class="text text-danger">NO RECORDS FOUND</div>
			</div>
		</div>
	@endif

@endsection