@include('common.controlCenterHeader')
		
	{{ Form::button('<i class="fa fa-save"></i> Update ', ['type'=>'submit', 'class'=>'btn btn-sm btn-block btn-primary']) }}
	
	{{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-sm btn-block btn-default']) }}

{{-- 	<a href="" class="btn btn-sm btn-block btn-default">
		<i class="fa fa-undo" aria-hidden="true"></i>
		Reload Data
	</a> --}}

{{--       <a href="{{ route('backend.articles.index') }}" class="btn btn-sm btn-block btn-default">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Articles
	</a> --}}

@include('common.controlCenterFooter')