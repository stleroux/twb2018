<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-newspaper-o" aria-hidden="true"></i>
         Modules
      </h4>
   </div>

   <div class="list-group">

      <a href="{{ route('backend.posts.newPosts') }}" class="list-group-item {{ Nav::isRoute('backend.posts.newPosts') }}">
         <i class="fa fa-newspaper-o" aria-hidden="true"></i>
         New Posts
         <div class="badge pull-right">
            {{ App\Post::newPosts()->count() }}
         </div>
      </a>

      <a href="{{ route('backend.posts.index') }}"
         class="list-group-item
            {{ Nav::isRoute('backend.posts.index') }}
            {{ Nav::isRoute('backend.posts.edit') }}
            {{ Nav::isRoute('backend.posts.show') }}">
         <i class="fa fa-newspaper-o" aria-hidden="true"></i>
         Posts
         <div class="badge pull-right">
            {{ App\Post::count() }}
         </div>
      </a>

      <a href="{{ route('backend.posts.create') }}" class="list-group-item {{ Nav::isRoute('backend.posts.create') }}">
         <i class="fa fa-plus-square" aria-hidden="true"></i>
         Add Post
      </a>

   </div>

</div>