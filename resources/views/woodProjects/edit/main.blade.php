{{-- GENERAL INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">General Information</div>
	</div>
	<div class="panel-body">
		<div class="col-xs-12 col-sm-4">
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				{!! Form::label('name', 'Project Name', ['class'=>'required']) !!}
				{!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
				<span class="text-danger">{{ $errors->first('name') }}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
				{{ Form::label('category_id', 'Category', ['class'=>'required']) }}
				{{-- {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }} --}}
				{{ Form::select('category_id', array('' => '-- Category --') + $categories, null , ['class' => 'form-control']) }}
				<span class="text-danger">{{ $errors->first('category_id') }}</span>
			</div>
		</div>
		<div class="col-xs-10 col-sm-3">
			<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
				<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
					data-title="Main Image"
					data-content="Only select a new image if you wish to replace the existing one.">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				{{ Form::label ('main_image', 'Main Image') }}
				{{ Form::file('main_image', ['class'=>'form-control']) }}
				<span class="text-danger">{{ $errors->first('main_image') }}</span>
			</div>
		</div>
		<div class="col-xs-2 col-sm-1">
			<img src="/_woodProjects/main_images/thumbs/{{ $project->main_image }}" alt="{{ $project->name}}" height="60" width="60"
			style="margin-top:10px">
		</div>
		<div class="col-xs-12">
			<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
				{!! Form::label('description', 'Project Description', ['class'=>'required']) !!}
				{!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>3]) !!}
				<span class="text-danger">{{ $errors->first('description') }}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2">
			<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
				{!! Form::label('price', 'Price') !!}
				{!! Form::number('price', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('price') }}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2">
			<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
				{!! Form::label('time_invested', 'Time Invested') !!}
				{!! Form::number('time_invested', null, ['class' => 'form-control']) !!}
				<span class="text-danger">{{ $errors->first('time_invested') }}</span>
			</div>
		</div>
	</div>
</div>