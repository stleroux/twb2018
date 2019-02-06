<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-file-text-o" aria-hidden="true"></i>
			Articles
		</div>
	</div>
	
	<div class="panel-body">
		@if($newArticles->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Created By</th>
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newArticles as $article)
						<tr>
							<td>{{ $article->title }}</td>
							<td>{{ $article->user->username }}</td>
							<td>@include('common.dateFormat', ['model'=>$article, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
