{{-- OTHER INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Other Information</div>
	</div>
	<div class="panel-body">
		<div class="col-xs-12 col-sm-3">
			<div class="form-group {{ $errors->has('completed_at') ? 'has-error' : '' }}">
				{!! Form::label('completed_at', 'Completed Date') !!}
				{{ Form::text('completed_at', null, ['class'=>'form-control', 'id'=>'datetime']) }}
				<span class="text-danger">{{ $errors->first('completed_at') }}</span>
			</div>
		</div>

		<div class="col-xs-12 col-sm-2">
			<div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
				{!! Form::label('weight', 'Weight') !!} <span>(In Lbs)</span>
				{!! Form::number('weight', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('weight') }}</span>
			</div>
		</div>
		
	</div>
</div>