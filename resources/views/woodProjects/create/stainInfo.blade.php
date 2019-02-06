{{-- STAIN INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Stain Information</div>
	</div>
	<div class="panel-body">

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="form-group {{ $errors->has('stain_type_id') ? 'has-error' : '' }}">
				{{ Form::label('stain_type_id', 'Stain Type') }}
				{{ Form::select('stain_type_id', array('' => '-- Stain Type --') + $stainTypes, null , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('stain_type_id') }}</span>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="form-group {{ $errors->has('stain_color_id') ? 'has-error' : '' }}">
				{{ Form::label('stain_color_id', 'Stain Color') }}
				{{ Form::select('stain_color_id', array('' => '-- Stain Color --') + $stainColors, null , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('stain_color_id') }}</span>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="form-group {{ $errors->has('stain_sheen_id') ? 'has-error' : '' }}">
				{{ Form::label('stain_sheen_id', 'Stain Sheen') }}
				{{ Form::select('stain_sheen_id', array('' => '-- Stain Sheen --') + $stainSheens, null , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('stain_sheen_id') }}</span>
			</div>
		</div>

	</div>
</div>