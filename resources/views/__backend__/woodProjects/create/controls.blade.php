@include('common.controlCenterHeader')

	{{-- {{ Form::submit('Save', ['class'=>'btn btn-sm btn-success btn-block']) }} --}}
	{{ Form::button('<i class="fa fa-save"></i> Save Project', ['type'=>'submit', 'class'=>'btn btn-sm btn-block btn-success']) }}
	<a href="/backend/woodProjects/" class="btn btn-sm btn-default btn-block">Cancel</a>

@include('common.controlCenterFooter')