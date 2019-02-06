<div class="panel panel-info">

	<div class="panel-heading">
		<div class="panel-title">
			Products
			<span class="pull-right"><small><b>Total :</b> {{ $products->count() }}</small></span>
		</div>
	</div>
	
	<table class="table table-hover table-condensed">
		@foreach($products as $product)
			<tr>
				<td>{{ $product->code }}</td>
			</tr>
		@endforeach
	</table>

</div>