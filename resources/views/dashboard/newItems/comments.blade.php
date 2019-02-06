<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-comments-o" aria-hidden="true"></i>
			Comments
		</div>
	</div>
	
	<div class="panel-body">
		@if($newComments->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newComments as $comment)
						<tr>
							<td>{{ $comment->user->username }}</td>
							<td>{{ $comment->user->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td nowrap="nowrap">@include('common.dateFormat', ['model'=>$comment, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
