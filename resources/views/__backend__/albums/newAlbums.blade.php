@extends('backend.layouts.app')

@section('title','New Albums')

@section('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.albums.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li class="active"><span>New Albums</span></li>
@stop

@section('content')

	@if(count($albums) > 0)
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">New Albums</div>
			</div>
			<div class="panel-body">
				@foreach ($albums->chunk(4) as $chunk)
					<div class="row display-flex">
						@foreach ($chunk as $album)
							<div class="col-xs-12 col-sm-3">
								<div class="thumbnail">
									<a href="/backend/albums/{{ $album->id }}" class="album">
										<img src="/_albums/cover_images/thumbs/{{ $album->cover_image }}" alt="{{ $album->name}}">
									</a>
									<p><h3 class="text-center">{{ $album->name}}</h3></p>
									{{-- <p class="text-center"><strong>Category</strong> : {{ $album->category->name }}</p> --}}
									<p class="text text-center">
										<span class="badge text text-center">
											@if(count($album->projectImages) > 0)
												{{ count($album->projectImages) }} 
													@if(count($album->projectImages) > 1)
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
				Click an album to view it's photos
			</div>
		</div>
	@else
		@include('common.noRecordsFound', ['name'=>'New Albums'])
	@endif

@endsection