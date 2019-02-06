@extends('backend.layouts.app')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.galleries.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li class="active"><span>Photo Galleries</span></li>
@stop

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Photo Galleries</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-9">
					@if($galleries->count() > 0)
						<table class="table table-striped table-bordered table-responsive">
							<thead>
								<tr class="info">
									<th>Gallery Name</th>
									<th>N<sup>o</sup> of Images</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($galleries as $gallery)
								<tr>
									<td>
										<a
											href="{{ route('backend.gallery.view', $gallery->id) }}"
											title="View gallery">
											{{ $gallery->name}}
										</a>
									</td>
									<td>{{ $gallery->images()->count() }}</td>
									<td>
										<div class="pull-right">

											
											
											<a
												href="{{ route('backend.gallery.view', $gallery->id) }}"
												class="btn btn-xs btn-default"
												title="Add Images">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
											</a>

											<a
												href="{{ route('backend.gallery.edit', $gallery->id) }}"
												class="btn btn-xs btn-primary">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>

											<form action="{{ route('backend.gallery.delete', $gallery->id) }}" method="POST" style="display:inline;"
							                    onclick="return confirm('Are you sure you want to delete this gallery and all its images?')">
							                    <input type="hidden" name="_method" value="DELETE">
							                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							                    <button class="btn btn-xs btn-danger" title="Trash gallery">
							                      <i class="fa fa-trash-o" aria-hidden="true"></i>
							                    </button>
							                  </form>

										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div>

				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">Add Gallery</div>
						</div>
						<div class="panel-body">
							
							<form class="form" method="POST" action="{{ route('backend.gallery.save') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="form-group">
									<input type="text" name="gallery_name" id="gallery_name" placeholder="Name of Gallery" class="form-control" value="{{ old('gallery_name') }}">
								</div>

								<button class="btn btn-primary">Save</button>
							</form>
						</div>
						@if(count($errors) > 0)
							<div class="panel-footer">
								<div class="alert alert-danger">
									
										@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									
								</div>
							</div>
						@endif
					</div>

					
				</div>
			</div>
		</div>
	</div>

@endsection