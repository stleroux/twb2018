@extends('backend.layouts.app')

@section('title','Woodshop Projects')

@section('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.woodProjects.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li class="active"><span>Woodshop Projects</span></li>
@stop

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Woodshop Projects</div>
		</div>
		<div class="panel-body">
			@if(count($projects) > 0)

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
	</div>

@endsection