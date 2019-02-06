<table id="datatable" class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>Category Name</th>
			<th>Module</th>
			<th>Value</th>
			<th data-orderable="false"></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
			<tr>
				<td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
				<td>{{ $category->module->name }}</td>
				<td>{{ $category->value ? ucfirst($category->value) : 'N/A' }}</td>
				<td class="text-right">
					<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary" title="Edit">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<form method="POST" action="{{ route('categories.destroy', $category->id) }}" accept-charset="UTF-8" style="display:inline">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button
							class="btn btn-sm btn-danger"
							{{ Auth::user()->actionButtons == 2 ? 'title=Delete' : '' }}
							type="button"
							data-toggle="modal"
							data-id="{{ $category->id }}"
							data-target="#delete">
								<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>


@section ('scripts')
	@include('scripts.modals.delete')
@stop