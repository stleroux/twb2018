@if($categories->count())
   <div class="panel panel-default">
      <div class="panel-heading">
         <div class="panel-title">
            <a data-toggle="collapse" href="#categories" style="display: block; text-decoration: none;">
               <i class="fa fa-bar-chart" aria-hidden="true"></i>
               Categories
               <span class="badge pull-right">
                  <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
               </span>
            </a>
         </div>
      </div>
      
      <div id="categories" class="panel-collapse collapse">
         <div class="panel-body">
            <table class="table table-condensed table-hover">
               <thead>
                  <tr>
                     <th>Name</th>
                     {{-- <th>Created By</th> --}}
                     <th>Created On</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($categories as $category)
                     <tr>
                        <td>{{ $category->name }}</td>
                        {{-- <td>{{ $category->user->username }}</td> --}}
                        <td>@include('common.dateFormat', ['model'=>$category, 'field'=>'created_at'])</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endif