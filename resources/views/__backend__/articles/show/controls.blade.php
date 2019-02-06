@include('common.controlCenterHeader')

	{{-- <a href="{{ route($ref) }}" class="btn btn-sm btn-block btn-default">
		Previous Page
	</a> --}}
	<a href="{{ url()->previous() }}" class="btn btn-sm btn-default btn-block">
		<i class="fa fa-undo" aria-hidden="true"></i>
		Back
	</a>
	
	{{-- ADD / REMOVE FAVORITES --}}
	@if(checkACL('user'))
		@if(($article->published_at <= Carbon\Carbon::Now()) && ($article->published_at != NULL))
			@if(count($article->favorites))
				<a href="{{ route('backend.articles.removeFavorite', $article->id) }}" class="btn btn-sm btn-default btn-block">
					<i class="fa fa-times-circle-o" aria-hidden="true"></i>
					Remove from Favorites
				</a>
			@else
				<a href="{{ route('backend.articles.addFavorite', $article->id) }}" class="btn btn-sm btn-default btn-block">
					<i class="fa fa-check-circle-o" aria-hidden="true"></i>
					Add to Favorite
				</a>
			@endif
		@endif
	@endif

	{{-- DUPLICATE --}}
	@if((checkACL('author')) || (checkOwner($article)))
		<a href="{{ route('backend.articles.duplicate', $article->id) }}" class="btn btn-sm btn-default btn-block">
			<i class="fa fa-clone" aria-hidden="true"></i> 
			Duplicate
		</a>
	@endif

	{{-- PRINT --}}
	@if(checkACL('manager'))
		<a href="" type="button" data-toggle="modal" data-target="#printModal" class="btn btn-sm btn-warning btn-block">
			<i class="fa fa-print" aria-hidden="true"></i> Print
		</a>
	@endif

	{{-- PUBLISH / UNPUBLISH --}}
	{{-- @if((checkACL('publisher')) || (checkOwner($article))) --}}
	@if(checkACL('publisher'))
		{{-- Handle future publish dates --}}
		@if($article->published_at >= Carbon\Carbon::Now())
			<a href="{{ route('backend.articles.publish', $article->id) }}" class="btn btn-sm btn-default btn-block">
				<i class="fa fa-book" aria-hidden="true"></i>
				Publish Now
			</a>
		@else
			@if($article->published_at)
				<a href="{{ route('backend.articles.unpublish', $article->id) }}" class="btn btn-sm btn-default btn-block">
					<i class="fa fa-window-close-o" aria-hidden="true"></i>
					Unpublish                     
				</a>
			@else
				<a href="{{ route('backend.articles.publish', $article->id) }}" class="btn btn-sm btn-default btn-block">
					<i class="fa fa-book" aria-hidden="true"></i>
					Publish
				</a>
			@endif
		@endif
	@endif

	{{-- RESET VIEW COUNT --}}
	@if(checkACL('admin'))
		<a href="{{ route('backend.articles.resetViews', $article->id) }}" class="btn btn-sm btn-default btn-block">
			<i class="fa fa-eye-slash" aria-hidden="true"></i>
			Reset Views Count
		</a>
	@endif

	{{-- EDIT --}}
	@if((checkACL('editor')) || (checkOwner($article)))
		<a href="{{ route('backend.articles.edit', $article->id) }}" class="btn btn-sm btn-default btn-block">
			<i class="fa fa-pencil-square-o fa-custom" aria-hidden="true"></i>
			Edit
		</a>
	@endif

	<!-- TRASH -->
	@if((checkACL('manager')) || (checkOwner($article)))
		@if(!$article->deleted_at)
			{{ Form::open(
					array('url' => route('backend.articles.destroy', array($article->id)),
							'method' => 'delete',
							'id' => 'frmDelete-' . $article->id,
							'onsubmit' => "return confirm('Are you sure you want to delete?')"
					)
				)
			}}
				<button type="submit" class="btn btn-sm btn-default btn-block" style="margin-top:5px">
					<i class="fa fa-trash-o fa-custom" aria-hidden="true"></i>
					Trash
				</button>
			{{ Form::close() }}
		@endif
	@endif

	{{-- RESTORE --}}
	@if(checkACL('manager'))
		@if($article->deleted_at)
			<a href="{{ route('backend.articles.restore', $article->id) }}" class="btn btn-sm btn-default btn-block">
				<i class="fa fa-undo fa-custom" aria-hidden="true"></i>
				Restore \ Undelete
			</a>
		@endif
	@endif

	<!-- DELETE -->
	@if(checkACL('admin'))
		{{ Form::open(
			array('url' => route('backend.articles.deleteTrashed', array($article->id)),
				'method'=>'delete',
				'id'=>'frmDelete-' . $article->id,
				'onsubmit' => "return confirm('Are you sure you want to delete?')")
			)
		}}
			<button type="submit" class="btn btn-sm btn-default btn-block" style="margin-top:5px; margin-bottom: 5px">
				<i class="fa fa-trash-o fa-custom" aria-hidden="true"></i>
				Delete
			</button>
		{{ Form::close() }}
	@endif

@include('common.controlCenterFooter')