<div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">
         <i class="fa fa-file-text-o" aria-hidden="true"></i>
         Article Archives
      </h3>
   </div>
   <div class="panel-body">
      @if(count($articlelinks) > 0)
         <ul class="list-group">
            @foreach($articlelinks as $alink)
               <a href="{{ route('articles.archive', ['year'=>$alink->year, 'month'=>$alink->month]) }}" class="list-group-item">{{ $alink->month_name }} - {{ $alink->year }} <span class="badge">{{ $alink->article_count }}</span></a>
            @endforeach
         </ul>
      @else
         <div class="text text-center">No Data Available</div>
      @endif
   </div>
</div>