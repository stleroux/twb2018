<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-sitemap" aria-hidden="true"></i>
			Categories
		</div>
	</div>
	
	<div class="panel-body">
		@if($newCategories->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Name</th>
						{{-- <th>Created By</th> --}}
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newCategories as $category)
						<tr>
							<td>{{ $category->name }}</td>
							{{-- <td>{{ $category->user->username }}</td> --}}
							<td>@include('common.dateFormat', ['model'=>$category, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
