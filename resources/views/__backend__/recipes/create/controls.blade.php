@include('common.controlCenterHeader')

	{{-- Pass along the ROUTE value of the previous page --}}
	{{-- @php
		$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
	@endphp --}}

	{{ Form::submit('Save', ['class'=>'btn btn-sm btn-success btn-block']) }}
	{{-- <a href="{{ route($ref) }}" class="btn btn-sm btn-default btn-block">Cancel</a> --}}

@include('common.controlCenterFooter')