@extends ('backend.layouts.app')

@section ('title', 'Create Recipe')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.recipes.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.recipes.index') }}">Recipes</a></li>
	<li><span class="active">Create Recipe</span></li>
@stop

@section ('content')
	{!! Form::open(['route' => 'backend.recipes.store', 'files'=>'true']) !!}
		<input type="hidden" value="{{ $ref }}" name="ref" size="50"/>



	<div class="panel panel-primary">
		
		<div class="panel-heading">
			<h3 class="panel-title">Create Recipe</h3>
		</div>

		<div class="panel-body">
		  <div class="row">
		  	
			 <div class="col-lg-8">
				<div class="panel panel-default">
				  <div class="panel-heading required">Name</div>
				  <div class="panel-body">
					 <div class="{{ $errors->has('title') ? 'has-error' : '' }}" >
						{{ Form::text ('title', null, array('class' => 'form-control', 'autofocus'=>'autofocus')) }}
						<span class="text-danger">{{ $errors->first('title') }}</span>
					 </div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading required">Ingredients <small>(One per line)</small></div>
					 <div class="{{ $errors->has('ingredients') ? 'has-error' : '' }}" >
						{{ Form::textarea ('ingredients', null, array('class' => 'form-control simple', 'rows'=>'5')) }}
						<span class="text-danger">{{ $errors->first('ingredients') }}</span>
					 </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading required">Methodology <small>(One per line)</small></div>
					 <div class="{{ $errors->has('methodology') ? 'has-error' : '' }}" >
						{{ Form::textarea ('methodology', null, array('class' => 'form-control simple', 'rows'=>'5')) }}
						<span class="text-danger">{{ $errors->first('methodology') }}</span>
					 </div>
				</div>
			 </div>
			 <div class="col-lg-4">
				<div class="panel panel-default">
				  <div class="panel-heading required">Category</div>
				  <div class="panel-body">
					 <div class="{{ $errors->has('category_id') ? 'has-error' : '' }}" >
						{{ Form::select('category_id', array(''=>'Select a category') + $categories, null, ['class'=>'form-control']) }}
						<span class="text-danger">{{ $errors->first('category_id') }}</span>
					 </div>
				  </div>
				</div>
			 </div>
			 
			 <div class="col-lg-4">
				<div class="panel panel-default">
				  <div class="panel-heading">Image</div>
				  <div class="panel-body">
						{{ Form::file('image', ['class'=>'form-control']) }}
				  </div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading">Source</div>
				  <div class="panel-body">
					 {{ Form::text ('source', null, array('class' => 'form-control')) }}
				  </div>
				</div>
			 
				<div class="panel panel-default">
				  <div class="panel-heading required">Servings</div>
				  <div class="panel-body">
					 <div class="{{ $errors->has('servings') ? 'has-error' : '' }}" >
						{{ Form::number ('servings', null, array('class' => 'form-control')) }}
						<span class="text-danger">{{ $errors->first('servings') }}</span>
					 </div>
				  </div>
				</div>
			 
				<div class="panel panel-default">
				  <div class="panel-heading required">Prep Time</div>
				  <div class="panel-body">
					 <div class="{{ $errors->has('prep_time') ? 'has-error' : '' }}" >
						{{ Form::number ('prep_time', null, array('class' => 'form-control', 'placeholder'=>'minutes')) }}
						<span class="text-danger">{{ $errors->first('prep_time') }}</span>
					 </div>
				  </div>
				</div>
			 
				<div class="panel panel-default">
				  <div class="panel-heading required">Cook Time</div>
				  <div class="panel-body">
					 <div class="{{ $errors->has('cook_time') ? 'has-error' : '' }}" >
						{{ Form::number ('cook_time', null, array('class' => 'form-control', 'placeholder'=>'minutes')) }}
						<span class="text-danger">{{ $errors->first('cook_time') }}</span>
					 </div>
				  </div>
				</div>
			 
				<div class="panel panel-default">
				  <div class="panel-heading">Make Private</div>
				  <div class="panel-body text-center">
					 {{ Form::select('personal', array('0' => 'No', '1' => 'Yes'), 0, ['class'=>'form-control']) }}
				  </div>
				</div>
			 </div>
		  </div>

		  <div class="row">
			 <div class="col-lg-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Public Notes</div>
					 {{ Form::textarea ('public_notes', null, array('class' => 'form-control simple', 'rows'=>'2')) }}
				</div>
			 </div>
			 <div class="col-lg-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Author's Personal Notes <small>(not shown to public)</small></div>
					 {{ Form::textarea ('author_notes', null, array('class' => 'form-control simple', 'rows'=>'2')) }}
				</div>
			 </div>
		  </div>
		</div>
	 </div>
@stop

@section('blocks')
		@include('backend.recipes.create.controls')
	{!! Form::close() !!}
@stop

@section ('scripts')
@stop