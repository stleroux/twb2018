@include('common.controlCenterHeader')

   {{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')) }}

   @if(Session::get('backURL'))
      <a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
         <i class="fa fa-file-text-o" aria-hidden="true"></i>
         Recipes List
      </a>
   @endif

   @if(Session::get('fullURL'))
      <a href="{{ URL( Session::get('fullURL') ) }}" class="btn btn-default btn-block">
         <i class="fa fa-file-text-o" aria-hidden="true"></i>
         Previous
      </a>
   @endif


@include('common.controlCenterFooter')