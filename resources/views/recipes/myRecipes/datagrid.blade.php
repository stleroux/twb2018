<table id="datatable" class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Views</th>
			{{-- <th>Author</th> --}}
			<th>Created On</th>
			<th>Published On</th>
		</tr>
	</thead>
	<tbody>
		@foreach($recipes as $recipe)
		<tr>
			<td>
				@if($recipe->image)
					<img src="\_recipes\{{ $recipe->image }}" height="30" width="32">
				@else
					<i class="fa fa-2x fa-picture-o" aria-hidden="true"></i>
				@endif
				&nbsp;
				<a href="{{ route('recipes.show', $recipe->id) }}">{{ ucwords($recipe->title) }}</a>
			</td>
			<td>{{ $recipe->category->name }}</td>
			<td>{{ $recipe->views }}</td>
			{{-- <td>@include('common.authorFormat', ['model'=>$recipe, 'field'=>'user'])</td> --}}
			<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'created_at'])</td>
			<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'published_at'])</td>
		</tr>
		@endforeach
	</tbody>
</table>
