@include('common.controlCenterHeader')

	{{-- 	<a href="{{ route($ref) }}" class="btn btn-sm btn-block btn-default">Cancel</a> --}}

	{{ Form::button('<i class="fa fa-save"></i> Update ', ['type' => 'submit', 'class' => 'btn btn-sm btn-block btn-primary'])  }}
	{{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-sm btn-block btn-default']) }}

@include('common.controlCenterFooter')