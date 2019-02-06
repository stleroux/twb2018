@include('common.controlCenterHeader')

	<a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Articles
	</a>

	{{ Form::button('<i class="fa fa-save"></i> Update ', ['type'=>'submit', 'class'=>'btn btn-block btn-primary']) }}
	
	{{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-block btn-default']) }}

@include('common.controlCenterFooter')