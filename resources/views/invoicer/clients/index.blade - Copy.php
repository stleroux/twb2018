@extends('layouts.app')

@section('content')

<form action="{{ route('clients.search') }}" class="form-inline">
	<div class="form-group">
		<select class="form-control" name="selection">
			<option value="company">Company Name</option>
			<option value="contact">Contact Name</option>
		</select>
		<input type="text" class="form-control" name="searchWord">
		<input type="submit" value="Search" class="btn btn-default">
		<a href="{{ route('clients.index') }}" class="btn btn-default">Reset</a>
	</div>
	</form>
	<p></p>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				Clients
				<span class="pull-right">
					<a href="{{ route('clients.create') }}" class="btn btn-sm btn-default">Add New Client</a>
				</span>
			</div>
		</div>
		<div class="panel-body">
			@if($clients->count() > 0)
				<table class="table table-hover table-stripped table-condensed">
					<thead>
						<tr>
							<th>@sortablelink('id','Client ID')</th>
							<th>@sortablelink('company_name','Company Name')</th>
							<th>@sortablelink('contact_name','Contact Name')</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($clients as $client)
						<tr>
							<td>{{ $client->id }}</td>
							<td>{{ $client->company_name }}</td>
							<td>{{ $client->contact_name }}</td>
							<td>
								<form action="{{ route('clients.destroy',[$client->id]) }}" method="POST" 
									onsubmit="return confirm('Do you really want to delete this client?');"
									class="pull-right">
									{{ csrf_field() }}
									<a href="{{ route('clients.show', $client->id) }}" class="btn btn-xs btn-default">View</a>
									<a href="{{ route('clients.edit', $client->id) }}" class="btn btn-xs btn-primary">Edit</a>
									<input type="hidden" name="_method" value="DELETE" />
									<button type="submit" class="btn btn-xs btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@else
				No clients found in the system.
			@endif
		</div>

		@if($clients->count() > 0)
			<div class="panel-footer text-center" style="padding-bottom:0px; margin-bottom:0px; padding-top:6px">
				<div class="row">
					<div class="col-xs-6 text-left">
						Showing records {{ $clients->firstItem() }} to {{ $clients->lastItem() }} of {{ $clients->total() }}
					</div>
					<div class="col-xs-6 text-right">
						{!! $clients->appends(request()->except('page'))->render() !!}
					</div>
				</div>
			</div>
		@endif
	</div>

@endsection
