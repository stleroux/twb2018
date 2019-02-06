@include('common.controlCenterHeader')

	@if(Session::has('archiveUrl'))
		<a href="{!! Session::get('archiveUrl') !!}" class="btn btn-default btn-block">
			<i class="fa fa-file-text-o" aria-hidden="true"></i>
			Archives
		</a>
	@endif

	<a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Articles
	</a>

@if(empty(Session::has('archiveUrl')))
	@if(!$next)
		<a href="#" class="btn btn-default btn-block disabled">
			<i class="fa fa-angle-double-right" aria-hidden="true"></i>
			Next Article
		</a>
	@else
		<a href="{{ URL::to( 'articles/' . $next . '/show' ) }}" class="btn btn-default btn-block">
			<i class="fa fa-angle-double-right" aria-hidden="true"></i>
			Next Article
		</a>
	@endif
	
	@if(!$previous)
		<a href="#" class="btn btn-default btn-block disabled">
			<i class="fa fa-angle-double-left" aria-hidden="true"></i>
			Previous Article
		</a>
	@else
		<a href="{{ URL::to( 'articles/' . $previous . '/show' ) }}" class="btn btn-default btn-block">
			<i class="fa fa-angle-double-left" aria-hidden="true"></i>
			Previous Article
		</a>
	@endif
@endif

	
	@if(checkACL('user'))
		<a href="" type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#printModal">
			<i class="fa fa-print" aria-hidden="true"></i> Print
		</a>
	@endif

	@if(checkACL('user'))
		@if(($article->published_at != NULL) && ($article->published_at <= Carbon\Carbon::now()))
			@if(count($article->favorites))
				<a href="{{ route('articles.removeFavorite', $article->id) }}" class="btn btn-block btn-default">
					<i class="fa fa-times-circle-o" aria-hidden="true"></i>
					Remove Favorite
				</a>
			@else
				<a href="{{ route('articles.addFavorite', $article->id) }}" class="btn btn-block btn-default">
					<i class="fa fa-check-circle-o" aria-hidden="true"></i>
					Add Favorite
				</a>
			@endif
		@endif
	@endif

	@if(checkACL('author'))
		<a href="{{ route('articles.duplicate', $article->id) }}" class="btn btn-block btn-default">
			<i class="fa fa-clone" aria-hidden="true"></i>
			Duplicate
		</a>
	@endif

	@if(checkACL('publisher'))
		@if($article->published_at >= Carbon\Carbon::Now())
			<a href="{{ route('articles.publish', $article->id) }}" class="btn btn-block btn-default">
				<i class="fa fa-book" aria-hidden="true"></i>
				Publish Now
			</a>
		@else
			@if($article->published_at)
				<a href="{{ route('articles.unpublish', $article->id) }}" class="btn btn-block btn-default">
					<i class="fa fa-window-close-o" aria-hidden="true"></i>
					Unpublish                     
				</a>
			@else
				<a href="{{ route('articles.publish', $article->id) }}" class="btn btn-block btn-default">
					<i class="fa fa-book" aria-hidden="true"></i>
					Publish
				</a>
			@endif
		@endif
	@endif

	@if(checkACL('manager'))
		<a href="{{ route('articles.resetViews', $article->id) }}" class="btn btn-block btn-default">
			<i class="fa fa-eye-slash" aria-hidden="true"></i>
			Reset Views
		</a>
	@endif

	@if(checkACL('editor') || checkOwner($article))
		<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-block btn-primary" title="Edit">
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			Edit
		</a>
	@endif

	@if(checkACL('manager') || checkOwner($article))
		<form method="POST" action="{{ route('articles.destroy', $article->id) }}" accept-charset="UTF-8" style="display:inline">
			<input type="hidden" name="_method" value="delete" />
			{!! csrf_field() !!}
			<button
				class="btn btn-block btn-danger"
				style="margin-top: 6px"
				type="button"
				data-toggle="modal"
				data-target="#trash"
				{{-- data-title="Trash Article?"
				data-message="Are you sure you want to trash this article?" --}}>
				<i class="glyphicon glyphicon-trash"></i> Trash
			</button>
		</form>
	@endif

@include('common.controlCenterFooter')

{{-- {{ Session::flush('archiveUrl') }} --}}