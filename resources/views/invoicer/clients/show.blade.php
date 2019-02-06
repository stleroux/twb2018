@extends('invoicer.layouts.app')

@section('content')

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Client Information
					{{-- <span class="pull-right">
						<a href="{{ route('invoicer.clients.index') }}" class="btn btn-sm btn-default">Clients List</a>
					</span> --}}
				</div>
			</div>
			
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<div class="form-group">
							{{ Form::label ('company_name', 'Company Name:')}}
							{{ Form::text ('company_name', $client->company_name, array('class'=>'form-control', 'readonly')) }}
						</div>
						<div class="form-group">
							{{ Form::label ('address', 'Address:')}}
							{{ Form::text ('address', $client->address, array('class'=>'form-control', 'readonly')) }}
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									{{ Form::label ('city', 'City:')}}
									{{ Form::text ('city', $client->city, array('class'=>'form-control', 'readonly')) }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									{{ Form::label ('state', 'Province:')}}
									{{ Form::text ('state', $client->state, array('class'=>'form-control', 'readonly')) }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									{{ Form::label ('zip', 'Postal Code:')}}
									{{ Form::text ('zip', $client->zip, array('class'=>'form-control', 'readonly')) }}
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									{{ Form::label ('notes', 'Notes:')}}
									{{ Form::textarea ('notes', $client->notes, array('class'=>'form-control', 'readonly', 'rows'=>4)) }}
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs12 col-sm-4">
						<div class="form-group">
							{{ Form::label ('owner_name', 'Contact Name:')}}
							{{ Form::text ('owner_name', $client->contact_name, array('class'=>'form-control', 'readonly')) }}
						</div>
						<div class="form-group">
							{{ Form::label ('telephone', 'Telephone:')}}
							{{ Form::text ('telephone', $client->telephone, array('class'=>'form-control', 'readonly')) }}
						</div>
						<div class="form-group">
							{{ Form::label ('cell', 'Cell:')}}
							{{ Form::text ('cell', $client->cell, array('class'=>'form-control', 'readonly')) }}
						</div>
						<div class="form-group">
							{{ Form::label ('fax', 'Fax:')}}
							{{ Form::text ('fax', $client->fax, array('class'=>'form-control', 'readonly')) }}
						</div>
						<div class="form-group">
							{{ Form::label ('email', 'Email Address:')}}
							{{ Form::text ('email', $client->email, array('class'=>'form-control', 'readonly')) }}
						</div>
						<div class="form-group">
							{{ Form::label ('website_address', 'Website Address:')}}
							{{ Form::text ('website_address', $client->website, array('class'=>'form-control', 'readonly')) }}
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Related Invoices</div>
			</div>

			<div class="panel-body">
				@if($client->invoices->count() > 0)
					<table class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>Invoice N<sup>o</sup></th>
								<th>Create Date</th>
								<th>Amount</th>
								<th>Status</th>
								<th colspan="4"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($client->invoices as $invoice)
								<tr>
									<td>{{ $invoice->id }}</td>
									<td>{{ $invoice->created_at->format('M d, Y') }}</td>
									<td>{{ number_format($invoice->sub_total, 2, '.', ', ') }}$</td>
									<td>{{ ucfirst($invoice->status) }}</td>
									
									<form action="{{ route('invoicer.invoices.destroy',[$invoice->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete this invoice?');">
										<input type="hidden" name="_method" value="DELETE" />
										<td width="10px">										
											<a href="{{ route('invoicer.invoices.show', $invoice->id) }}" class="btn btn-xs btn-default">View</a>
										</td>
										<td width="10px">
											@if($invoice->status != "paid")
												<a href="{{ route('invoicer.invoices.edit', $invoice->id) }}" class="btn btn-xs btn-primary">Edit</a>
											@endif
										</td>
										<td width="10px">											
											<button type="submit" class="btn btn-xs btn-danger">Delete</button>
										</td>
									</form>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					No related invoices found for this client.
				@endif
			</div>
		</div>
	
@endsection