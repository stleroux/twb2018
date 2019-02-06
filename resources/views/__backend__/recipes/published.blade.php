@extends('backend.layouts.app')

@section('title','Recipes')

@section('stylesheets')
@stop

@section('sectionSidebar')
	 @include('backend.recipes.sidebar')
@stop

@section('breadcrumb')
	 <li><a href="dashboard">Dashboard</a></li>
	 <li><a href="{{ route('backend.recipes.index') }}">Recipes</a></li>
	 <li class="active"><span>Published Recipes</span></li>
@stop

@section('content')
<form style="display:inline;">
{{-- <form method="POST" action="{{ route('backend.recipes.trashAll') }}"> --}}
	 {!! csrf_field() !!}
	 
	@if($recipes->count() > 0)
		<div class="panel panel-primary">
			<div class="panel-heading" style="position:relative;">
				<h3 class="panel-title">
					<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
						data-title="Published Recipes"
						data-content="These recipes are available for viewing by all users.">
						<i class="fa fa-question-circle" aria-hidden="true"></i> Published Recipes
					</a>

					<button
						class="btn btn-xs btn-danger pull-right"
						type="submit"
						formaction="{{ route('backend.recipes.trashAll') }}"
						formmethod="POST"
						id="bulk-delete"
						style="display:none; margin-left:2px"
						onclick="return confirm('Are you sure you want to trash these recipes?')">
						Trash Selected
					</button>
							 
					<button
						class = "btn btn-xs btn-default pull-right"
						type="submit"
						formaction="{{ route('backend.recipes.unpublishAll') }}"
						formmethod="POST"
						id="bulk-unpublish"
						style="display:none; margin-left:2px"
						onclick="return confirm('Are you sure you want to unpublish these recipes?')">
						Unpublish Selected
					</button>

				</h3>
			</div>
</form>

			<div class="well well-sm text text-center">
				<a href="{{ route('backend.recipes.published') }}" class="{{ Request::is('backend/recipes/published') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
				@foreach($letters as $value)
					 <a href="{{ route('backend.recipes.published', $value) }}" class="{{ Request::is('backend/recipes/published/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
				@endforeach
			</div>

			<div class="panel-body">
			<table id="datatable" class="table table-hover table-condensed table-responsive">
				<thead>
					<tr>
						<th><input type="checkbox" id="selectall" class="checked" /></th>
						{{-- Add columns for search purposes only --}}
						<th class="hidden">Ingredients</th>
						<th class="hidden">Methodology</th>
						<th class="hidden">Public Notes</th>
						<th class="hidden">Source</th>
						{{-- Add columns for search purposes only --}}

						<th>Title</th>
						<th class="hidden-xs">Category</th>
						<th class="hidden-sm hidden-xs">Views</th>
						<th class="hidden-sm hidden-xs">Author</th>
						<th>Published On</th>
						@if(checkACL('author'))
							<th data-orderable="false"></th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($recipes as $recipe)
						<tr>
							<td>
								<input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{$recipe->id}}" class="check-all">
							</td>
							{{-- Add columns for search purposes only --}}
							<td class="hidden">{{ $recipe->ingredients }}</td>
							<td class="hidden">{{ $recipe->methodology }}</td>
							<td class="hidden">{{ $recipe->public_notes }}</td>
							<td class="hidden">{{ $recipe->source }}</td>
							{{-- Add columns for search purposes only --}}

							<td>
								<a href="{{ route('backend.recipes.show', $recipe->id) }}">{{ ucfirst($recipe->title) }}</a>
							</td>
							<td class="hidden-xs">{{ $recipe->category->name }}</td>
							<td class="hidden-sm hidden-xs">{{ $recipe->views }}</td>
							<td class="hidden-sm hidden-xs">@include('common.authorFormat', ['model'=>$recipe, 'field'=>'user'])</td>
							<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'published_at'])</td>

							{{-- @if(checkACL('author')) --}}
								<td class="text-right">
									@include('backend.layouts.partials.actionsDD', [
										'model'=>$recipe,
										'name'=>'recipes',
										'params'=>['favorites', 'duplicate', 'resetViewCount', 'publish', 'edit', 'delete', 'permDelete','restore']
									])
								</td>
							{{-- @endif --}}
						</tr>
					@endforeach
				</tbody>
				</table>
			</div>
			</div>
			 
	@else
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Articles</h3>
			</div>
			<div class="panel-body">
				<div class="text text-danger">NO RECORDS FOUND</div>
			</div>
		</div>
	@endif
@stop

@section('scripts')
	 <script>

			$(function () {
				 $("#selectall").click(function () {
						if ($("#selectall").is(':checked')) {
							 $("input[type=checkbox]").each(function () {
									$(this).attr("checked", true);
							 });
							 $("#bulk-delete").show();
							 $("#bulk-unpublish").show();
							 $(".selectmenu").hide();

						} else {
							 $("input[type=checkbox]").each(function () {
									$(this).attr("checked", false);
							 });
							 $("#bulk-delete").hide();
							 $("#bulk-unpublish").hide();
							 $(".selectmenu").show();
						}
				 });
			});

			function checkbox_is_checked() {

				 if ($(".check-all:checked").length > 0)
				 {
						$("#bulk-delete").show();
						$("#bulk-unpublish").show();
						$(".selectmenu").hide();
				 }
				 else
				 {
						$("#bulk-delete").hide();
						$("#bulk-unpublish").hide();
						$(".selectmenu").show();
				 }
			};

	 </script>

@stop