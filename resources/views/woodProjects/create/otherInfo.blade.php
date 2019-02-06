{{-- OTHER INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Other Information</div>
	</div>
	<div class="panel-body">
		<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
			<div class="form-group {{ $errors->has('completed_at') ? 'has-error' : '' }}">
				{!! Form::label('completed_at', 'Completed Date') !!}
				<div class="input-group input-group-sm">
					{{ Form::text('completed_at', null, ['class'=>'form-control', 'id'=>'datetime']) }}
					<span class="text-danger">{{ $errors->first('completed_at') }}</span>
					<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
				{!! Form::label('weight', 'Weight') !!} <small>(In Lbs)</small>
				{!! Form::number('weight', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('weight') }}</span>
			</div>
		</div>
		
	</div>
</div>