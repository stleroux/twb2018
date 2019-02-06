{{--
   AUTHOR MODAL
      - model
--}}

<div class="modal fade" id="viewLastViewedByModal{{ $model->id}}" tabindex="-1" role="dialog" aria-labelledby="viewLastViewedByModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
            
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="printPostModalLabel">Last Viewed By</h4>
         </div>

         <div class="modal-body">
            <div class="row center-block">
               <div class="col-xs-2">
                  @if($model->user->profile->image)
                     <img src="/_profiles/{{ $model->lastViewedBy->profile->image }}" height="100" width="100">
                  @else
                     <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                  @endif
               </div>
               <div class="col-xs-8 col-xs-offset-2">
                  <table class="table table-condensed table-hover">
                     <tr>
                        <th>Username</th>
                        <td>{{ $model->lastViewedBy->username }}</td>
                     </tr>
                     <tr>
                        <th>First Name</th>
                        <td>{{ $model->lastViewedBy->profile->first_name }}</td>
                     </tr>
                     <tr>
                        <th>Last Name</th>
                        <td>{{ $model->lastViewedBy->profile->last_name }}</td>
                     </tr>
                     <tr>
                        <th>Email Address</th>
                        @if($model->lastViewedBy->public_email === 1)
                           <td>{{ $model->lastViewedBy->email }}</td>
                        @else
                           <td>*************************</td>
                        @endif
                     </tr>
                     <tr>
                        <th>Member Since</th>
                        <td>
                        @if($model->lastViewedBy->created_at)
                           {{ $model->lastViewedBy->created_at->format('M d, Y') }}
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