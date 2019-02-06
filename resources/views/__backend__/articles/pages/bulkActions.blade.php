{{-- <form style="display:inline;">
	{!! csrf_field() !!} --}}

{{-- Buttons will appear in reverse order --}}
@if(in_array('trashAll', $buttons))
	<button
		class="btn btn-xs btn-danger pull-right"
		type="submit"
		formaction="{{ route('backend.articles.trashAll') }}"
		formmethod="POST"
		id="bulk-trash"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to trash these articles?')">
			Trash Selected
	</button>
@endif

@if(in_array('deleteAll', $buttons))
	<button
		class="btn btn-xs btn-danger pull-right"
		type="submit"
		formaction="{{ route('backend.articles.deleteAll') }}"
		formmethod="POST"
		id="bulk-delete"
		style="display:none; margin-left:2px">
			Delete Selected
	</button>
@endif

@if(in_array('restoreAll', $buttons))
	<button
		class = "btn btn-xs btn-primary pull-right"
		type="submit"
		formaction="{{ route('backend.articles.restoreAll') }}"
		formmethod="POST"
		id="bulk-restore"
		style="display:none; margin-left:2px">
			Restore Selected
	</button>
@endif

@if(in_array('unpublishAll', $buttons))
	<button
		class="btn btn-xs btn-default pull-right"
		type="submit"
		formaction="{{ route('backend.articles.unpublishAll') }}"
		formmethod="POST"
		id="bulk-unpublish"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to unpublish these articles?')">
			Unpublish Selected
	</button>
@endif

@if(in_array('publishAll', $buttons))
	<button
		class="btn btn-xs btn-default pull-right clearfix"
		type="submit"
		formaction="{{ route('backend.articles.publishAll') }}"
		formmethod="POST"
		id="bulk-publish"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to publish these articles?')">
			Publish Selected
	</button>
@endif

{{-- </form> --}}