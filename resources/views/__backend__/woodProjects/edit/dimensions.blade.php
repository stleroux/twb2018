{{-- OVERALL DIMENSIONS --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Overall Dimensions <small>(in inches)</small></div>
	</div>
	<div class="panel-body">
		<div class="col-xs-12 col-sm-2">
			<div class="form-group {{ $errors->has('width') ? 'has-error' : '' }}">
				<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
					data-title="Overall Width"
					data-content="Dimensions from left to right when facing the item.">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				{!! Form::label('width', 'Width') !!}
				{!! Form::number('width', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('width') }}</span>
			</div>
		</div>
		
		<div class="col-xs-12 col-sm-2">
			<div class="form-group {{ $errors->has('depth') ? 'has-error' : '' }}">
				<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
					data-title="Overall Depth"
					data-content="Dimensions from left to right when facing the item.">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				{!! Form::label('depth', 'Depth') !!}
				{!! Form::number('depth', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('depth') }}</span>
			</div>
		</div>

		<div class="col-xs-12 col-sm-2">
			<div class="form-group {{ $errors->has('height') ? 'has-error' : '' }}">
				<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
					data-title="Overall Height"
					data-content="Dimensions from left to right when facing the item.">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				{!! Form::label('height', 'Height') !!}
				{!! Form::number('height', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('height') }}</span>
			</div>
		</div>

	</div>
</div>