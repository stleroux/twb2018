{{-- <div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">Add Category</h4>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'categories.store', 'class'=>'form-inline']) !!}
			<div class="form-group">
				<label class="sr-only" for="CategoryName"></label>
				<input type="text" class="form-control" id="categoryName" placeholder="Category Name">
			</div>
			<div class="form-group">
				<label class="sr-only" for="value">Value</label>
				<input type="text" class="form-control" id="value" placeholder="Value">
			</div>
			{{ Form::button('<i class="fa fa-save"></i> Save ', ['type' => 'submit', 'class' => 'btn btn-success'])  }}
		</form>
	</div>
</div> --}}

<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'categories.store']) !!}
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						{{ Form::label('name', 'Category Name', ['class'=>'required']) }}
						{{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
						{{ Form::label('value', 'Value') }}
						{{ Form::text('value', null, ['class' => 'form-control', 'placeholder'=>'See Category Help for details.']) }}
						<span class="text-danger">{{ $errors->first('value') }}</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
						{{ Form::label('description', 'Description') }}
						{{ Form::textarea('description', null, ['class' => 'form-control', 'rows'=>3]) }}
						<span class="text-danger">{{ $errors->first('description') }}</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="form-group {{ $errors->has('module_id') ? 'has-error' : '' }}">
						{{ Form::label('module_id', 'Module', ['class'=>'required']) }}
						{{ Form::select('module_id', array(''=>'Select a module') + $modules, null, ['class'=>'form-control']) }}
						<span class="text-danger">{{ $errors->first('module_id') }} </span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					
					{{ Form::button('<i class="fa fa-save"></i> Save ', ['type' => 'submit', 'class' => 'btn btn-block btn-success'])  }}
					{{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-block btn-default']) }}
				</div>
			</div>

		{!! Form::close() !!}
	</div>

	<div class="panel-footer">
			<div>Fields with <i class="fa fa-star" style="color:#ff0000" aria-hidden="true"></i> are required</div>
		</div>
</div>


{{-- {{ Form::button('<div class="text text-left"><i class="fa fa-save" aria-hidden="true"></i> Save</div>', array('type' => 'submit', 'class' => 'btn btn-xs btn-success btn-block')) }} --}}