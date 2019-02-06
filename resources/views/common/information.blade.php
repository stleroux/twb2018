<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-info-circle" aria-hidden="true"></i>
			{{ ucfirst($title) }} Information
		</h3>
	</div>
	<div class="panel-body">
		<table class="table table-condensed table-hover" style="margin-bottom: 0px">

				<tr>            
					<th>Created By</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'user_id'))
							@if($model->user_id)
								@include('common.authorFormat', ['model'=>$model, 'field'=>'user'])
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

			
				<tr>
					<th>Created On</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'created_at'))
							@if($model->created_at)
								@include('common.dateFormat', ['model'=>$model, 'field'=>'created_at'])
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

			
				<tr>
					<th>Updated By</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'modified_by_id'))
							@if($model->modified_by_id)
								@include('common.authorFormat', ['model'=>$recipe, 'field'=>'modifiedBy'])
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

			
				<tr>
					<th>Updated On</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'updated_at'))
							@if($model->updated_at)
								@include('common.dateFormat', ['model'=>$model, 'field'=>'updated_at'])
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

			
				<tr>
					<th>Last Viewed By</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'last_viewed_by_id'))
							@if($model->last_viewed_by_id)
								@include('common.authorFormat', ['model'=>$recipe, 'field'=>'lastViewedBy'])
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

			
				<tr>
					<th>Last Viewed On</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'last_viewed_on'))
							@if($model->last_viewed_on)
								@include('common.dateFormat', ['model'=>$recipe, 'field'=>'last_viewed_on'])
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

			
				<tr>
					<th>Publish(ed) On</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'published_at'))
							@if($model->published_at)
								@include('common.dateFormat', ['model'=>$model, 'field'=>'published_at'])
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

			
				<tr>
					<th>Views</th>
					<td>
						@if(Schema::hasColumn(str_plural($title), 'views'))
							@if($model->views)
								{{ $model->views }}
							@else
								N/A
							@endif
						@else
							Not Tracked
						@endif
					</td>
				</tr>

		</table>
	</div>
</div>