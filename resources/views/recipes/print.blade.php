@extends ('layouts.print')

@section ('title', 'Print Recipe')

@section ('stylesheets')
	{{ Html::style('css/print.css') }}
@stop

@section ('content')

	<br />
	<div class="panel panel-default">
		
		<div class="panel-heading">
			<h3 class="panel-title">{{ ucwords($recipe->title) }}</h3>
		</div>
		
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">Ingredients</div>
						<div class="panel-body">
							{!! $ingredients = str_replace(array('<p>','</p>'),array('','<br />'),$recipe->ingredients) !!}<br />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">Information</div>
						<div class="panel-body">
							<table width="100%">
								<tr>
									<th>Category</th>
									<td>{{ $recipe->category->name }}</td>
								</tr>
								<tr>
									<th>Servings</th>
									<td>{{ $recipe->servings }}</td>
								</tr>
								<tr>
									<th>Prep Time</th>
									<td>{{ $recipe->prep_time }} minutes</td>
								</tr>
								<tr>
									<th>Cook Time</th>
									<td>{{ $recipe->cook_time }} minutes</td>
								</tr>
								<tr>
									<th>Created By</th>
									<td>{{ $recipe->user->profile->first_name }} {{ $recipe->user->profile->last_name }}</td>
								</tr>
								<tr>
									<th>Created On</th>
		
									<td>@include('common.dateFormat', ['dateFormat'=>Auth::user()->dateFormat, 'model'=>$recipe, 'field'=>'created_at'])</td>
								</tr>
								<tr>
									<th>Source</th>
									<td>
										@if ($recipe->source)
											{{ $recipe->source }}
										@else
											N/A
										@endif
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">Image</div>
						<div class="panel-body text text-center">
							@if ($recipe->image)
								{{ Html::image("_recipes/" . $recipe->image, "", array('height'=>'200','width'=>'200')) }}
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">Methodology</div>
						<div class="panel-body">{!! $recipe->methodology !!}</div>
					</div>
					<div class="panel panel-default" style="margin-bottom: 0px">
						<div class="panel-heading">Notes</div>
						<div class="panel-body">
							@if ($recipe->public_notes) 
								{!! $recipe->public_notes !!}
							@else
								N/A
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel-footer">
			From the Recipe Book at TheWoodBarn.ca
		</div>
	</div>

@stop
