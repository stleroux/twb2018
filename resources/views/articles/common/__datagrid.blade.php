<table id="datatable" class="table table-hover table-condensed table-responsive searchHighlight">
	<thead>
		<tr>
			<th><input type="checkbox" id="selectall" class="checked" /></th>
			{{-- Add columns for search purposes only --}}
			<th class="hidden">English</th>
			<th class="hidden">French</th>
			{{-- Add columns for search purposes only --}}

			<th><div>Title</div></th>
			<th class="hidden-xs">Category</th>
			<th class="hidden-xs hidden-sm">Views</th>
			<th class="hidden-xs">Author</th>
			@if(in_array('created_at', $cols))
				<th class="hidden-sm hidden-xs">Created</th>
			@endif
			@if(in_array('published_at', $cols))
				<th class="hidden-sm hidden-xs">Published</th>
			@endif
			@if(in_array('deleted_at', $cols))
				<th class="hidden-sm hidden-xs">Deleted</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach ($articles as $key => $article)
			<tr>
				<td>
					<input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{$article->id}}" class="check-all">
				</td>
				{{-- Hide columns at all levels. Only needed because Datatables only searches for columns in the table --}}
				<td class="hidden">{{ $article->description_eng }}</td>
				<td class="hidden">{{ $article->description_fre }}</td>
				{{-- Hide columns at all levels. Only needed because Datatables only searches for columns in the table --}}
				
				<td><a href="{{ route('articles.show', $article->id) }}" class="">{{ $article->title }}</a></td>
				<td class="hidden-xs">{{ $article->category->name }}</td>
				<td class="hidden-xs hidden-sm">{{ $article->views }}</td>
				<td class="hidden-xs">@include('common.authorFormat', ['model'=>$article, 'field'=>'user'])</td>
				@if(in_array('created_at', $cols))
					<td class="hidden-sm hidden-xs
						{{ $article->created_at >= Carbon\Carbon::now() ? 'text text-danger' : '' }}
						{{ $article->created_at == null ? 'text text-info' : '' }}
					">
						@include('common.dateFormat', ['model'=>$article, 'field'=>'created_at'])
					</td>
				@endif
				@if(in_array('published_at', $cols))
					<td class="hidden-sm hidden-xs
						{{ $article->published_at >= Carbon\Carbon::now() ? 'text text-warning' : '' }}
						{{-- {{ $article->published_at == null ? 'text text-info' : '' }} --}}
					">
						@include('common.dateFormat', ['model'=>$article, 'field'=>'published_at'])
					</td>
				@endif
				@if(in_array('deleted_at', $cols))
					<td class="hidden-sm hidden-xs
						{{ $article->deleted_at ? 'text text-danger' : '' }}
					">
						@include('common.dateFormat', ['model'=>$article, 'field'=>'deleted_at'])
					</td>
				@endif
			</tr>
		@endforeach
	</tbody>
</table>