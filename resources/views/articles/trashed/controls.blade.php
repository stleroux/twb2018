@include('common.controlCenterHeader')

   <a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
      <i class="fa fa-file-text-o" aria-hidden="true"></i>
      Articles
   </a>


   @if(checkACL('manager'))

      <br id="bulk-space" style="display:none;" />

      <button
         class="btn btn-default btn-block"
         type="submit"
         formaction="{{ route('articles.restoreAll') }}"
         formmethod="POST"
         id="bulk-restore"
         style="display:none; margin-left:2px"
         onclick="return confirm('Are you sure you want to restore the selected articles?')">
            Restore Selected
      </button>

      <button
         class="btn btn-block btn-default"
         type="submit"
         formaction="{{ route('articles.publishAll') }}"
         formmethod="POST"
         id="bulk-publish"
         style="display:none; margin-left:2px"
         onclick="return confirm('Are you sure you want to publish the selected articles?')">
            <i class="fa fa-" aria-hidden="true"></i>
            Publish Selected
      </button>

      <button
         class="btn btn-block btn-danger"
         type="submit"
         formaction="{{ route('articles.deleteAll') }}"
         formmethod="POST"
         id="bulk-trash"
         style="display:none; margin-left:2px"
         onclick="return confirm('Are you sure you want to permanently delete the selected articles?')">
            <i class="fa fa-" aria-hidden="true"></i>
            Delete Selected
      </button>

   @endif

@include('common.controlCenterFooter')
