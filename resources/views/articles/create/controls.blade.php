@include('common.controlCenterHeader')

	{{-- {{ Session::get('backURL') }} --}}
	{{-- @if(Session::get('backURL') == "articles.index") --}}
		<a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
			<i class="fa fa-file-text-o" aria-hidden="true"></i>
			Back
		</a>
	{{-- @endif --}}

	{{ Form::button('<i class="fa fa-save"></i> Save Article', ['type'=>'submit', 'class'=>'btn btn-success btn-block']) }}
	{{-- {{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-default btn-block']) }} --}}
		
@include('common.controlCenterFooter')