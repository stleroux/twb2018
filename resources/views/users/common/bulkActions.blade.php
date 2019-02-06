<br id="bulk-space" style="display:none;" />

@if(in_array('restoreAll', $buttons))
	<button
		class = "btn btn-primary btn-block"
		type="submit"
		formaction="{{ route('users.restoreAll') }}"
		formmethod="POST"
		id="bulk-restore"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to restore these users?')">
			Restore Selected
	</button>
@endif

@if(in_array('trashAll', $buttons))
	<button
		class="btn btn-danger btn-block"
		type="submit"
		formaction="{{ route('users.trashAll') }}"
		formmethod="POST"
		id="bulk-trash"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to trash these users?')">
			Trash Selected
	</button>
@endif

@if(in_array('deleteAll', $buttons))
	<button
		class="btn btn-danger btn-block"
		type="submit"
		formaction="{{ route('users.deleteAll') }}"
		formmethod="POST"
		id="bulk-delete"
		style="display:none; margin-left:2px"
		onclick="return confirm('Are you sure you want to permanently delete these users?')">
			Delete Selected
	</button>
@endif
