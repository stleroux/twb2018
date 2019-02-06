{{-- FINISH INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Finish Information</div>
	</div>
	<div class="panel-body">

		<div class="col-xs-12 col-sm-4">
			<div class="form-group {{ $errors->has('finish_type_id') ? 'has-error' : '' }}">
				{{ Form::label('finish_type_id', 'Finish Type') }}
				{{ Form::select('finish_type_id', array('' => '-- Finish Type --') + $finishTypes, $project->finish_type_id , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('finish_type_id') }}</span>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="form-group {{ $errors->has('finish_sheen_id') ? 'has-error' : '' }}">
				{{ Form::label('finish_sheen_id', 'Finish Sheen') }}
				{{ Form::select('finish_sheen_id', array('' => '-- Finish Sheen --') + $finishSheens, $project->finish_sheen_id , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('finish_sheen_id') }}</span>
			</div>
		</div>

	</div>
</div>