@include('common.controlCenterHeader')

	<a href="{{ route('articles.trashed') }}" class="btn btn-block btn-default">
		<i class="fa fa-undo fa-custom" aria-hidden="true"></i>
		Back
	</a>

	@if(checkACL('manager'))
		<a href="{{ route('articles.restore', $article->id) }}" class="btn btn-block btn-default">
			<i class="fa fa-map-pin" aria-hidden="true"></i>
			Restore \ Undelete
		</a>
	@endif

<!--	<a href="{{ route('articles.publish', $article->id) }}" class="btn btn-block btn-default">
		<i class="fa fa-thumb-tack" aria-hidden="true"></i>
		Restore and Publish
	</a> -->

	<form method="POST" action="{{ route('articles.deleteTrashed', $article->id) }}" accept-charset="UTF-8" style="display:inline">
		<input type="hidden" name="_method" value="delete" />
		{!! csrf_field() !!}
		<button
			class="btn btn-block btn-danger"
			style="margin-top: 6px"
			type="button"
			data-toggle="modal"
			data-target="#confirmDelete"
			data-title="Permanently Delete Article"
			data-message="Are you sure you want to permanently delete this article?">
			<i class="glyphicon glyphicon-trash"></i> Delete
		</button>
	</form>
@include('common.controlCenterFooter')