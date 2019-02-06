{{-- Page to display Items in frontend --}}

@extends('backend.layouts.app')

@section ('stylesheets')
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-table-filter-control.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-editable.css">
	
	<script src="/js/bootstrap-table-filter-control.js"></script>
@stop

@section('sectionSidebar')
	@include('backend.items.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li class="active"><span>Items</span></li>
@stop

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Items</h3>
		</div>
		<div class="panel-body">
			<div class="row">

<a href="{{ route('items.index') }}" class="btn btn-sm btn-default">All</a>
<a href="{{ route('items.published') }}" class="btn btn-sm btn-default">Published</a>
<a href="{{ route('items.unpublished') }}" class="btn btn-sm btn-default">unPublished</a>
<a href="{{ route('items.future') }}" class="btn btn-sm btn-default">Future</a>
<a href="{{ route('items.trashed') }}" class="btn btn-sm btn-default">Trashed</a>

				<form class="form-inline" action="{{ route('items.index') }}">
					<div class="form-group">
						<div class="col-xs-12">
							<label for="status" class="form-label">Filter By Status</label>
							<select class="form-control" onchange='this.form.submit()'>
								<option value="" selected="selected">Select One</option>
								<option value="1">All</option>
								<option value="2">Unpublished</option>
								<option value="published">Published</option>
								<option value="4">Future</option>
							</select>
							<button type="submit" value="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>

			<table id="table"
				data-toggle="table"
				data-search="true"
				data-filter-control="true"
				data-pagination="true"
				data-pagination-loop="false"
				data-striped="true"
				data-show-columns="true"
				{{-- data-show-refresh="true" --}}
				{{-- data-show-fullscreen="true" --}}
				data-page-list="[2, 4, 6, 8, 10, 25, All]"
				data-detail-view="true"
				data-detail-formatter="detailFormatter"

				data-height=640
				data-trim-on-search="true"
				data-show-toggle="false"
				data-card-view="false"
			>
				<thead>
					<tr>
						<th data-sortable="true" data-field="id">ID</th>
						<th data-sortable="true" data-field="title">Title</th>
						<th data-sortable="false" data-field="description">Description</th>
						<th data-sortable="true" data-field="author">Author</th>
						<th data-sortable="true" data-field="status">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($items as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td>{{ $item->title }}</td>
							<td>{{ $item->description }}</td>
							<td>{{ $item->user->username }}</td>
							<td>{{ $item->status }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection

@section('scripts')
	<!-- Latest compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

	<script>
		$(function () {
		  $('#table').bootstrapTable({
		    data: data,
		    detailView:true,
		    onExpandRow: function (index, row, $detail) {
		    	$('#table').find('.detailView').each(function () {
		      	if (!$(this).is($detail.parent())) {
		        	$(this).prev().find('.detail-icon').click()
		        }
		      })
		      $detail.html(row.stargazers_count)
		    }
		  });
		});
	</script>
@stop