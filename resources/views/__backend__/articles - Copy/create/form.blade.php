<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-plus-square" aria-hidden="true"></i>
			{{-- <i class="fa fa-file-text-o" aria-hidden="true"></i> --}}
			Create Article
		</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
					{!! Form::label('title', 'Title', ['class'=>'required']) !!}
					{!! Form::text('title', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
					<span class="text-danger">{{ $errors->first('title') }}</span>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
					{{ Form::label('category_id', 'Category', ['class'=>'required']) }}
					{{ Form::select('category_id', array('' => '-- Category --') + $categories, null , ['class' => 'form-control']) }}
					<span class="text-danger">{{ $errors->first('category_id') }}</span>
				</div>
			</div>

			@if(checkACL('publisher'))
				<div class="col-xs-12 col-sm-3 col-md-3">
					<div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
						{{ Form::label('published_at', 'Publish(ed) On') }}
						{{ Form::text('published_at', null, ['class'=>'form-control', 'id'=>'datetime']) }}
						<span class="text-danger">{{ $errors->first('published_at') }}</span>
					</div>
				</div>
			@endif

		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				
				<div class="form-group {{ $errors->has('description_eng') ? 'has-error' : '' }}">
					{!! Form::label('description_eng', 'Description (En)', ['class'=>'required']) !!}
					{!! Form::textarea('description_eng', null, ["class" => "form-control simple"]) !!}
					<span class="text-danger">{{ $errors->first('description_eng') }}</span>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

				<div class="form-group {{ $errors->has('description_fre') ? 'has-error' : '' }}">
					{!! Form::label('description_fre', 'Description (Fr)') !!}
					{!! Form::textarea('description_fre', null, ['class'=>'form-control simple']) !!}
					<span class="text-danger">{{ $errors->first('description_fre') }}</span>
				</div>

			</div>
		</div>
		
	</div>
</div>