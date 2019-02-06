<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-sitemap" aria-hidden="true"></i>
			Category Details
		</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4">
				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{{-- {!! Form::text('name', $category->name, ['class'=>'form-control', 'readonly']) !!} --}}
					<div class="well well-sm">
						{{ $category->name }}
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-4">
				<div class="form-group">
					{!! Form::label('value', 'Value') !!}
					{{-- {!! Form::text('value', $category->value, ['class'=>'form-control', 'readonly']) !!} --}}
					<div class="well well-sm">
						{{ $category->value }}
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div class="form-group">
					{{ Form::label('module_id', 'Module') }}
					{{-- {{ Form::text('module_id', $category->module->name, ['class'=>'form-control', 'readonly']) }} --}}
					<div class="well well-sm">
						{{ $category->module->name }}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::label('description', 'Description') !!}
				<div class="well well-sm">
					{!! $category->description !!}
				</div>
			</div>
		</div>  

	</div>
</div>