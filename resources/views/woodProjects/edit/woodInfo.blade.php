{{-- WOOD INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Wood Information</div>
	</div>
	<div class="panel-body">

		<div class="col-xs-12 col-sm-4">
			<div class="form-group {{ $errors->has('wood_specie_id') ? 'has-error' : '' }}">
				{{ Form::label('wood_specie_id', 'Wood Specie') }}
				{{ Form::select('wood_specie_id', array('' => '-- Wood Specie --') + $woodSpecies, $project->wood_specie_id , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('wood_specie_id') }}</span>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="form-group {{ $errors->has('wood_type_id') ? 'has-error' : '' }}">
				{{ Form::label('wood_type_id', 'Wood Type') }}
				{{ Form::select('wood_type_id', array('' => '-- Wood Type --') + $woodTypes, $project->wood_type_id , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('wood_type_id') }}</span>
			</div>
		</div>
	</div>
</div>