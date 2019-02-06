@extends('invoicer.layouts.app')

@section('content')

	{!! Form::open(array('route'=>'invoices.store')) !!}
		{{ Form::token() }}

		<div class="panel panel-primary">
			
			<div class="panel-heading">

				<div class="panel-title">
					Create New Invoice
					<span class="pull-right">
						{{ Form::submit ('Save Invoice', array('class'=>'btn btn-sm btn-default')) }}
					</span>
				</div>
			</div>
			
			<div class="panel-body">

				<div class="row">
					<div class="col-md-9">
						<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
							{{ Form::label('client_id', 'Client', ['class'=>'required']) }}
							{{ Form::select('client_id', $clients, [], ['class'=>'form-control', 'placeholder'=>'Select']) }}
							<span class="text-danger">{{ $errors->first('client_id') }}</span>
						</div>

						<div class="form-group {{ $errors->has('work_description') ? 'has-error' : '' }}">
							{{ Form::label ('work_description', 'Work Description:') }}
							{{ Form::textarea ('work_description', null, ['class'=>'form-control', 'rows'=>'4']) }}
							<span class="text-danger">{{ $errors->first('work_description') }}</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group {{ $errors->has('work_date') ? 'has-error' : '' }}">
							{{ Form::label ('work_date', 'Work Date:')}}
							<div class="input-group">
								{{ Form::date ('work_date', null, array('class'=>'form-control')) }}
								<div class="input-group-addon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
							</div>
							<span class="text-danger">{{ $errors->first('work_date') }}</span>
						</div>

						<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
							{{ Form::label ('status', 'Status') }}
							{{ Form::select('status', ['logged'=>'Logged', 'paid'=>'Paid', 'invoiced'=>'Invoiced'], null, ['placeholder'=>'Pick one...', 'class'=>'form-control']) }}
							<span class="text-danger">{{ $errors->first('status') }}</span>
						</div>

						<div class="form-group {{ $errors->has('amount_charged') ? 'has-error' : '' }}">
							{{ Form::label ('amount_charged', 'Charged Amount:')}}
							<div class="input-group">
								{{ Form::text ('amount_charged', null, array('class'=>'form-control text-right')) }}
								<div class="input-group-addon">$</div>
							</div>
							<span class="text-danger">{{ $errors->first('amount_charged') }}</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="panel-title">
									Billable Items
									<span class="pull-right">
										<input type="button" class="btn btn-sm btn-default" value="Add New Item" onclick="createNew()" />
									</span>
								</div>
							</div>
							<div class="panel-body">
								{{-- <div class="row">
									<div class="col-xs-12 col-sm-8">
										<div class="form-group {{ $errors->has('invoiceItem.*.product') ? 'has-error' : '' }}">
											{{ Form::label ('product', 'Product:')}}
											{{ Form::text ('invoiceItem[0][product]', null, ['class'=>'form-control', 'placeholder'=>'Product']) }}
											<span class="text-danger">{{ $errors->first('invoiceItem.*.product') }}</span>
										</div> --}}
{{-- <div class="form-group {{ $errors->has('invoiceItem.*.product') ? 'has-error' : '' }}">
	{{ Form::label('product', 'Product:', ['class'=>'required']) }}
	{{ Form::select('product', $items, [], ['class'=>'form-control', 'placeholder'=>'Select']) }}
	<select name="invoiceItem[0][product]" class="form-control">
		<option value="">Select A Product</option>
		@foreach($items as $item)
			@php
				$info = $item->name . '-' . $item->details;
			@endphp
			<option value="{{ $item->id }}">{{ $info }}</option>
		@endforeach
	</select>
	<span class="text-danger">{{ $errors->first('invoiceItem.*.product') }}</span>
</div> --}}
									{{-- </div>
									<div class="col-xs-12 col-sm-2">
										<div class="form-group {{ $errors->has('invoiceItem.*.quantity') ? 'has-error' : '' }}">
											{{ Form::label ('quantity', 'Quantity:')}}
											{{ Form::text ('invoiceItem[0][quantity]', null, ['class'=>'form-control', 'placeholder'=>'Quantity']) }}
											<span class="text-danger">{{ $errors->first('invoiceItem.*.quantity') }}</span>
										</div>
									</div>
									<div class="col-xs-12 col-sm-2">
										<div class="form-group {{ $errors->has('invoiceItem.*.price') ? 'has-error' : '' }}">
											{{ Form::label ('price', 'Price:')}}
											{{ Form::text ('invoiceItem[0][price]', null, ['class'=>'form-control', 'placeholder'=>'Price']) }}
											<span class="text-danger">{{ $errors->first('invoiceItem.*.price') }}</span>
										</div>
									</div>
								</div> --}}

								<div id="mydiv"></div>
							</div>
							<div class="panel-footer">
								All items are required. Failure to provide a value in any field will cause the values in the Billable Items section to disappear if you try to save the invoice.
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	
	{!! Form::close() !!}

@endsection


@section('scripts')
	<script>
		var i = 1;

		function createNew() {
			$("#mydiv").append('<div class="row">'+
				'<div class="col-xs-12 col-sm-8">'+
					'<div class="form-group">'+
						'<input type="text" name="invoiceItem[' + i +'][product]" class="form-control" placeholder="Product"/>'+
						// '<select name="product" class="form-control">'+
						// 	'<option value="">Select A Product</option>'+
						// 		@foreach($items as $item)
						// 			'<option value="{{ $item->id }}">{{ $item->name }} - {{ $item->details }}</option>'+
						// 		@endforeach
						// 	'</select>'+
					'</div>'+
				'</div>'+
				'<div class="col-xs-12 col-sm-2">'+
					'<div class="form-group">'+
						'<input type="text" name="invoiceItem[' + i +'][quantity]" class="form-control" placeholder="Quantity"/>'+
					'</div>'+
				'</div>'+
				'<div class="col-xs-12 col-sm-2">'+
					'<div class="form-group">'+
						'<div class="input-group">'+
							'<input type="text" name="invoiceItem[' + i +'][price]" class="form-control text-right" placeholder="Price" />'+
							'<div class="input-group-addon">$</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
				'<br/>');
			i++;
		}

		function deleteRow() {
			document.getElementById("#mydiv").deleteRow(0);
		} 
	</script>
@endsection
