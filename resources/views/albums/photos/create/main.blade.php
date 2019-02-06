<div class="panel panel-primary">

	<div class="panel-heading">
		<h3 class="panel-title"><strong>Photo Details</strong></h3>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('ori_name', 'Image Name', ['class'=>'required']) !!}
					{!! Form::text('ori_name', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
					{{ Form::label ('photo', 'Photo') }}
					{{ Form::file('photo', ['class'=>'form-control']) }}
					<span class="text-danger">{{ $errors->first('photo') }}</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6">
				<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
					{!! Form::label('description', 'Photo Description') !!}
					{!! Form::textarea('description', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
					<span class="text-danger">{{ $errors->first('description') }}</span>
				</div>
			</div>
		</div>
	</div>

</div>