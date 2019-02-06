{{-- GENERAL INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">General Information</div>
	</div>
	<div class="panel-body">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				{!! Form::label('name', 'Project Name', ['class'=>'required']) !!}
				{!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
				<span class="text-danger">{{ $errors->first('name') }}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
				{{ Form::label('category_id', 'Category', ['class'=>'required']) }}
				{{ Form::select('category_id', array('' => '-- Category --') + $categories, null , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('category_id') }}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
				{{ Form::label ('main_image', 'Main Image', ['class'=>'required']) }}
				{{ Form::file('main_image', ['class'=>'form-control']) }}
				<span class="text-danger">{{ $errors->first('main_image') }}</span>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
				{!! Form::label('description', 'Project Description', ['class'=>'required']) !!}
				{!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>3]) !!}
				<span class="text-danger">{{ $errors->first('description') }}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
			<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
				{!! Form::label('price', 'Price') !!}
				{!! Form::number('price', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('price') }}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
				{!! Form::label('time_invested', 'Shop Time') !!} <small>(Hrs)</small>
				{!! Form::number('time_invested', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('time_invested') }}</span>
			</div>
		</div>
	</div>
</div>