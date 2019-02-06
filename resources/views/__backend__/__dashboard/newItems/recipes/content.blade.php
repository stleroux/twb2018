@if($recipes->count())
   <div class="panel panel-default">
      <div class="panel-heading">
         <div class="panel-title">
            <a data-toggle="collapse" href="#recipes" style="display: block; text-decoration: none;">
               <i class="fa fa-bar-chart" aria-hidden="true"></i>
               Recipes
               <span class="badge pull-right">
                  <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
               </span>
            </a>
         </div>
      </div>
      
      <div id="recipes" class="panel-collapse collapse">
         <div class="panel-body">
            <table class="table table-condensed table-hover">
               <thead>
                  <tr>
                     <th>Title</th>
                     <th>Created By</th>
                     <th>Created On</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($recipes as $recipe)
                     <tr>
                        <td>{{ $recipe->title }}</td>
                        <td>{{ $recipe->user->username }}</td>
                        <td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'created_at'])</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endif