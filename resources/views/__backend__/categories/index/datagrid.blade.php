<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-sitemap" aria-hidden="true"></i>
			{{ $title }}
		</h3>
	</div>
	<div class="panel-body">
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
						<td><a href="{{ route('backend.categories.show', $category->id) }}">{{ $category->name }}</a></td>
						<td>{{ $category->module->name }}</td>
						<td>{{ $category->value ? ucfirst($category->value) : 'N/A' }}</td>
						<td class="text-right">
							<a href="{{ route('backend.categories.edit', $category->id) }}" class="btn btn-xs btn-primary" title="Edit">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<form method="POST" action="{{ route('backend.categories.destroy', $category->id) }}" accept-charset="UTF-8" style="display:inline">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button
									class="btn btn-xs btn-danger"
									{{ Auth::user()->actionButtons == 2 ? 'title=Delete' : '' }}
									type="button"
									data-toggle="modal"
									data-id="{{ $category->id }}"
									data-target="#confirmDelete"
									data-title="Delete Category"
									data-message="Are you sure you want to delete this category?">
										@if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="glyphicon glyphicon-trash"></i> Delete
										@elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="glyphicon glyphicon-trash"></i>
										@elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}Delete
										@endif
										<i class="fa fa-trash" aria-hidden="true"></i>
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>