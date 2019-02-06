<div class="panel panel-primary">
   <div class="panel-heading">
      <h3 class="panel-title">
         <i class="fa fa-bars" aria-hidden="true"></i>
         Description (Fre)
      </h3>
   </div>
   <div class="panel-body">
      @if(checkACL('author'))
         {!! $article->description_fre !!}
      @else
         {!! str_limit($article->description_fre, $limit = 125, $end = ' [More...]') !!}
      @endif
   </div>
</div>
