@if(count($posts) > 0)
	@foreach ($posts as $post)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-newspaper-o" aria-hidden="true"></i>
					{{ $post->title }}
				</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-1">
					@if ($post->user->image)
						{{ Html::image("images/profiles/" . $post->user->image, "",array('height'=>'60','width'=>'60')) }}
					@else
						<i class="fa fa-5x fa-user" aria-hidden="true"></i>
					@endif                  
				</div>
				<div class="col-md-9">
					<p>{!! substr(strip_tags($post->body), 0, 250) !!} {{ strlen(strip_tags($post->body)) > 250 ? ' [More]...' : '' }}</p>
				</div>
				<div class="col-md-2">
					<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-default">
						<div class="text text-left">
							<i class="fa fa-chevron-right" aria-hidden="true"></i> Read More
						</div>
					</a>
				</div>
			</div>
			<div class="panel-footer">
				Created by 
				@include('common.authorFormat', ['model'=>$post, 'field'=>'user'])
				on 
				@include('common.dateFormat', ['model'=>$post, 'field'=>'created_at'])
			</div>
		</div>
	@endforeach
	{{ $posts->links('vendor.pagination.custom') }}
	<br />
@else
	@include('common.noRecordsFound', ['color'=>'primary', 'name'=>'Blog Entries', 'icon'=>'newspaper-o'])
@endif