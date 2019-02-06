<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-info-circle" aria-hidden="true"></i>
			Post Information
		</h3>
	</div>
	<div class="panel-body">
		<table class="table table-condensed table-hover" style="margin-bottom: 0px">
			<tr>
				<th>Created By</th>
				<td>@include('common.authorFormat', ['model'=>$post, 'field'=>'user'])</td>
			</tr>
			<tr>
				<th>Created On</th>
				<td>@include('common.dateFormat', ['model'=>$post, 'field'=>'created_at'])</td>
			</tr>
			<tr>
				<th>Updated On</th>
				<td>@include('common.dateFormat', ['model'=>$post, 'field'=>'updated_at'])</td>
			</tr>
			<tr>
				<th>Published On</th>
				<td>@include('common.dateFormat', ['model'=>$post, 'field'=>'published_at'])</td>
			</tr>
			<tr>
				<th>Views</th>
				<td>{{ $post->views }}</td>
			</tr>
		</table>
	</div>
</div>