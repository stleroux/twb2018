@extends('layouts.app')

@section('title','Woodshop Projects')

@section('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
	@auth
		@include('woodProjects.sidebar')
	@endauth
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li class="active"><span>Woodshop Projects</span></li>
@stop

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-pagelines" aria-hidden="true"></i>
				Woodshop Projects
			</h3>
		</div>
		<div class="panel-body" style="background-image: url('../images/board_2.jpg');">
			@if(count($projects) > 0)

				@foreach ($projects->chunk(4) as $chunk)
					<div class="row">
						@foreach ($chunk as $project)
							<div class="col-xs-12 col-sm-3">
								<div class="thumbnail" style="background-image: url('../images/nav.jpg'); padding-top:15px; padding-bottom: 10px">
									<a href="/woodProjects/{{ $project->id }}">
										<img src="/_woodProjects/main_images/thumbs/{{ $project->main_image }}" alt="{{ $project->name}}">
									</a>
									<h4 class="text-center" style="color:black">{{ $project->name}}</h4>
									<div class="text-center" style="color:black"><strong>Category</strong> : {{ $project->category->name }}</div>
									<div class="text-center" style="color:black"><strong>Views</strong> : {{ $project->views }}</div>
									<div class="text text-center">
										<span class="badge text text-center" style="color:black">
											@if(count($project->projectImages) > 0)
												{{ count($project->projectImages) }} 
												{{ count($project->projectImages) > 1 ? 'images' : 'image' }}
											@else
												No Images
											@endif
										</span>
									</div>
									{{-- <div class="caption text-center">
										<h3></h3>
										<p class="label label-default">{{ $project->category->name }}</p>
										<p class="badge">
											@if(count($project->projectImages) > 0)
												{{ count($project->projectImages) }} 
													@if(count($project->projectImages) > 1)
														images
													@else
														image
													@endif
												
											@endif
										</p>

									</div> --}}
										{{-- <a href="{{ route('backend.photos.create', $album->id) }}" class="btn btn-xs btn-primary">Add Photo</a>
										{!! Form::open(['action' => ['Backend\AlbumsController@destroy', $album->id], 'method'=>'POST', 'style'=>'display:inline;', 'onsubmit' => 'return confirm("Are you sure you want to delete the Album AND all photos in it?")']) !!}
											{{ Form::hidden('_method', 'DELETE') }}
											{!! Form::submit('Delete Album', ['class'=>'btn btn-xs btn-danger pull-right']) !!}
										{!! Form::close() !!} --}}
								</div>
							</div>
						 @endforeach
					 </div>
				@endforeach

			@else
				<p>No projects found</p>
			@endif
		</div>
		<div class="panel-footer">
			Click a project to view it's details
		</div>

		<div style="margin-top: 7px; margin-bottom: 7px;">
			{{ $projects->links('vendor.pagination.custom') }}
		</div>

	</div>

@endsection

@auth
	@section('blocks')
		@include('woodProjects.index.controls')
	@endsection
@endauth