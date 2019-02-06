<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-sitemap" aria-hidden="true"></i>
         Categories
      </h4>
   </div>

   <div class="list-group">

      @if(App\Category::newCategories()->count() > 0)
      <a href="{{ route('categories.newCategories') }}" class="list-group-item {{ Nav::isRoute('categories.newCategories') }}">
         <i class="fa fa-sitemap" aria-hidden="true"></i>
         New Categories
         <div class="badge pull-right">
            {{ App\Category::newCategories()->count() }}
         </div>
      </a>
      @endif

      <a href="{{ route('categories.index') }}" class="list-group-item {{ Nav::isRoute('categories.index') }}">
         <i class="fa fa-sitemap" aria-hidden="true"></i>
         Categories
         <div class="badge pull-right">
            {{ App\Category::count() }}
         </div>
      </a>

   </div>

</div>
