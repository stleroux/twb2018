@extends('invoicer.layouts.app')

@section('content')

	{!! Form::open(array('route'=>'invoicer.products.store')) !!}
		{{ Form::token() }}

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Create New Product
					<span class="pull-right">
						<a href="{{ route('invoicer.products.index') }}" class="btn btn-xs btn-default">
							<i class="fa fa-caret-square-o-left"></i>
							Cancel
						</a>
						{{ Form::button('<i class="fa fa-save"></i> Save Product', ['class' => 'btn btn-xs btn-success', 'type' => 'submit']) }}
					</span>
				</div>
			</div>
			
			<div class="panel-body panel-bg">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
							{{ Form::label ('code', 'Code:', ['class'=>'required']) }}
							{{ Form::text ('code', null, array('class'=>'form-control', 'autofocus')) }}
							<span class="text-danger">{{ $errors->first('code') }}</span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-9">
						<div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
							{{ Form::label ('details', 'Details:', ['class'=>'required'])}}
							{{ Form::text ('details', null, array('class'=>'form-control')) }}
							<span class="text-danger">{{ $errors->first('details') }}</span>
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
