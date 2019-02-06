<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-comments-o" aria-hidden="true"></i>
			Comments <small>({{ $article->comments()->count() }} total)</small>
		</h3>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			@if($article->comments->count())
				<thead>
					<tr>
						<th class="col-xs-2">Name</th>
						<th>Comment</th>
						<th class="col-xs-2">Posted On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($article->comments as $comment)
						<tr>
							<td>@include('common.authorFormat', ['model'=>$comment, 'field'=>'user'])</td>
							<td>{{ $comment->comment }}</td>
							<td>@include('common.dateFormat', ['model'=>$comment, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			@else
				No comments found
			@endif
		</table>
	</div>
</div>