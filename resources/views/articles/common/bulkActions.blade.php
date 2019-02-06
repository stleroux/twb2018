<br id="bulk-space" style="display:none;" />

@if(in_array('publishAll', $buttons))
	<button
		class="btn btn-default btn-block"
		type="submit"
		formaction="{{ route('articles.publishAll') }}"
		formmethod="POST"
		id="bulk-publish"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to publish these articles?')">
			Publish Selected
	</button>
@endif

@if(in_array('unpublishAll', $buttons))
	<button
		class="btn btn-default btn-block"
		type="submit"
		formaction="{{ route('articles.unpublishAll') }}"
		formmethod="POST"
		id="bulk-unpublish"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to unpublish these articles?')">
			Unpublish Selected
	</button>
@endif

@if(in_array('restoreAll', $buttons))
	<button
		class = "btn btn-primary btn-block"
		type="submit"
		formaction="{{ route('articles.restoreAll') }}"
		formmethod="POST"
		id="bulk-restore"
		style="display:none; margin-left:2px">
			Restore Selected
	</button>
@endif

@if(in_array('trashAll', $buttons))
	<button
		class="btn btn-danger btn-block"
		type="submit"
		formaction="{{ route('articles.trashAll') }}"
		formmethod="POST"
		id="bulk-trash"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to trash these articles?')">
			Trash Selected
	</button>
@endif

@if(in_array('deleteAll', $buttons))
	<button
		class="btn btn-danger btn-block"
		type="submit"
		formaction="{{ route('articles.deleteAll') }}"
		formmethod="POST"
		id="bulk-delete"
		style="display:none; margin-left:2px">
			Delete Selected
	</button>
@endif

<br />