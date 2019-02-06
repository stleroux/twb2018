@extends('backend.layouts.app')

@section('stylesheets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css" />
  <link href="/css/lightbox.min.css" rel="stylesheet">
@stop

@section('sectionSidebar')
	@include('backend.galleries.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.gallery.list') }}">Galleries</a></li>
	<li class="active"><span>Edit Gallery</span></li>
@stop

@section('content')

{{-- <style type="text/css">
	#gallery-images img {
		width: 200px;
		height: 120px;
		border: 2px solid black;
		margin-bottom: 10px;
	}
	#gallery-images ul {
		margin: 0;
		padding: 0;
	}
	#gallery-images li {
		margin: 0;
		padding: 0;
		list-style: none;
		float: left;
		padding-right: 10px;
	}
</style> --}}

	<div class="panel text-right">
		<a href="{{ route('backend.gallery.list') }}" class="btn btn-primary">Back</a>
    </div>

<div class="row">
	<div class="col-xs-12 col-sm-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">{{ $gallery->name }}</div>
			</div>
			<div class="panel-body">
				<div id="gallery-images">
					@foreach($gallery->images as $image)
						<div class="col-xs-6 col-sm-4 col-md-3">
							<a href="{{ url($image->file_path) }}" data-lightbox="mygallery" class="thumbnail">
								<img src="{{ url('/_gallery/images/thumbs/'. $image->file_name) }}" alt="">
							</a>
						</div>


						{{-- <div class="col-xs-6 col-sm-4 col-md-3">
							<div class="thumbnail">
								<img src="{{ url('/_gallery/images/thumbs/'. $image->file_name) }}" alt="">
								<div class="caption">
								
								<p>{{ $image->file_name }}</p>
								<p>
									<a href="#" class="btn btn-xs btn-primary" role="button">Button</a>
									<a href="#" class="btn btn-xs btn-default" role="button">Button</a>
								</p>
								</div>
							</div>
						</div> --}}
						
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Add Images</div>
			</div>
			<div class="panel-body">
				<form action="{{ route('backend.gallery.do-upload') }}"
					class="dropzone"
					id="addImages">

					{{ csrf_field() }}

					<input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
					
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
	<script src="/js/lightbox.min.js"></script>

	<script>
		Dropzone.options.addImages = {
			maxFilesize: 2,
			acceptedFiles: 'image/*',
			init: function() {
				this.on('success', function(){
					if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
						location.reload();
					}
				});
			},
			success: function(file, response) {
				if (file.status == 'success') {
					handleDropzoneFileUplaod.handleSuccess(response);
				} else {
					handleDropzoneFileUplaod.handleError(response);
				}
			},
		};

		var handleDropzoneFileUplaod = {
			handleError: function(response) {

			},

			handleSuccess: function(response) {
				var imageList = $('#gallery-images ul');
				var imageSrc = 'http://localhost:8000/' + response.file_path;
				//var thumbImageSrc = 'http://localhost:8000/gallery/images/thumbs/' + response.file_name;
				//var imageSrc = 'http://localhost:8000/gallery/images/thumbs/' + response.file_name;
				$(imageList).append('<li><a href="' + imageSrc + '"><img src="' + imageSrc + '"></a></li>');
			}
		}
	</script>
@endsection