@if($articles->count())
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<a data-toggle="collapse" href="#articles" style="display: block; text-decoration: none;">
					<i class="fa fa-bar-chart" aria-hidden="true"></i>
					Articles
					<span class="badge pull-right">
						<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
						<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
					</span>
				</a>
			</div>
		</div>
		
		<div id="articles" class="panel-collapse collapse">
			<div class="panel-body">
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>Title</th>
							<th>Created By</th>
							<th>Created On</th>
						</tr>
					</thead>
					<tbody>
						@foreach($articles as $article)
							<tr>
								<td>{{ $article->title }}</td>
								<td>{{ $article->user->username }}</td>
								<td>@include('common.dateFormat', ['model'=>$article, 'field'=>'created_at'])</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endif