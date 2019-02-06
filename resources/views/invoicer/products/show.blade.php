@extends('invoicer.layouts.app')

@section('content')

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Product Information
					<span class="pull-right">
						<a href="{{ route('invoicer.products.index') }}" class="btn btn-sm btn-default">Products List</a>
					</span>
				</div>
			</div>
			
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							{{ Form::label ('code', 'Code:')}}
							{{ Form::text ('code', $product->code, array('class'=>'form-control', 'readonly')) }}
						</div>
						<div class="form-group">
							{{ Form::label ('details', 'Details:')}}
							{{ Form::text ('details', $product->details, ['class'=>'form-control', 'readonly']) }}
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection
