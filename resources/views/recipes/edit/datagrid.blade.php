<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Edit Recipe</h3>
	</div>

	<div class="panel-body">
		<div class="row">

			<!-- Title -->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
					{!! Form::label("title", "Title", ['class'=>'required']) !!}
					{!! Form::text("title", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
					<span class="text-danger">{{ $errors->first('title') }}</span>
				</div>
			</div>

			<!-- Category -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
					{{ Form::label('category_id', 'Category', ['class'=>'required']) }}
					{{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}
					<span class="text-danger">{{ $errors->first('category_id') }}</span>
				</div>
			</div>

			<!-- Publish Date -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
					{{ Form::label('published_at', 'Publish(ed) On') }}
					{{ Form::text('published_at', null, ['class'=>'form-control required', 'id'=>'datetime']) }}
					<span class="text-danger">{{ $errors->first('published_at') }}</span>
				</div>
			</div>

			<!-- Ingredients -->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="form-group {{ $errors->has('ingredients') ? 'has-error' : '' }}">
					{{ Form::label('ingredients', 'Ingredients', ['class'=>'required']) }} <small>(One per line)</small>
					{{ Form::textarea('ingredients', null, ['class'=>'form-control simple', 'rows'=>'8']) }}
					<span class="text-danger">{{ $errors->first('ingredients') }}</span>
				</div>
			</div>
			
			<!-- Methodology -->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="form-group {{ $errors->has('methodology') ? 'has-error' : '' }}">
					{{ Form::label('methodology', 'Methodology', ['class'=>'required']) }} <small>(One per line)</small>
					{{ Form::textarea('methodology', null, ['class'=>'form-control simple', 'rows'=>'8']) }}
					<span class="text-danger">{{ $errors->first('methodology') }}</span>
				</div>
			</div>

			<!-- Servings -->
			<div class="col-xs-6 col-md-3 col-lg-2">
				<div class="form-group {{ $errors->has('servings') ? 'has-error' : '' }}" >
					{!! Form::label("servings", "Servings") !!}
					{{ Form::number ('servings', null, array('class' => 'form-control')) }}
					<span class="text-danger">{{ $errors->first('servings') }}</span>
				</div>
			</div>

			<!-- Prep Time -->
			<div class="col-xs-6 col-md-3 col-lg-2">
				<div class="form-group {{ $errors->has('prep_time') ? 'has-error' : '' }}" >
					{!! Form::label("prep_time", "Prep Time") !!}
					{{ Form::number ('prep_time', null, array('class' => 'form-control', 'placeholder'=>'minutes')) }}
					<span class="text-danger">{{ $errors->first('prep_time') }}</span>
				</div>
			</div>

			<!-- Cook Time -->
			<div class="col-xs-6 col-md-3 col-lg-2">
				<div class="form-group {{ $errors->has('cook_time') ? 'has-error' : '' }}" >
					{!! Form::label("cook_time", "Cook Time") !!}
					{{ Form::number ('cook_time', null, array('class' => 'form-control', 'placeholder'=>'minutes')) }}
					<span class="text-danger">{{ $errors->first('cook_time') }}</span>
				</div>
			</div>

			<!-- Make Private -->
			<div class="col-xs-6 col-md-3 col-lg-2">
				<div class="form-group {{ $errors->has('private') ? 'has-error' : '' }}" >
					{!! Form::label("personal", "Make Private") !!}
					{{ Form::select('personal', array('0' => 'No', '1' => 'Yes'), $recipe->personal, ['class'=>'form-control']) }}
					{{-- <input type="checkbox" name="personal" 
								  data-toggle="toggle"
								  data-on="Yes"
								  data-off="No"
							 > --}}
				</div>
			</div>
			
			<!-- Public Notes -->
			<div class="col-xs-12 col-md-6">
				<div class="form-group {{ $errors->has('public_notes') ? 'has-error' : '' }}" >
					{!! Form::label("public_notes", "Public Notes") !!}
					{{ Form::textarea ('public_notes', null, array('class' => 'form-control simple', 'rows'=>'2')) }}
				</div>
			</div>
		
			<!-- Author's Notes -->
			<div class="col-xs-12 col-md-6">
				<div class="form-group {{ $errors->has('public_notes') ? 'has-error' : '' }}" >
					{!! Form::label("author_notes", "Author's Personal Notes") !!} <small>(not shown to public)</small>
					{{ Form::textarea ('author_notes', null, array('class' => 'form-control simple', 'rows'=>'2')) }}
				</div>
			</div>

			<!-- Source -->
			<div class="col-xs-12 col-sm-6">
				<div class="form-group {{ $errors->has('source') ? 'has-error' : '' }}">
					{!! Form::label("source", "Source") !!}
					{!! Form::text("source", null, ["class" => "form-control"]) !!}
					<span class="text-danger">{{ $errors->first('source') }}</span>
				</div>
			</div>

			<!-- Image -->
			<div class="col-xs-6 col-sm-2">
				<table width="100%">
					<tr>
						<th>Current Image</th>
					</tr>
					<tr>
						<td>
							@if ($recipe->image)
								{{ Html::image("_recipes/" . $recipe->image, "", array('height'=>'125','width'=>'125')) }}
							@else
								<i class="fa fa-5x fa-ban" aria-hidden="true"></i>
							@endif
						</td>
					</tr>
				</table>
			</div>

			<div class="col-xs-6 col-sm-4">
				{!! Form::label("image", "Replace Image") !!} <small></small>
				{{ Form::file('image', ['class'=>'form-control']) }}
				<span class="help-block">Only choose new image to replace the existing one.</span>
			</div>


		</div>
	</div>
</div>