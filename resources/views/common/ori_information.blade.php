<div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">
         <i class="fa fa-info-circle" aria-hidden="true"></i>
         {{ $title }} Information
      </h3>
   </div>
   <div class="panel-body">
      <table class="table table-condensed table-hover" style="margin-bottom: 0px">
         
         @if ($model->user_id)
            <tr>            
               <th>Created By</th>
               <td>@include('common.authorFormat', ['model'=>$model, 'field'=>'user'])</td>
            </tr>
         @endif

         @if ($model->created_at)
            <tr>
               <th>Created On</th>
               <td>@include('common.dateFormat', ['model'=>$model, 'field'=>'created_at'])</td>
            </tr>
         @endif

         @if ($model->modified_by_id)
            <tr>
               <th>Updated By</th>
               <td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'modifiedBy'])</td>
            </tr>
         @endif

         @if ($model->updated_at)
            <tr>
               <th>Updated On</th>
               <td>@include('common.dateFormat', ['model'=>$model, 'field'=>'updated_at'])</td>
            </tr>
         @endif

         @if ($model->last_viewed_by_id)
            <tr>
               <th>Last Viewed By</th>
               <td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'lastViewedBy']) </td>
            </tr>
         @endif

         @if ($model->last_viewed_on)
            <tr>
               <th>Last Viewed On</th>
               <td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'last_viewed_on']) </td>
            </tr>
         @endif

         @if ($model->published_at)
            <tr>
               <th>Published On</th>
               <td>@include('common.dateFormat', ['model'=>$model, 'field'=>'published_at'])</td>
            </tr>
         @endif

         @if ($model->views)
            <tr>
               <th>Views</th>
               <td>{{ $model->views }}</td>
            </tr>
         @endif

      </table>
   </div>
</div>