@include('common.controlCenterHeader')

	{{ Form::submit('Save', ['class'=>'btn btn-success btn-block']) }}
	{{-- <a href="{{ route($ref) }}" class="btn btn-sm btn-default btn-block">Cancel</a> --}}

   <a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
      <i class="fa fa-file-text-o" aria-hidden="true"></i>
      Back
   </a>

@include('common.controlCenterFooter')