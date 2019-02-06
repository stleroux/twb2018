@extends('invoicer.layouts.app')

@section('content')

	<div class="row">
		<div class="col-xs-9">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Clients
							<span class="pull-right">
								<a href="{{ route('invoicer.clients.create') }}" class="btn btn-xs btn-default">
									<i class="fa fa-plus-square-o" aria-hidden="true"></i>
									Add New Client
								</a>
							</span>
						</div>
					</div>
					<div class="panel-body">
						@if($clients->count() > 0)
							<table class="table table-hover table-condensed">
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
											<form action="{{ route('invoicer.clients.destroy',[$client->id]) }}" method="POST" 
												onsubmit="return confirm('Do you really want to delete this client?');"
												class="pull-right">
												{{ csrf_field() }}
												<a href="{{ route('invoicer.clients.show', $client->id) }}" class="btn btn-xs btn-default" title="View Client">
													<i class="fa fa-eye"></i>
													View
												</a>
												<a href="{{ route('invoicer.clients.edit', $client->id) }}" class="btn btn-xs btn-primary" title="Edit Client">
													<i class="fa fa-edit"></i>
													Edit
												</a>
												<input type="hidden" name="_method" value="DELETE" />
												<button type="submit" class="btn btn-xs btn-danger" title="Delete Client">
													<i class="fa fa-trash-o"></i>
													Delete
												</button>
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
						<div class="panel-footer">
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
		</div>
		<div class="col-xs-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">Search</div>
				</div>
				<div class="panel-body">
					<form action="{{ route('invoicer.clients.search') }}" class="">
						<div class="form-group">
							<select class="form-control" name="selection">
								<option value="company">Company Name</option>
								<option value="contact">Contact Name</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="searchWord">
						</div>
						<div class="form-group text-center">
							<button type="submit" value="Search" class="btn btn-xs btn-primary">
								<i class="fa fa-binoculars" aria-hidden="true"></i>
								Search
							</button>
							<a href="{{ route('invoicer.clients.index') }}" class="btn btn-xs btn-default" title="Reset Form">
								<i class="fa fa-square-o" aria-hidden="true"></i>
								Reset
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	
	<p></p>



@endsection
