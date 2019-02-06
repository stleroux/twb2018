@extends('invoicer.layouts.app')

@section('content')

	{!! Form::model($item, ['route'=>['invoiceItems.update', $item->id], 'method' => 'PUT']) !!}
	{{ Form::token() }}
	{{ Form::hidden ('invoice_id', $item->invoice->id) }}

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Edit Billable Item{{--  : {{ $item->id }} --}}
					<span class="pull-right">
						<a href="{{ route('invoicer.invoices.edit', $item->invoice->id) }}" class="btn btn-xs btn-default">
							<i class="fa fa-caret-square-o-left"></i>
							Cancel
						</a>
						{{-- {{ Form::submit ('Update Billable', array('class'=>'btn btn-xs btn-default')) }} --}}
						{{ Form::button('<i class="fa fa-save"></i> Update Billable', ['class' => 'btn btn-xs btn-success', 'type' => 'submit']) }}
					</span>
				</div>
			</div>
			
			<div class="panel-body panel-bg">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
							{{ Form::label('product_id', 'Product', ['class'=>'required']) }}
							{{ Form::select('product_id', $products, $item->product->id, ['class'=>'form-control', 'placeholder'=>'Select']) }}
							<span class="text-danger">{{ $errors->first('product_id') }}</span>
						</div>
						<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
							{{ Form::label ('notes', 'Notes:') }}
							{{ Form::textarea ('notes', $item->notes, array('class'=>'form-control', 'autofocus')) }}
							<span class="text-danger">{{ $errors->first('notes') }}</span>
							<span id="helpBlock" class="help-blok">Notes will show on invoice</span>
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
							{{ Form::text ('price', null, ['class'=>'form-control']) }}
							<span class="text-danger">{{ $errors->first('price') }}</span>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group {{ $errors->has('work_date') ? 'has-error' : '' }}">
							{{ Form::label ('work_date', 'Work Date:', ['class'=>'required'])}}
							<div class="input-group">
								{{ Form::date ('work_date', $item->work_date, array('class'=>'form-control')) }}
								<div class="input-group-addon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
							</div>
							<span class="text-danger">{{ $errors->first('work_date') }}</span>
						</div>
					</div>
				</div>
			</div> {{-- End of panel body --}}

			<div class="panel-footer">
				Fields marked with an<span class="required"></span> are required.
			</div>
		</div>
	{!! Form::close() !!}
@endsection
