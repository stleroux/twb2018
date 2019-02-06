<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-sitemap" aria-hidden="true"></i>
			Category
		</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			
			<div class="col-xs-6 col-sm-4">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{{ Form::label('name', 'Name', ['class'=>'required']) }}
					{{ Form::text('name', null, ['class' => 'form-control', 'autofocus', "onfocus"=>"this.focus();this.select()"]) }}
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>

			<div class="col-xs-6 col-sm-4">
				<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
					{{ Form::label('value', 'Value') }}
					{{ Form::text('value', null, ['class' => 'form-control']) }}
					<span class="text-danger">{{ $errors->first('value') }}</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-4">
				<div class="form-group {{ $errors->has('module_id') ? 'has-error' : '' }}">
					{{ Form::label('module_id', 'Module', ['class'=>'required']) }}
					{{ Form::select('module_id', array(''=>'Select a module') + $modules, null, ['class'=>'form-control']) }}
					<span class="text-danger">{{ $errors->first('module_id') }} </span>
				</div>
			</div>

			
			<div class="col-xs-12">
				<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
					{{ Form::label('description', 'Description', ['class'=>'required']) }}
					{{ Form::textarea('description', null, ['class' => 'form-control input-sm', 'rows'=>3]) }}
					<span class="text-danger">{{ $errors->first('description') }}</span>
				</div>
			</div>

		</div>
	</div>
</div>