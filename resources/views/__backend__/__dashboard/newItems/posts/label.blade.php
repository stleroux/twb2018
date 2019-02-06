@if($posts->count())
   <li class="label label-default">
      <div style="padding: 5px">{{ $posts->count() }} Posts</div>
   </li>
@endif