@if($users->count())
   <div class="panel panel-default">
      <div class="panel-heading">
         <div class="panel-title">
            <a data-toggle="collapse" href="#users" style="display: block; text-decoration: none;">
               <i class="fa fa-bar-chart" aria-hidden="true"></i>
               Users
               <span class="badge pull-right">
                  <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
               </span>
            </a>
         </div>
      </div>
      
      <div id="users" class="panel-collapse collapse">
         <div class="panel-body">
            <table class="table table-condensed table-hover">
               <thead>
                  <tr>
                     <th>Username</th>
                     {{-- <th>Created By</th> --}}
                     <th>Created On</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($users as $user)
                     <tr>
                        <td>{{ $user->username }}</td>
                        {{-- <td>{{ $user->user->username }}</td> --}}
                        <td>@include('common.dateFormat', ['model'=>$user, 'field'=>'created_at'])</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endif