@include('common.controlCenterHeader')
		
{{-- 		<a href="/" class="btn btn-default btn-block">
			<i class="fa fa-home" aria-hidden="true"></i>
			Home
		</a> --}}

   <a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
      <i class="fa fa-file-text-o" aria-hidden="true"></i>
      Articles
   </a>

@include('common.controlCenterFooter')