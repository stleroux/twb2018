@extends('layouts.app')

@section('title','Albums')

@section('stylesheets')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Albums</span></li>
@stop

@section('content')

	@if(count($albums) > 0)
		{{-- <div class="panel panel-default panel-transparent panel-borderless"> --}}
			<div class="panel panel-default">

			<div class="panel-heading">
				<h4 class="panel-title">Albums</h4>
			</div>

			<div class="panel-body" style="padding-bottom:0px">
				@foreach ($albums->chunk(4) as $chunk)
					<div class="row display-flex">
						@foreach ($chunk as $album)
							<div class="col-xs-12 col-sm-3">
								<div class="panel panel-primary" style="margin-bottom:0px">
									<div class="panel-heading">
										<h4 class="panel-title text-center">{{ $album->name}}</h4>
									</div>
									<div class="panel-body">
										<div class="thumbnail" style="margin-bottom:0px">
											@if(Auth::check())
												<a href="/albums/{{ $album->id }}" class="album" style="margin-bottom:10px">
											@endif
													<img src="/_albums/cover_images/thumbs/{{ $album->cover_image }}" alt="{{ $album->name}}">
											@if(Auth::check())
												</a>
											@endif
											{{-- <div class="caption"><h3>Thumbnail label</h3></div> --}}
											<p class="text text-center">
												<span class="badge text text-center">
													@if(count($album->photos) > 0)
														{{ count($album->photos) }}
															@if(count($album->photos) > 1)
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
									<div class="panel-footer text-center">{{ $album->description }}</div>
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

		<div class="row">
			@include('common.view_more', ['message'=>'If you would like to see the pictures within the Albums'])
		</div>
	@else
		@include('common.noRecordsFound')
	@endif



@endsection


{{-- <div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Albums</div>
			</div>
			<div class="panel-body">
				@foreach ($albums->chunk(4) as $chunk)
					<div class="row display-flex">
						@foreach ($chunk as $album)
							<div class="col-xs-12 col-sm-3">
								<div class="thumbnail">
									<a href="/albums/{{ $album->id }}" class="album">
										<img src="/_albums/cover_images/thumbs/{{ $album->cover_image }}" alt="{{ $album->name}}">
									</a>
									<h3 class="text-center">{{ $album->name}}</h3>
									<p class="text text-center">
										<span class="badge text text-center">
											@if(count($album->photos) > 0)
												{{ count($album->photos) }} 
													@if(count($album->photos) > 1)
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
		</div> --}}