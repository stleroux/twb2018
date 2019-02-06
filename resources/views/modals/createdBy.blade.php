{{--
   AUTHOR MODAL
      - model
--}}

<div class="modal fade" id="viewCreatedByModal{{ $model->id}}" tabindex="-1" role="dialog" aria-labelledby="viewCreatedByModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
            
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="printPostModalLabel">Created By</h4>
         </div>

         <div class="modal-body">
            <div class="row center-block">
               <div class="col-xs-2">
                  @if($model->user->profile->image)
                     <img src="/_profiles/{{ $model->user->profile->image }}" height="100" width="100">
                  @else
                     <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                  @endif
               </div>
               <div class="col-xs-8 col-xs-offset-2">
                  <table class="table table-condensed table-hover">
                     <tr>
                        <th>Username</th>
                        <td>{{ $model->user->username }}</td>
                     </tr>
                     <tr>
                        <th>First Name</th>
                        <td>{{ $model->user->profile->first_name }}</td>
                     </tr>
                     <tr>
                        <th>Last Name</th>
                        <td>{{ $model->user->profile->last_name }}</td>
                     </tr>
                     <tr>
                        <th>Email Address</th>
                        @if($model->user->public_email === 1)
                           <td>{{ $model->user->email }}</td>
                        @else
                           <td>*************************</td>
                        @endif
                     </tr>
                     <tr>
                        <th>Member Since</th>
                        <td>
                        @if($model->user->created_at)
                           {{ $model->user->created_at->format('M d, Y') }}
                        @else
                           Unknown
                        @endif
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
         
      </div>
   </div>
</div>