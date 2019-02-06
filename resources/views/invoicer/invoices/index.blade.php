@extends('invoicer.layouts.app')

@section('content')

	<div class="row">
		<div class="col-xs-12 text-right">
			<a href="{{ route('invoicer.invoices.index') }}" class="btn btn-sm {{ (Request::is('invoicer/invoices/index') ? 'btn-info' : 'btn-default') }}">
				<i class="fa fa-list"></i>
				All
			</a>
			<a href="{{ route('invoices.logged') }}" class="btn btn-sm {{ (Request::is('invoicer/invoices/logged') ? 'btn-info' : 'btn-default') }}">
				<i class="fa fa-sign-out" aria-hidden="true"></i>
				Logged
			</a>
			<a href="{{ route('invoices.invoiced') }}" class="btn btn-sm {{ (Request::is('invoicer/invoices/invoiced') ? 'btn-info' : 'btn-default') }}">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
				Invoiced
			</a>
			<a href="{{ route('invoices.paid') }}" class="btn btn-sm {{ (Request::is('invoicer/invoices/paid') ? 'btn-info' : 'btn-default') }}">
				<i class="fa fa-money"></i>
				Paid
			</a>
		</div>
	</div>
{{-- 
<ul class="nav nav-tabs nav-tabs-right">
		<li class="nav-item">
			<a class="nav-link {{ (Request::is('invoicer/invoices') ? 'active' : '') }}" href="{{ route('invoicer.invoices.index') }}">
				<i class="fa fa-list"></i>
				All
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ (Request::is('invoicer/invoices/logged') ? 'active' : '') }}" href="{{ route('invoices.logged') }}">
				<i class="fa fa-sign-out" aria-hidden="true"></i>
				Logged
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ (Request::is('invoicer/invoices/invoiced') ? 'active' : '') }}" href="{{ route('invoices.invoiced') }}">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
				Invoiced
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ (Request::is('invoicer/invoices/paid') ? 'active' : '') }}" href="{{ route('invoices.paid') }}">
				<i class="fa fa-money"></i>
				Paid
			</a>
		</li>
	</ul> --}}

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				Invoices
				{{ (Request::is('invoicer/invoices/logged') ? '- Logged':'') }}
				{{ (Request::is('invoicer/invoices/invoiced') ? '- Invoiced':'') }}
				{{ (Request::is('invoicer/invoices/paid') ? '- Paid':'') }}
				<span class="pull-right">
					@if(Request::is('invoicer/invoices/logged'))
						<a href="{{ route('invoices.status_invoiced_all') }}" class="btn btn-xs btn-default">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							Mark All as Invoiced
						</a>
					@endif
					@if(Request::is('invoicer/invoices/invoiced'))
						<a href="{{ route('invoices.status_paid_all') }}" class="btn btn-xs btn-default">
							<i class="fa fa-money"></i>
							Mark All as Paid
						</a>
					@endif
					<a href="{{ route('invoicer.invoices.create') }}" class="btn btn-xs btn-default">
						<i class="fa fa-plus-square-o" aria-hidden="true"></i>
						Add New Invoice
					</a>
				</span>
			</div>
		</div>
		<div class="panel-body">
			@if($invoices->count() > 0)
				<table id="" class="table table-hover table-stripped table-condensed">
					<thead>
						<tr>
							<th>@sortablelink('id','Invoice #') </th>
							@if(Request::is('invoicer/invoices/logged'))
								<th>@sortablelink('created_at','Logged Date')</th>
							@endif
							@if(Request::is('invoicer/invoices/invoiced'))
								<th>@sortablelink('invoiced_at','Invoiced Date')</th>
							@endif
							@if(Request::is('invoicer/invoices/paid'))
								<th>@sortablelink('paidd_at','Paid Date')</th>
							@endif
							@if(Request::is('invoicer/invoices/index'))
								<th>@sortablelink('status','Status')</th>
							@endif
							<th>@sortablelink('client.company_name','Company Name')</th>
							<th class="text-right">@sortablelink('amount_charged','Charged')</th>
							<th class="text-right">@sortablelink('total','Net Total')</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($invoices as $invoice)
						<tr>
							<td>{{ $invoice->id }}</td>
							@if(Request::is('invoicer/invoices/logged'))
								<td>{{ $invoice->created_at->format('M d Y') }}</td>
							@endif
							@if(Request::is('invoicer/invoices/invoiced'))
								<td>{{ $invoice->invoiced_at->format('M d Y') }}</td>
							@endif
							@if(Request::is('invoicer/invoices/paid'))
								<td>{{ $invoice->paid_at->format('M d Y') }}</td>
							@endif
							@if(Request::is('invoicer/invoices/index'))
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
							<td><a href="{{ route('invoicer.clients.show', $invoice->client->id) }}">{{ $invoice->client->company_name }}</a></td>
							<td class="text-right">{{ number_format($invoice->sub_total, 2, '.', ', ') }}$</td>
							<td class="text-right">{{ number_format($invoice->total, 2, '.', ', ') }}$</td>
							<td>
								<form action="{{ route('invoicer.invoices.destroy',[$invoice->id]) }}" method="POST" 
									onsubmit="return confirm('Do you really want to delete this invoice?');"
									class="pull-right">
									{{ csrf_field() }}
									
{{-- <button 
	type="button"
	class="btn btn-xs btn-default"
	onclick="{!! route('invoices.status_invoiced', $invoice->id) !!}"
	title="Invoiced">
		<i class="fa fa-list"></i>
</button> --}}

{{-- <a href="{{ route('invoices.status_invoiced', $invoice->id) }}" title="Invoiced"><i class="fa fa-list"></i></a>
<a href="{{ route('invoices.status_paid', $invoice->id) }}" title="Paid"><i class="fa fa-money"></i></a>
<a href="{{ route('invoices.show', $invoice->id) }}" title="Show invoice"><i class="fa fa-eye"></i></a>
<a href="{{ route('invoices.edit', $invoice->id) }}" title="Edit invoice"><i class="fa fa-edit"></i></a> --}}

{{-- <a href="{{ route('invoices.status_invoiced', $invoice->id) }}" class="btn btn-xs btn-default" title="Invoiced"><i class="fa fa-list"></i></a>
<a href="{{ route('invoices.status_paid', $invoice->id) }}" class="btn btn-xs btn-default" title="Paid"><i class="fa fa-money"></i></a>
<a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-xs btn-default" title="Show invoice"><i class="fa fa-eye"></i></a>
<a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-xs btn-primary" title="Edit invoice"><i class="fa fa-edit"></i></a> --}}

									@if($invoice->status == 'logged')
										<a href="{{ route('invoices.status_invoiced', $invoice->id) }}" class="btn btn-xs btn-default" title="Mark As Invoiced">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											Invoiced
										</a>
									@endif
									@if($invoice->status == 'invoiced')
										<a href="{{ route('invoices.status_paid', $invoice->id) }}" class="btn btn-xs btn-default" title="Mark As Paid">
											<i class="fa fa-money"></i>
											Paid
										</a>
									@endif
									<a href="{{ route('invoicer.invoices.show', $invoice->id) }}" class="btn btn-xs btn-default" title="Show Invoice">
										<i class="fa fa-eye"></i>
										View
									</a>
									<a href="{{ route('invoicer.invoices.edit', $invoice->id) }}" class="btn btn-xs btn-primary" title="Edit Invoice">
										<i class="fa fa-edit"></i>
										Edit
									</a>

									<input type="hidden" name="_method" value="DELETE" />
									<button type="submit" class="btn btn-xs btn-danger" title="Delete Invoice">
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
				No invoices found in the system.
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