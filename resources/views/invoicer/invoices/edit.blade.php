@extends('invoicer.layouts.app')

@section('content')
	{!! Form::model($invoice, ['route'=>['invoicer.invoices.update', $invoice->id], 'method' => 'PUT']) !!}
	{{ Form::token() }}

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Edit Invoice
					<span class="pull-right">
						<a href="{{ route('invoicer.invoices.index') }}" class="btn btn-xs btn-default">
							<i class="fa fa-caret-square-o-left"></i>
							Cancel
						</a>
						{{ Form::button('<i class="fa fa-save"></i> Update Invoice', ['class' => 'btn btn-xs btn-info', 'type' => 'submit']) }}
					</span>
				</div>
			</div>
			
			<div class="panel-body panel-bg">
				<div class="row">
					<div class="col-md-9">
						<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
							{{ Form::label('client_id', 'Client', ['class'=>'required']) }}
							{{ Form::select('client_id', $clients, $invoice->client_id, ['class'=>'form-control', 'placeholder'=>'Select']) }}
							<span class="text-danger">{{ $errors->first('client_id') }}</span>
						</div>
						<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
							{{ Form::label ('notes', 'Notes:') }}
							{{ Form::textarea ('notes', null, ['class'=>'form-control', 'rows'=>'4']) }}
							<span class="text-danger">{{ $errors->first('notes') }}</span>
							<span id="helpBlock" class="help-blok"><small>Notes will not show on invoice</small></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
							{{ Form::label ('status', 'Status', ['class'=>'required']) }}
							{{ Form::select('status', ['logged'=>'Logged', 'paid'=>'Paid', 'invoiced'=>'Invoiced'], $invoice->status, ['class'=>'form-control']) }}
							<span class="text-danger">{{ $errors->first('status') }}</span>
						</div>
						<div class="form-group">
							{{ Form::label ('created_at', 'Logged Date') }}
							<div class="input-group">
								{{ Form::date ('created_at', $invoice->created_at, ['class'=>'form-control', 'readonly'=>'readonly']) }}
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label ('invoiced_at', 'Invoiced Date') }}
							<div class="input-group">
								{{ Form::date ('invoiced_at', $invoice->invoiced_at, ['class'=>'form-control']) }}
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label ('paid_at', 'Paid Date') }}
							<div class="input-group">
								{{ Form::date ('paid_at', $invoice->paid_at, ['class'=>'form-control']) }}
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label ('amount_charged', 'SubTotal:') }}
							<div class="input-group">
								{{ Form::text ('amount_charged', number_format($invoice->amount_charged, 2, '.', ' '), ['class'=>'form-control text-right', 'readonly'=>'readonly']) }}
								<div class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></div>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label ('hst', 'HST:') }}
							<div class="input-group">
								{{ Form::text ('hst', number_format($invoice->hst, 2, '.', ' '), ['class'=>'form-control text-right', 'readonly'=>'readonly']) }}
								<div class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></div>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label ('total', 'TOTAL CHARGED:') }}
							<div class="input-group">
								{{ Form::text ('hst', number_format($invoice->sub_total, 2, '.', ' '), ['class'=>'form-control text-right', 'readonly'=>'readonly']) }}
								<div class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
	{!! Form::close() !!}
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-info">

							<div class="panel-heading">
								<div class="panel-title">
									Billable Items
									@if($invoice->status != 'paid')
										<span class="pull-right">
											<a href="{{ route('invoicer.invoiceItems.create', $invoice->id) }}" class="btn btn-xs btn-primary">
												<i class="fa fa-plus"></i>
												Add Billable
											</a>
										</span>
									@endif
								</div>
							</div>

							<div class="panel-body">
								@if($invoice->invoiceItems->count() > 0)
									<table class="table table-condensed table-striped">
										<thead>
											<tr>
												{{-- <th>ID</th> --}}
												<th>Product</th>
												<th>Work Date</th>
												<th>Notes</th>
												<th class="text-center">Quantity</th>
												<th class="text-right">Price</th>
												<th class="text-right">Total</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@foreach($invoice->invoiceItems as $item)
												<tr>
													{{-- <td>{{ $item->id }}</td> --}}
													<td>{{ $item->product->details }}</td>
													<td>{{ $item->work_date->format('M d, Y') }}</td>
													<td>{!! nl2br(e($item->notes)) !!}</td>
													<td class="text-center">{{ $item->quantity }}</td>
													<td class="text-right">{{ number_format($item->price, 2, '.', ' ') }}$</td>
													<td class="text-right">{{ number_format($item->total, 2, '.', ' ') }}$</td>
													<td class="text-right">
														<form action="{{ route('invoiceItems.destroy',[$item->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete this billable item?');"
															class="pull-right">
															{{ csrf_field() }}
															<a href="{{ route('invoiceItems.edit', $item->id) }}" class="btn btn-xs btn-primary">
																<i class="fa fa-edit"></i>
																Edit
															</a>
															<input type="hidden" name="_method" value="DELETE" />
															<button type="submit" class="btn btn-xs btn-danger">
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
									No billable items found for this invoice.
								@endif
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="panel-footer">
				Fields marked with an<span class="required"></span> are required.
			</div>
		</div>
	

@endsection
