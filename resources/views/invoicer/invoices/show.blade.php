@extends('invoicer.layouts.app')

@section('content')

	<div class="text-right no-print">
{{-- 		<a href="{{ route('invoices.invoice_to_pdf', $invoice->id) }}" class="btn btn-xs btn-primary d-print-none">
			<i class="fa fa-pdf"></i>
			Create PDF
		</a> --}}
		{{-- <a href="{{ route('invoicer.invoices.edit', $invoice->id) }}" class="btn btn-xs btn-default">Back To Invoices</a> --}}
		<button onClick="window.print()" class="btn btn-xs btn-outline-secondary d-print-none">
			<i class="fa fa-print"></i>
			Print this page
		</button>
		<a href="{{ route('invoicer.invoices.edit', $invoice->id) }}" class="btn btn-xs btn-primary d-print-none">
			<i class="fa fa-pencil"></i>
			Edit Invoice
		</a>
		<a href="{{ route('invoicer.invoices.index') }}" class="btn btn-xs btn-primary d-print-none">
			<i class="fa fa-list"></i>
			Invoices List
		</a>
		<br /><br />
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<div class="row">
					<div class="col-xs-4">
						<br />
						<h1 class="text-center">INVOICE</h1>
					</div>
					<div class="col-xs-8">
						<div class="col-xs-12">
							<h3 class="text-center">{{ Config::get('invoicer.companyName') }}</h3>
						</div>
						<div class="col-xs-6">
							<p class="text-right">
								{{ Config::get('invoicer.companyTelephone') }}<br />
								{{ Config::get('invoicer.companyEmail') }}<br />
								{{-- {{ Config::get('invoicer.companyWebsite') }}<br /> --}}
								WSIB N<sup>o</sup>: {{ Config::get('invoicer.WSIB_no') }}<br />
								HST N<sup>o</sup>: {{ Config::get('invoicer.HST_no') }}
							</p>
						</div>
						<div class="col-xs-6">
							<p>
								{{ Config::get('invoicer.address_1') }}<br />
								{{ Config::get('invoicer.address_2') }}<br />
								{{ Config::get('invoicer.companyCity') }}, {{ Config::get('invoicer.companyState') }}<br >
								{{ Config::get('invoicer.companyZip') }}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="panel-body">
			
				<div class="panel panel-info">

					<div class="panel-heading">
						<div class="panel-title">Invoice Information</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-xs-4">
								<div><strong>Billed To</strong></div>
									<div>{{ $invoice->client->company_name }}</div>
									<div>{{ $invoice->client->address }}</div>
									<div>{{ $invoice->client->city }}, {{ $invoice->client->state }}</div>
									<div>{{ $invoice->client->zip }}</div>
							</div>
							<div class="col-xs-3 text-center">
								<div><strong>Invoice Number</strong></div>
								<div>{{ $invoice->id }}</div>
							</div>
							<div class="col-xs-3 text-center">
								@if($invoice->invoiced_at)
									<div><strong>Invoiced Date</strong></div>
									<div>{{ $invoice->invoiced_at->format('M d, Y') }}</div>
								@else
									<div><strong>Logged Date</strong></div>
									<div>{{ $invoice->created_at->format('M d, Y') }}</div>
								@endif
							</div>
							<div class="col-xs-2 text-center">
								<div><strong>Paid Date</strong></div>
									<div>{{ ($invoice->paid_at ? $invoice->paid_at->format('M d, Y') : 'N/A') }}</div>
							</div>
							@if($invoice->work_description)
								<div class="row">
									<div class="col-xs-12">
										<div class="text-muted">Work Description</div>
										<div class="table-bordered" style="padding: 10px">{{ $invoice->work_description }}</div>
									</div>
								</div>
							@endif
						</div>
					</div>
				</div>

				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Billable Items</div>
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
										<th class="text-right">Amount</th>
									</tr>
								</thead>
								<tbody>
									@foreach($invoice->invoiceItems as $item)
										<tr>
											<td>{{ $item->product->details }}</td>
											<td>{{ $item->work_date->format('M d, Y') }}</td>
											<td>{!! nl2br(e($item->notes)) !!}</td>
											<td class="text-center">{{ $item->quantity }}</td>
											<td class="text-right">{{ number_format($item->price, 2, '.', ' ') }}$</td>
											<td class="text-right">{{ number_format($item->total, 2, '.', ' ') }}$</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							No related billable items found.
						@endif
					</div>
				</div>
		
				<div class="panel panel-info" style="margin-bottom:0px">
					<div class="panel-body clearfix">
						<div class="row">
							<div class="col-xs-10 text-right">
								<strong>SubTotal</strong>
							</div>
							<div class="col-xs-2">
								<span class="pull-right">{{ ($invoice->amount_charged ? number_format($invoice->amount_charged, 2, '.', ' ') : '0.00') }}$</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-10 text-right">
								<strong>HST</strong>
							</div>
							<div class="col-xs-2">
								<span class="pull-right">{{ number_format($invoice->hst, 2, '.', ' ') }}$</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-10 text-right">
								<strong>Invoice Total</strong>
							</div>
							<div class="col-xs-2">
								<span class="pull-right">{{ number_format($invoice->sub_total, 2, '.', ' ') }}$</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="panel-footer">
				{!! Config::get('invoicer.termsAndConditions') !!}
			</div>
	</div>

@endsection
				