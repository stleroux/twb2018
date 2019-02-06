@extends('backend.layouts.app')

@section ('title','Edit Gallery')

@section ('stylesheets')
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
	{!! Form::model($gallery, ['route'=>['backend.gallery.update', $gallery->id], 'method' => 'PUT']) !!}
		{{-- <input type="hidden" value="{{ $ref }}" name="ref" size="50"/> --}}

		<div class="panel text-right">
			<a href="{{ route('backend.gallery.list') }}" class="btn btn-default">Cancel</a>
			{{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Gallery Details</strong></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							{!! Form::label("name", "Name", ['class'=>'required']) !!}
							{!! Form::text("name", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	{!! Form::close() !!}
@stop

@section ('scripts')
{{--   <script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script>
	<script>
		$("#datetime").datetimepicker({
			step: 30,
			showOn: 'button',
			buttonImage: '',
			buttonImageOnly: true,
			format:'Y-m-d H:i',
			lang:'ru'
		});
	</script> --}}
@stop

	

