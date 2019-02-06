@include('common.controlCenterHeader')

   <a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
      <i class="fa fa-file-text-o" aria-hidden="true"></i>
      Articles
   </a>


   @if(checkACL('manager'))

      <form method="GET" action="{{ route('articles.restore', $article->id) }}" accept-charset="UTF-8" style="display:inline">
         {!! csrf_field() !!}
         <button
            class="btn btn-block btn-default"
            style="margin-top: 6px"
            type="button"
            data-toggle="modal"
            data-target="#restore">
            <i class="fa fa-arrow-up" aria-hidden="true"></i> Restore
         </button>
      </form>

      <form method="GET" action="{{ route('articles.publish', $article->id) }}" accept-charset="UTF-8" style="display:inline">
         {!! csrf_field() !!}
         <button
            class="btn btn-block btn-default"
            style="margin-top: 6px"
            type="button"
            data-toggle="modal"
            data-target="#publish">
            <i class="fa fa-edit" aria-hidden="true"></i> Publish
         </button>
      </form>

      <form method="POST" action="{{ route('articles.deleteTrashed', $article->id) }}" accept-charset="UTF-8" style="display:inline">
         <input type="hidden" name="_method" value="delete" />
         {!! csrf_field() !!}
         <button
            class="btn btn-block btn-danger"
            style="margin-top: 6px"
            type="button"
            data-toggle="modal"
            data-target="#delete">
            <i class="glyphicon glyphicon-trash"></i> Delete
         </button>
      </form>

   @endif

@include('common.controlCenterFooter')



      {{-- <button
         class="btn btn-default btn-block"
         type="submit"
         formaction="{{ route('articles.restoreAll') }}"
         formmethod="POST"
         id="bulk-restore"
         onclick="return confirm('Are you sure you want to restore this article?')">
            Restore
      </button> --}}

      {{-- <button
         class="btn btn-block btn-default"
         type="submit"
         formaction="{{ route('articles.publish', $article->id) }}"
         formmethod="POST"
         id="bulk-publish"
         onclick="return confirm('Are you sure you want to publish this article?')"
         data-toggle="modal"
         data-target="#publish"
         >
            <i class="fa fa-" aria-hidden="true"></i>
            Publish
      </button> --}}

            {{-- <button
         class="btn btn-block btn-danger"
         type="submit"
         formaction="{{ route('articles.deleteAll') }}"
         formmethod="POST"
         id="bulk-trash"
         onclick="return confirm('Are you sure you want to permanently delete this article?')">
            <i class="fa fa-" aria-hidden="true"></i>
            Delete
      </button> --}}