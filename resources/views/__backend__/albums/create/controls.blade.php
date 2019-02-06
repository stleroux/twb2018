@include('common.controlCenterHeader')

	{{-- <a href="{{ route('backend.albums.index') }}" class="btn btn-sm btn-default btn-block">Back to Albums</a> --}}
	{{ Form::button('<i class="fa fa-save"></i> Save Album', ['type'=>'submit', 'class'=>'btn btn-sm btn-block btn-success']) }}
	{{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-sm btn-block btn-default']) }}

	{{-- <a href="{{ route('backend.albums.index') }}" class="btn btn-default">Cancel</a> --}}

@include('common.controlCenterFooter')