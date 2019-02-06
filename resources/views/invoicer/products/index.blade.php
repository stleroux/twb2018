@extends('invoicer.layouts.app')

@section('content')

	<div class="row">
		<div class="col-xs-9">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							Products
							<span class="pull-right">
								<a href="{{ route('invoicer.products.create') }}" class="btn btn-xs btn-default">
									<i class="fa fa-plus-square-o" aria-hidden="true"></i>
									Add New Product
								</a>
							</span>
						</div>
					</div>
					<div class="panel-body">
						@if($products->count() > 0)
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										{{-- <th>@sortablelink('id','ID')</th> --}}
										<th>@sortablelink('code','Code')</th>
										<th>@sortablelink('details','Details')</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										{{-- <td>{{ $product->id }}</td> --}}
										<td>{{ $product->code }}</td>
										<td>{{ $product->details }}</td>
										<td>
											<form action="{{ route('invoicer.products.destroy', [$product->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete this product?');" class="pull-right">
												{{ csrf_field() }}
												<a href="{{ route('invoicer.products.show', $product->id) }}" class="btn btn-xs btn-default" title="View Product">
													<i class="fa fa-eye" aria-hidden="true"></i>
													View
												</a>
												<a href="{{ route('invoicer.products.edit', $product->id) }}" class="btn btn-xs btn-primary" title="Edit Product">
													<i class="fa fa-edit" aria-hidden="true"></i>
													Edit
												</a>
												<input type="hidden" name="_method" value="DELETE" />
												<button type="submit" class="btn btn-xs btn-danger">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
													Delete
												</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						@else
							No products found in the system.
						@endif
					</div>

					@if($products->count() > 0)
						<div class="panel-footer">
							<div class="row">
								<div class="col-xs-6 text-left">
									Showing records {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }}
								</div>
								<div class="col-xs-6 text-right">
									{!! $products->appends(request()->except('page'))->render() !!}
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
					<form action="{{ route('invoicer.products.search') }}" class="">
						<div class="form-group">
							<select class="form-control" name="selection">
								<option value="code">Code</option>
								<option value="details">Details</option>
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
							<a href="{{ route('invoicer.products.index') }}" class="btn btn-xs btn-default">
								<i class="fa fa-square-o" aria-hidden="true"></i>
								Reset
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

@endsection
