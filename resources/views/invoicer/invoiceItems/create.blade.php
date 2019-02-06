@extends('invoicer.layouts.app')

@section('content')

	{!! Form::open(array('route'=>'invoiceItems.store')) !!}
		{{ Form::token() }}
		{{ Form::hidden ('invoice_id', $invoice->id) }}

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Add Billable Item to Invoice : {{ $invoice->id }}
					<span class="pull-right">
						{{-- {{ Form::submit ('<i class="fa fa-save"></i> Add Billable', array('class'=>'btn btn-xs btn-success')) }} --}}
						<a href="{{ route('invoicer.invoices.edit', $invoice->id) }}" class="btn btn-xs btn-default">
							<i class="fa fa-caret-square-o-left"></i>
							Cancel
						</a>
						{{ Form::button('<i class="fa fa-save"></i> Add Billable', ['class' => 'btn btn-xs btn-success', 'type' => 'submit']) }}
					</span>
				</div>
			</div>
			
			<div class="panel-body panel-bg">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
							{{ Form::label('product_id', 'Product', ['class'=>'required']) }}
							{{ Form::select('product_id', $products, [], ['class'=>'form-control', 'autofocus', 'placeholder'=>'Select']) }}
							<span class="text-danger">{{ $errors->first('product') }}</span>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
									{{ Form::label ('notes', 'Notes:') }}
									{{ Form::textarea ('notes', null, array('class'=>'form-control')) }}
									<span class="text-danger">{{ $errors->first('notes') }}</span>
									<span id="helpBlock" class="help-blok"><small>Notes will show on invoice.</small></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
							{{ Form::label ('quantity', 'Quantity', ['class'=>'required']) }}
							{{ Form::text ('quantity', null, ['class'=>'form-control']) }}
							<span class="text-danger">{{ $errors->first('quantity') }}</span>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
							{{ Form::label ('price', 'Price', ['class'=>'required']) }}
							<div class="input-group">
								{{ Form::text ('price', null, ['class'=>'form-control text-right']) }}
								<div class="input-group-addon">$</div>
							</div>
							<span class="text-danger">{{ $errors->first('price') }}</span>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group {{ $errors->has('work_date') ? 'has-error' : '' }}">
							{{ Form::label ('work_date', 'Work Date:', ['class'=>'required'])}}
							<div class="input-group">
								{{ Form::date ('work_date', null, array('class'=>'form-control')) }}
								<div class="input-group-addon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
							</div>
							<span class="text-danger">{{ $errors->first('work_date') }}</span>
						</div>
					</div>
				</div>
			</div>

			<div class="panel-footer">
				Fields marked with an<span class="required"></span> are required.
			</div>
		</div>
	{!! Form::close() !!}
@endsection
