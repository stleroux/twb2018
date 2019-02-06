<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-comments-o" aria-hidden="true"></i>
         Comments
      </h4>
   </div>

   <div class="list-group">

      <a href="{{ route('backend.comments.newComments') }}"
         class="list-group-item {{ Nav::isRoute('backend.comments.newComments') }}">
         <i class="fa fa-comments-o" aria-hidden="true"></i>
         New Comments
         <div class="badge pull-right">
            {{ App\Comment::newComments()->count() }}
         </div>
      </a>

      <a href="{{ route('backend.comments.index') }}"
         class="list-group-item
            {{ Nav::isRoute('backend.comments.index') }}
            {{ Nav::isRoute('backend.comments.edit') }}
            {{ Nav::isRoute('backend.comments.show') }}">
         <i class="fa fa-comments-o" aria-hidden="true"></i>
         Comments
         <div class="badge pull-right">
            {{ App\Comment::count() }}
         </div>
      </a>

{{--       <a href="{{ route('backend.comments.create') }}" class="list-group-item {{ Nav::isRoute('backend.comments.create') }}">
         <i class="fa fa-plus-square" aria-hidden="true"></i>
         Add Comment
      </a> --}}

   </div>

</div>