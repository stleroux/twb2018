@extends('backend.layouts.app')

@section('title','Show Post')

@section ('stylesheets')
@stop 

@section('sectionSidebar')
		@include('backend.posts.sidebar')
@stop

@section('breadcrumb')
	<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
	<li><a href="{{ route('backend.posts.index') }}">Posts</a></li>
	<li><span class="active">{{ ucwords($post->title) }}</span></li>
@stop

@section('menubar')
					<!-- Only show this button if coming from the search results page -->
					@if (false !== stripos($_SERVER['HTTP_REFERER'], "/search/posts"))
						<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
							<div class="text text-left">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Search Results
							</div>
						</a>
					@endif

					<!-- Only show this button if coming from the profile page -->
					@if (false !== stripos($_SERVER['HTTP_REFERER'], "/profile/".Auth::user()->id."/show"))
						{{-- <a href="{{ route('profile.show', Auth::user()->id) }}" class="btn btn-default btn-block">
							<div class="text text-left">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Profile
							</div>
						</a> --}}
						<a href="{{URL::route('profile.show', Auth::user()->id) . '#articles' }}" class="btn btn-default btn-xs">Back</a>
					@endif
					{{--================================================================================================================================--}}
					{{-- PRINT BUTTON                                                                                                                   --}}
					{{--================================================================================================================================--}}
						@if (checkACL('editor'))
							<a href="" type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#printPostModal">
								<div class="text text-left">
									<i class="fa fa-print" aria-hidden="true"></i> Print Post
								</div>
							</a>
						@endif
					{{--================================================================================================================================--}}
					{{-- END PRINT BUTTON                                                                                                               --}}
					{{--================================================================================================================================--}}

					{{--================================================================================================================================--}}
					{{-- INDEX BUTTON                                                                                                                   --}}
					{{--================================================================================================================================--}}
					<a href="{{ route('backend.posts.index') }}" class="btn btn-default btn-xs" >
						<div class="text text-left">
							<i class="fa fa-list"></i> Posts List
						</div>
					</a>
					{{--================================================================================================================================--}}
					{{-- END INDEX BUTTON                                                                                                               --}}
					{{--================================================================================================================================--}}
@stop

@section('content')

	 <div class="panel text-right">
			<a href="{{ route('backend.posts.index') }}" class="btn btn-default">Back</a>
	 </div>

	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ ucwords($post->title) }}
					{{-- @include('includes.frontend.buttons', ['model'=>$post, 'field'=>'posts', 'primer'=>'posts', 'actions'=>['list']]) --}}
				</div>
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
			
			@if($post->comments->count())
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
									@if(checkACL('author'))
										<th data-orderable="false"></th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach ($post->comments as $comment)
								<tr>
									<td>{{ $comment->name }}</td>
									<td>{{ $comment->email }}</td>
									<td>{{ $comment->comment }}</td>
									<td>@include('common.dateFormat', ['model'=>$comment, 'field'=>'created_at'])</td>
									@if(checkACL('author'))
									<td class="text-right">
										@include('backend.layouts.partials.actionsDD', [
											'model'=>$comment,
											'name'=>'comments',
											'params'=>['edit', 'delete']
										])
									</td>
								@endif
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>

		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Details</div>
				<div class="panel-body">
					@if ($post->image)
						<dl class="dl-horizontal">
							<label>Image</label>
								<p>
									<a href="" class="" data-toggle="modal" data-target="#viewPostImageModal">
										{{ Html::image("_posts/" . $post->image, "",array('height'=>'75','width'=>'125')) }}
									</a>
								</p>
						</dl>
					@endif

					<dl class="dl-horizontal">
						<label>Category:</label>
						{{ $post->category->name }}
					</dl>

					<dl class="dl-horizontal">
						<label>Created By:</label>
						@include('common.authorFormat', ['model'=>$post, 'field'=>'user'])
						
					</dl>

					<dl class="dl-horizontal">
						<label>Created At:</label>
						@include('common.dateFormat', ['model'=>$post, 'field'=>'created_at'])
					</dl>

					<dl class="dl-horizontal">
						<label>Modified By:</label>
						@include('common.authorFormat', ['model'=>$post, 'field'=>'modified_by'])
					</dl>

					<dl class="dl-horizontal">
						<label>Last Updated:</label>
						@include('common.dateFormat', ['model'=>$post, 'field'=>'updated_at'])
					</dl>
				</div>
			</div>
		</div>
	</div>

	{{-- PRINT MODAL --}}
	<div class="modal fade" id="printPostModal" tabindex="-1" role="dialog" aria-labelledby="printPostModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="favoritesModalLabel">Post Printing Instructions</h4>
				</div>
				<div class="modal-body">
					<p>To print this post, please use your browser's print functionality.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<span class="pull-right">
						<a href="{{-- {{ route('posts.print', $post->id) }} --}}" class="btn btn-default btn-block">
							<div class="text text-left">
									<i class="fa fa-print" aria-hidden="true"></i> Proceed
							</div>
						</a>
					</span>
				</div>
			</div>
		</div>
	</div>

	{{-- VIEW IMAGE MODAL --}}
	<div class="modal fade" id="viewPostImageModal" tabindex="-1" role="dialog" aria-labelledby="viewPostImageModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="viewPostImageModalLabel">Post Image</h4>
				</div>
				<div class="modal-body">
					<p>{{ Html::image("_posts/" . $post->image, "", array('height'=>'100%','width'=>'100%')) }}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@stop

@section ('scripts')
@stop 
