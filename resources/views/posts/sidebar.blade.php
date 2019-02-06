<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-newspaper-o" aria-hidden="true"></i>
         Modules
      </h4>
   </div>

   <div class="list-group">

      <a href="{{ route('posts.newPosts') }}" class="list-group-item {{ Nav::isRoute('posts.newPosts') }}">
         <i class="fa fa-newspaper-o" aria-hidden="true"></i>
         New Posts
         <div class="badge pull-right">
            {{ App\Post::newPosts()->count() }}
         </div>
      </a>

      <a href="{{ route('posts.index') }}"
         class="list-group-item
            {{ Nav::isRoute('posts.index') }}
            {{ Nav::isRoute('posts.edit') }}
            {{ Nav::isRoute('posts.show') }}">
         <i class="fa fa-newspaper-o" aria-hidden="true"></i>
         Posts
         <div class="badge pull-right">
            {{ App\Post::count() }}
         </div>
      </a>

      <a href="{{ route('posts.create') }}" class="list-group-item {{ Nav::isRoute('posts.create') }}">
         <i class="fa fa-plus-square" aria-hidden="true"></i>
         Add Post
      </a>

   </div>

</div>