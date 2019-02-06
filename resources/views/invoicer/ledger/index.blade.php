@extends('invoicer.layouts.app')

@section('content')

<div class="row">
	<div class="col-xs-12 text-right">
		<a href="{{ route('invoicer.ledger') }}" class="btn btn-sm {{ (Request::is('invoicer/ledger') ? 'btn-info' : 'btn-default') }}">All</a>
		<a href="{{ route('invoicer.ledger.logged') }}" class="btn btn-sm {{ (Request::is('invoicer/ledger/logged') ? 'btn-info' : 'btn-default') }}">Logged</a>
		<a href="{{ route('invoicer.ledger.invoiced') }}" class="btn btn-sm {{ (Request::is('invoicer/ledger/invoiced') ? 'btn-info' : 'btn-default') }}">Invoiced</a>
		<a href="{{ route('invoicer.ledger.paid') }}" class="btn btn-sm {{ (Request::is('invoicer/ledger/paid') ? 'btn-info' : 'btn-default') }}">Paid</a>
	</div>
</div>
					


	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				Ledger
				{{ (Request::is('invoicer/ledger/logged') ? '- Logged':'') }}
				{{ (Request::is('invoicer/ledger/invoiced') ? '- Invoiced':'') }}
				{{ (Request::is('invoicer/ledger/paid') ? '- Paid':'') }}
			</div>
		</div>
		<div class="panel-body">
			@if($invoices->count() > 0)
				<table class="table table-hover table-stripped table-condensed">
					<thead>
						<tr>
							<th>@sortablelink('id','Inv #')</th>
							@if(Request::is('invoicer/ledger/logged'))
								<th>@sortablelink('created_at','Logged Date')</th>
							@endif
							@if(Request::is('invoicer/ledger/invoiced'))
								<th>@sortablelink('invoiced_at','Invoiced Date')</th>
							@endif
							@if(Request::is('invoicer/ledger/paid'))
								<th>@sortablelink('paidd_at','Paid Date')</th>
							@endif
							@if(Request::is('invoicer/ledger'))
								<th>@sortablelink('status','Status')</th>
							@endif
							<th>@sortablelink('client.company_name','Company Name')</th>
							<th class="text-right">@sortablelink('amount_charged','Charge')</th>
							<th class="text-right">@sortablelink('hst','HST')</th>
							<th class="text-right" title="SubTotal">@sortablelink('sub_total','SUB')</th>
							<th class="text-right">@sortablelink('wsib','WSIB')</th>
							<th class="text-right" title="Income Taxes">@sortablelink('income_taxes','IT')</th>
							<th class="text-right" title="Total Deductions">@sortablelink('total_deductions','DED')</th>
							<th class="text-right">@sortablelink('total','NET')</th>
						</tr>
					</thead>
					<tfoot>
						<tr class="info">
							<td colspan="3" class="text-right"><b>Totals This Page :&nbsp;</b></td>
							<td class="text-right">{{ number_format($invoices->sum('amount_charged'), 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoices->sum('hst'), 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoices->sum('sub_total'), 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoices->sum('wsib'), 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoices->sum('income_taxes'), 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoices->sum('total_deductions'), 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoices->sum('total'), 2, '.', ', ') }}$</td>
						</tr>
						<tr class="info">
							<td colspan="3" class="text-right"><b>Overall Totals :&nbsp;</b></td>
							<td class="text-right">{{ number_format($totalAmountCharged, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($totalHST, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($totalSubTotal, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($totalWSIB, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($totalIncomeTaxes, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($totalTotalDeductions, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($totalTotal, 2, '.', ', ') }}$</td>
						</tr>
					</tfoot>
					<tbody>
						@foreach($invoices as $invoice)
						<tr>
							<td>{{ $invoice->id }}</td>
							
							@if(Request::is('invoicer/ledger/logged'))
								<td>{{ $invoice->created_at->format('M d Y') }}</td>
							@endif
							@if(Request::is('invoicer/ledger/invoiced'))
								<td>{{ $invoice->invoiced_at->format('M d Y') }}</td>
							@endif
							@if(Request::is('invoicer/ledger/paid'))
								<td>{{ $invoice->paid_at->format('M d Y') }}</td>
							@endif
							@if(Request::is('invoicer/ledger'))
								<td>
									@if($invoice->status == 'logged')
										<div class="label label-info">{{ ucfirst($invoice->status) }}</label>
									@elseif($invoice->status == 'invoiced')
										<div class="label label-warning">{{ ucfirst($invoice->status) }}</label>
									@elseif($invoice->status == 'paid')
										<div class="label label-success">{{ ucfirst($invoice->status) }}</label>
									@endif
								</td>
							@endif
							<td><a href="{{ route('invoicer.clients.show', $invoice->client_id) }}">{{ $invoice->client->company_name }}</a></td>
							<td class="text-right">{{ number_format($invoice->amount_charged, 2, '.' , ', ') }}$</td>
							<td class="text-right">{{ number_format($invoice->hst, 2, '.' , ', ') }}$</td>
							<td class="text-right">{{ number_format($invoice->sub_total, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoice->wsib, 2, '.' , ', ') }}$</td>
							<td class="text-right">{{ number_format($invoice->income_taxes, 2, '.' , ', ') }}$</td>
							<td class="text-right">{{ number_format($invoice->total_deductions, 2, '.' , ', ') }}$</td>
							<td class="text-right">{{ number_format($invoice->total, 2, '.' , ', ') }}$</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@else
				No records found in the system.
			@endif
		</div>

		@if($invoices->count() > 0)
			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-6 text-left">
						Showing records {{ $invoices->firstItem() }} to {{ $invoices->lastItem() }} of {{ $invoices->total() }}
					</div>
					<div class="col-xs-6 text-right">
						{!! $invoices->appends(request()->except('page'))->render() !!}
					</div>
				</div>
			</div>
		@endif
	</div>

@endsection
