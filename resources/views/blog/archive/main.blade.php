<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			Blog Archives for 
			@if ($month == 1) January @endif
			@if ($month == 2) February @endif
			@if ($month == 3) March @endif
			@if ($month == 4) April @endif
			@if ($month == 5) May @endif
			@if ($month == 6) June @endif
			@if ($month == 7) July @endif
			@if ($month == 8) August @endif
			@if ($month == 9) September @endif
			@if ($month == 10) October @endif
			@if ($month == 11) November @endif
			@if ($month == 12) December @endif
			{{ $year }}
		</h3>
	</div>
	<div class="panel-body">
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Created At</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($archives as $archive)
					<tr>
						<td><a href="{{ route('blog.single', $archive->slug) }}">{{ $archive->title }}</a></td>
						{{-- <td>@include('common.author', ['model'=>$archive, 'field'=>'user'])</td> --}}
						{{-- <td><a href="" data-toggle="modal" data-target="#viewAuthorModal">{{ $archive->user->username }}</a></td> --}}
						<td>@include('common.authorFormat', ['model'=>$archive, 'field'=>'user'])</td>
						<td>@include('common.dateFormat', ['model'=>$archive, 'field'=>'created_at'])</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>