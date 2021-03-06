<div class="panel panel-primary">
	
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
			Album Details
		</h3>
	</div>
	
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('name', 'Album Name', ['class'=>'required']) !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
					{{ Form::label ('cover_image', 'Cover Image', ['class'=>'required']) }}
					{{ Form::file('cover_image', ['class'=>'form-control']) }}
					<span class="text-danger">{{ $errors->first('cover_image') }}</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6">
				<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
					{!! Form::label('description', 'Album Description', ['class'=>'required']) !!}
					{!! Form::textarea('description', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
					<span class="text-danger">{{ $errors->first('description') }}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="panel-footer">
		Items marked with an <span class='required'></span> are required.
	</div>

</div>
