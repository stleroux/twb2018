@extends('invoicer.layouts.app')

@section('content')

	{!! Form::open(array('route'=>'invoicer.invoices.store')) !!}
		{{ Form::token() }}

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Create New Invoice
					<span class="pull-right">
						<a href="{{ route('invoicer.invoices.index') }}" class="btn btn-xs btn-default">
							<i class="fa fa-file-text-o"></i>
							Invoices List
						</a>
						{{-- {{ Form::submit ('<i class="fa fa-dave"></i>Save Invoice', array('class'=>'btn btn-xs btn-success')) }} --}}
						{{ Form::button('<i class="fa fa-save"></i> Save Invoice', ['class' => 'btn btn-xs btn-success', 'type' => 'submit']) }}
					</span>
				</div>
			</div>
			
			<div class="panel-body panel-bg">
				<div class="row">
					<div class="col-md-9">
						<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
							{{ Form::label('client_id', 'Client', ['class'=>'required']) }}
							{{ Form::select('client_id', $clients, [], ['class'=>'form-control', 'placeholder'=>'Select']) }}
							<span class="text-danger">{{ $errors->first('client_id') }}</span>
						</div>
						<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
							{{ Form::label ('notes', 'Notes:') }}
							{{ Form::textarea ('notes', null, ['class'=>'form-control', 'rows'=>'4']) }}
							<span class="text-danger">{{ $errors->first('notes') }}</span>
							<span id="helpBlock" class="help-blok"><small>Notes will not show on invoice</small></span>
						</div>
					</div>
					<div class="col-md-3">
						{{-- <div class="form-group {{ $errors->has('work_date') ? 'has-error' : '' }}">
							{{ Form::label ('work_date', 'Work Date:', ['class'=>'required'])}}
							<div class="input-group">
								{{ Form::date ('work_date', null, array('class'=>'form-control')) }}
								<div class="input-group-addon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
							</div>
							<span class="text-danger">{{ $errors->first('work_date') }}</span>
						</div> --}}

						<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
							{{ Form::label ('status', 'Status', ['class'=>'required']) }}
							{{ Form::select('status', ['logged'=>'Logged', 'paid'=>'Paid', 'invoiced'=>'Invoiced'], null, ['placeholder'=>'Pick one...', 'class'=>'form-control']) }}
							<span class="text-danger">{{ $errors->first('status') }}</span>
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
