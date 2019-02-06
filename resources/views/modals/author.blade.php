{{--
   AUTHOR MODAL
      - model
      - fn
--}}
{{-- {{ $field }} --}}
<div class="modal fade" id="view{{ $field }}Modal{{ $model->id}}" tabindex="-1" role="dialog" aria-labelledby="view{{ $field }}ModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
            
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="printModalLabel">
               @if($field == 'user')
                  Author Details
               @elseif($field == 'modifiedBy')
                  Updated By
               @elseif($field == 'lastViewedBy')
                  Last Viewed By
               @endif
            </h4>
         </div>

         <div class="modal-body">
            <div class="row center-block">
               <div class="col-xs-2">
                  @if($field === 'user')
                     @if($model->user->profile->image)
                        <img src="/_profiles/{{ $model->user->profile->image }}" height="100" width="100">
                     @else
                        <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                     @endif
                  @elseif($field == 'modifiedBy')
                     @if($model->modifiedBy->profile->image)
                        <img src="/_profiles/{{ $model->modifiedBy->profile->image }}" height="100" width="100">
                     @else
                        <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                     @endif
                  @elseif($field == 'lastViewedBy')
                     @if($model->lastViewedBy->profile->image)
                        <img src="/_profiles/{{ $model->lastViewedBy->profile->image }}" height="100" width="100">
                     @else
                        <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                     @endif
                  @else
                     <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                  @endif
               </div>

               <div class="col-xs-8 col-xs-offset-2">
                  <table class="table table-condensed table-hover">
                     <tr>
                        <th>Username</th>
                        <td>
                           @if($field == 'user')
                              {{ $model->user->username }}
                           @elseif($field == 'modifiedBy')
                              {{ $model->modifiedBy->username }}
                           @elseif($field == 'lastViewedBy')
                              {{ $model->lastViewedBy->username }}
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th>First Name</th>
                        <td>
                           @if($field == 'user')
                              {{ $model->user->profile->first_name }}
                           @elseif($field == 'modifiedBy')
                              {{ $model->modifiedBy->profile->first_name }}
                           @elseif($field == 'lastViewedBy')
                              {{ $model->lastViewedBy->profile->first_name }}
                           @endif

                        </td>
                     </tr>
                     <tr>
                        <th>Last Name</th>
                        <td>
                           @if($field == 'user')
                              {{ $model->user->profile->last_name }}
                           @elseif($field == 'modifiedBy')
                              {{ $model->modifiedBy->profile->last_name }}
                           @elseif($field == 'lastViewedBy')
                              {{ $model->lastViewedBy->profile->last_name }}
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th>Email Address</th>
                           @if($field == 'user')
                              @if($model->user->public_email === 1)
                                 <td>{{ $model->user->email }}</td>
                              @else
                                 <td>*************************</td>
                              @endif
                           @elseif($field == 'modifiedBy')
                              @if($model->modifiedBy->public_email === 1)
                                 <td>{{ $model->modifiedBy->email }}</td>
                              @else
                                 <td>*************************</td>
                              @endif
                           @elseif($field == 'lastViewedBy')
                              @if($model->lastViewedBy->public_email === 1)
                                 <td>{{ $model->lastViewedBy->email }}</td>
                              @else
                                 <td>*************************</td>
                              @endif
                           @endif
                     </tr>
                     <tr>
                        <th>Member Since</th>
                        <td>
                            @if($field == 'user')
                              @if($model->user->created_at)
                                 {{ $model->user->created_at->format('M d, Y') }}
                              @else
                                 Unknown
                              @endif
                           @elseif($field == 'modifiedBy')
                              @if($model->modifiedBy->created_at)
                                 {{ $model->modifiedBy->created_at->format('M d, Y') }}
                              @else
                                 Unknown
                              @endif
                           @elseif($field == 'lastViewedBy')
                              @if($model->lastViewedBy->created_at)
                                 {{ $model->lastViewedBy->created_at->format('M d, Y') }}
                              @else
                                 Unknown
                              @endif
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