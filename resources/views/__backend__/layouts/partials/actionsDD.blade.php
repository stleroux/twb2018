{{-- Displays the Actions Dropdown menu --}}
<div class="btn-group selectmenu">
   
   {{-- Default Action is VIEW --}}
   <button type="button" class="btn btn-sm btn-default">
      <a href="{{ route($name.'.show', $model->id) }}" style="text-decoration: none;">View</a>
   </button>
   
   <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
   </button>

   <ul class="dropdown-menu dropdown-menu-right">
      
      {{-- ADD / REMOVE FAVORITES --}}
      @if(checkACL('user'))
         @if($model->published_at <= Carbon\Carbon::Now())
            @if(in_array('favorites', $params))
               @if(count($model->favorites))
                  <li>
                     <a href="{{ route($name.'.removeFavorite', $model->id) }}">
                        <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                        Remove from Favorites
                     </a>
                  </li>
               @else
                  <li>
                     <a href="{{ route($name.'.addFavorite', $model->id) }}" class="text text-success">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        Add to Favorite
                     </a>
                  </li>
               @endif
            @endif
         @endif
      @endif

      {{-- CHANGE USER PASSWORD --}}
      @if(checkACL('manager'))
         @if(in_array('changePwd', $params))
            <li>
               <a href="{{ route($name.'.changePwd', $model->id) }}">
                  <span class='text text-primary'>
                     <i class="fa fa-key" aria-hidden="true"></i>
                     <strong> Reset Pwd</strong>
                  </span>
               </a>
            </li>
         @endif
      @endif

      {{-- DUPLICATE --}}
      @if((checkACL('author')) || (checkOwner($model)))
         @if(in_array('duplicate', $params))
            <li>
               <a href="{{ route($name.'.duplicate', $model->id) }}">
                  <i class="fa fa-clone" aria-hidden="true"></i> 
                  Duplicate
               </a>
            </li>
         @endif
      @endif

      {{-- PRINT --}}
      @if(checkACL('manager'))
         @if(in_array('print', $params))
            <li>
               <a href="" type="button" class="" data-toggle="modal" data-target="#printModal">
                  <div class="text text-left">
                     <i class="fa fa-print" aria-hidden="true"></i> Print
                  </div>
               </a>
            </li>
         @endif
      @endif

      {{-- PUBLISH / UNPUBLISH --}}
      {{-- @if((checkACL('publisher')) || (checkOwner($model))) --}}
      @if(checkACL('publisher'))
         @if(in_array('publish', $params))
            <li>
               {{-- Handle future publish dates --}}
               @if($model->published_at >= Carbon\Carbon::Now())
                  <a href="{{ route($name.'.publish', $model->id) }}">
                     <i class="fa fa-book" aria-hidden="true"></i>
                     Publish Now
                  </a>
               @else
                  @if($model->published_at)
                     <a href="{{ route($name.'.unpublish', $model->id) }}">
                        <i class="fa fa-window-close-o" aria-hidden="true"></i>
                        Unpublish                     
                     </a>
                  @else
                     <a href="{{ route($name.'.publish', $model->id) }}">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        Publish
                     </a>
                  @endif
               @endif
            </li>
         @endif
      @endif

      {{-- RESET VIEW COUNT --}}
      @if(checkACL('admin'))
         @if(in_array('resetViewsCount', $params))
            <li>
               <a href="{{ route($name.'.resetViews', $model->id) }}">
                  <i class="fa fa-eye-slash" aria-hidden="true"></i>
                  Reset Views Count
               </a>
            </li>
         @endif
      @endif

      {{-- @if(
            (in_array('resetViewCount', $params)) ||
            (in_array('publish', $params)) ||
            (in_array('duplicate', $params)) ||
            (in_array('changePwd', $params)) ||
            (in_array('favorites', $params))
         )
         <li role="separator" class="divider"></li>
      @endif --}}

      {{-- EDIT --}}
      @if((checkACL('editor')) || (checkOwner($model)))
         @if(in_array('edit', $params))
            <li>
               <a href="{{ route($name.'.edit', $model->id) }}">
                  <span class='text text-primary'>
                     <i class="fa fa-pencil-square-o fa-custom" aria-hidden="true"></i>
                     <strong> Edit</strong>
                  </span>
               </a>
            </li>
         @endif
      @endif

      {{-- RESTORE --}}
      @if(checkACL('manager'))
         @if((in_array('restore', $params)) && ($model->deleted_at))
            <li>
               <a href="{{ route($name.'.restore', $model->id) }}">
                  <i class="fa fa-undo fa-custom" aria-hidden="true"></i>
                  <strong> Restore \ Undelete</strong>
               </a>
            </li>
         @endif
      @endif

      <!-- TRASH -->
      @if((checkACL('manager')) || (checkOwner($model)))
         @if(in_array('trash', $params))
            <li data-form="#frmDelete-{{$model->id}}" data-title="Trash this {{ str_singular($name) }}?" data-message="Are you sure you want to delete this {{ str_singular($name) }}?">
               <a class="formConfirm" href="">
                  <span class='text text-danger'>
                     <i class="fa fa-trash-o fa-custom" aria-hidden="true"></i>
                     <strong> Trash</strong>
                  </span>
               </a>
            </li>
            {{ Form::open(
                  array('url' => route($name.'.destroy', array($model->id)),
                        'method' => 'delete', 'style' => 'display:none', 'id' => 'frmDelete-' . $model->id
                  )
               )
            }}
               {{ Form::submit('Submit') }}
            {{ Form::close() }}
         @endif
      @endif

      <!-- DELETE -->
      @if(checkACL('admin'))
         @if(in_array('delete', $params))
            <li role="separator" class="divider"></li>
            <li data-form="#frmDelete-{{$model->id}}" data-title="Permanently Delete this {{ str_singular($name) }}?" data-message="Are you sure you want to <strong>permanently delete</strong> this {{ str_singular($name) }}?" >
               <a class="formConfirm" href="">
                  <span class='text text-danger'>
                     <i class="fa fa-eraser fa-custom" aria-hidden="true"></i>
                     <strong> Delete</strong>
                  </span>
               </a>
            </li>
            {{ Form::open(
                  array('url' => route($name.'.deleteTrashed', array($model->id)),
                        'method' => 'delete', 'style' => 'display:none', 'id' => 'frmDelete-' . $model->id
                  )
               )
            }}
               {{ Form::submit('Submit') }}
            {{ Form::close() }}
         @endif
      @endif

   </ul>
</div>

{{--
NOTES
Restore and Permanent delete can only be used on the Trashed table at the moment
If you try to Permanently delete a row from a table with soft deletes enabled, the record gets soft deleted instead of force delete
--}}
