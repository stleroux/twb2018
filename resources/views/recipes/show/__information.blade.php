<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-info-circle" aria-hidden="true"></i>
			Information
		</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-condensed table-hover" style="margin-bottom: 0px">
			<tr>
				<th>Created By</th>
				{{-- <td>@include('common.createdBy', ['model'=>$recipe])</td> --}}
				<td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'user'])</td>
			</tr>
			<tr>
				<th>Created On</th>
				<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'created_at'])</td>
			</tr>

			@if ($recipe->modified_by_id)
				<tr>
					<th>Updated By</th>
					{{-- <td>@include('common.updatedBy', ['model'=>$recipe])</td> --}}
					<td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'modifiedBy'])</td>
				</tr>
				<tr>
					<th>Updated On</th>
					<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'updated_at'])</td>
				</tr>
			@endif

			@if ($recipe->last_viewed_by_id)
				<tr>
					<th>Last Viewed By</th>
					{{-- <td>@include('common.lastViewedBy', ['model'=>$recipe]) </td> --}}
					<td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'lastViewedBy']) </td>
				</tr>
				<tr>
					<th>Last Viewed On</th>
					<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'last_viewed_on']) </td>
				</tr>
			@endif
			{{-- <tr>
				<th>Creator</th>
				<td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'user']) </td>
			</tr>
			<tr>
				<th>Updator</th>
				<td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'modifiedBy']) </td>
			</tr>
			<tr>
				<th>Viewor</th>
				<td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'lastViewedBy']) </td>
			</tr> --}}
		</table>
	</div>
</div>