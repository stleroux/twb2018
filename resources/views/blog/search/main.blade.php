<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-newspaper-o" aria-hidden="true"></i>
			Blog Search Results
		</h3>
	</div>
	<div class="panel-body">
		@if (count($posts) > 0)
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-responsive">
						<thead>
							<th>Title</th>
							<th>Body</th>
							<th>Created At</th>
						</thead>
						<tbody>
							@foreach ($posts as $post)
								<tr>
									<td><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></td>
									<td>{!! substr($post->body, 0, 75) !!} {{ strlen($post->body) > 75 ? " ..." : "" }}</td>
									<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<!-- Display pagination links -->
					<div class="text-center">{!! $posts->render() !!}</div>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-md-12">
					<p class="text text-danger">No results found</p>
				</div>
			</div>
		@endif
	</div>
</div>