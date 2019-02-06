<div class="panel panel-info">

	<div class="panel-heading">
		<div class="panel-title">
			Invoices
			<span class="pull-right"><small><b>Total :</b> {{ $invoicesTotal->count() }}</small></span>
		</div>
	</div>
	
	<table class="table table-hover table-condensed">
		<tr>
			<td><a href="{{ route('invoices.logged') }}">Logged</a></td>
			<td class="text-right">{{ App\Invoice::where('status', 'logged')->count() }}</td>
		</tr>
		<tr>
			<td><a href="{{ route('invoices.invoiced') }}">Invoiced</a></td>
			<td class="text-right">{{ App\Invoice::where('status', 'invoiced')->count() }}</td>
		</tr>
		<tr>
			<td><a href="{{ route('invoices.paid') }}">Paid</a></td>
			<td class="text-right">{{ App\Invoice::where('status', 'paid')->count() }}</td>
		</tr>
	</table>

</div>