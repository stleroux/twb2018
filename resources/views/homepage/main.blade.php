@if(count($posts) > 0)
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-newspaper-o" aria-hidden="true"></i>
				Latest Posts
			</h3>
		</div>
		<div class="panel-body">
			@foreach ($posts as $post)
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">{{ $post->title }}</div>
					</div>
					<div class="panel-body">
						<div class="col-md-10">
							{{ substr(strip_tags($post->body), 0, 250) }} {{ strlen(strip_tags($post->body)) > 250 ? " [More]..." : "" }}
						</div>
						<div class="col-md-2">
							<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">
								<div class="text text-left">
									<i class="fa fa-chevron-right" aria-hidden="true"></i> Read More
								</div>
							</a>
						</div>
					</div>
					<div class="panel-footer">
						Created by 
						@include('common.authorFormat', ['model'=>$post, 'field'=>'user'])
						on @include('common.dateFormat', ['model'=>$post, 'field'=>'created_at'])
					</div>
				</div>
			@endforeach
		</div>
	</div>
@else
	@include('common.noRecordsFound', ['name'=>'Latest Posts', 'icon'=>'newspaper-o', 'color'=>'primary'])
@endif
