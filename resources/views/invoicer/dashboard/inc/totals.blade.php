<div class="panel panel-info">

	<div class="panel-heading">
		<div class="panel-title">Statistics</div>
	</div>

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th></th>
				<th class="text-right">Charged</th>
				<th class="text-right">HST</th>
				<th class="text-right">SubTotal</th>
				<th class="text-right">WSIB</th>
				<th class="text-right">Income Taxes</th>
				<th class="text-right">Total Deductions</th>
				<th class="text-right">Total</th>
			</tr>
		</thead>
		<tbody>
			<tr>
					<th>Logged</th>
					<td class="text-right">{{ number_format($invoicesLogged->sum('amount_charged'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesLogged->sum('hst'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesLogged->sum('sub_total'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesLogged->sum('wsib'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesLogged->sum('income_taxes'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesLogged->sum('total_deductions'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesLogged->sum('total'), 2, '.', ', ') }}$</td>
				</tr>
				<tr>
					<th>Invoiced</th>
					<td class="text-right">{{ number_format($invoicesInvoiced->sum('amount_charged'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesInvoiced->sum('hst'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesInvoiced->sum('sub_total'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesInvoiced->sum('wsib'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesInvoiced->sum('income_taxes'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesInvoiced->sum('total_deductions'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesInvoiced->sum('total'), 2, '.', ', ') }}$</td>
				</tr>
				<tr>
					<th>Paid</th>
					<td class="text-right">{{ number_format($invoicesPaid->sum('amount_charged'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesPaid->sum('hst'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesPaid->sum('sub_total'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesPaid->sum('wsib'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesPaid->sum('income_taxes'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesPaid->sum('total_deductions'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesPaid->sum('total'), 2, '.', ', ') }}$</td>
				</tr>
				<tr class="table-success">
					<th>Total</th>
					<td class="text-right">{{ number_format($invoicesTotal->sum('amount_charged'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesTotal->sum('hst'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesTotal->sum('sub_total'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesTotal->sum('wsib'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesTotal->sum('income_taxes'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesTotal->sum('total_deductions'), 2, '.', ', ') }}$</td>
					<td class="text-right">{{ number_format($invoicesTotal->sum('total'), 2, '.', ', ') }}$</td>
				</tr>
		</tbody>
	</table>

</div>