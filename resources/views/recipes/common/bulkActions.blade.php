<br id="bulk-space-top" style="display:none;" />

@if(in_array('publishAll', $buttons))
	<button
		class="btn btn-default btn-block"
		type="submit"
		formaction="{{ route('recipes.publishAll') }}"
		formmethod="POST"
		id="bulk-publish"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to publish these recipes?')">
			Publish Selected
	</button>
@endif

@if(in_array('unpublishAll', $buttons))
	<button
		class="btn btn-default btn-block"
		type="submit"
		formaction="{{ route('recipes.unpublishAll') }}"
		formmethod="POST"
		id="bulk-unpublish"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to unpublish these recipes?')">
			Unpublish Selected
	</button>
@endif

@if(in_array('restoreAll', $buttons))
	<button
		class = "btn btn-primary btn-block"
		type="submit"
		formaction="{{ route('recipes.restoreAll') }}"
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
		formaction="{{ route('recipes.trashAll') }}"
		formmethod="POST"
		id="bulk-trash"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to trash these recipes?')">
			Trash Selected
	</button>
@endif

@if(in_array('deleteAll', $buttons))
	<button
		class="btn btn-danger btn-block"
		type="submit"
		formaction="{{ route('recipes.deleteAll') }}"
		formmethod="POST"
		id="bulk-delete"
		style="display:none; margin-left:2px">
			Delete Selected
	</button>
@endif

<br />
{{-- <br id="bulk-space-bottom" style="display:none;" /> --}}