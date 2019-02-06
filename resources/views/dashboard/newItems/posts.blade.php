<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-newspaper-o" aria-hidden="true"></i>
			Posts
		</div>
	</div>
	
	<div class="panel-body">
		@if($newPosts->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Created By</th>
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newPosts as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td>{{ $post->user->username }}</td>
							<td>@include('common.dateFormat', ['model'=>$post, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
