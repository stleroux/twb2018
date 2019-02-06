@extends ('layouts.print')

@section ('title', 'Print Post')

@section ('content')

<div class="panel panel-default">
	<div class="panel-heading">From the Post list at TheWoodBarn.ca</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">{{ ucwords($post->title) }}</div>
					<div class="panel-body">
						<p class="lead">{!! $post->body !!}</p>
						<hr>
						<div class="tags">
							@foreach ($post->tags as $tag)
								<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Comments <small>({{ $post->comments()->count() }} total)</small></div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Comment</th>
									<th>Posted On</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($post->comments as $comment)
								<tr>
									<td>{{ $comment->name }}</td>
									<td>{{ $comment->email }}</td>
									<td>{{ $comment->comment }}</td>
									<td>@include('layouts.common.dateFormat', ['model'=>$comment, 'field'=>'created_at'])</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Details</div>
					<div class="panel-body">
						@if ($post->image)
							<dl class="dl-horizontal">
								<label>Image</label>
									<p>
										{{ Html::image("images/posts/" . $post->image, "",array('height'=>'75','width'=>'125')) }}
									</p>
							</dl>
						@endif

						<dl class="dl-horizontal">
							<label>Category:</label>
							{{ $post->category->name }}
						</dl>

						<dl class="dl-horizontal">
							<label>Created By:</label>
							@include('layouts.common.author', ['model'=>$post, 'field'=>'user'])
							
						</dl>

						<dl class="dl-horizontal">
							<label>Created At:</label>
							@include('layouts.common.dateFormat', ['model'=>$post, 'field'=>'created_at'])
						</dl>

						<dl class="dl-horizontal">
							<label>Modified By:</label>
							@include('layouts.common.author', ['model'=>$post, 'field'=>'modified_by'])
						</dl>

						<dl class="dl-horizontal">
							<label>Last Updated:</label>
							@include('layouts.common.dateFormat', ['model'=>$post, 'field'=>'updated_at'])
						</dl>
					</div>
				</div>
			</div>
		</div>



		</div>
</div>




	

@stop
