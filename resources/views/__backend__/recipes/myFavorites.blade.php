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
   <li class="active"><span>My Favorite Recipes</span></li>
@stop

@section('content')

   @if($recipes)
      <div class="panel panel-primary">
         <div class="panel-heading" style="position:relative;">
            <h3 class="panel-title">
               <a href="#" id="popover" data-toggle="popover" data-trigger="hover"
                  data-title="My Favorite Recipes"
                  data-content="These recipes were marked as my favorite recipes on the site.">
                  <i class="fa fa-question-circle" aria-hidden="true"></i> My Favorite Recipes
               </a>
            </h3>
         </div>

{{--       <div class="well well-sm text text-center">
            <a href="{{ route('backend.articles.myFavorites') }}" class="{{ Request::is('backend/articles/myFavorites') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
            @foreach($letters as $value)
               <a href="{{ route('backend.articles.myFavorites', $value) }}" class="{{ Request::is('backend/articles/myFavorites/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
            @endforeach
         </div> --}}

         <div class="panel-body">
            <table id="datatable" class="table table-hover table-condensed table-responsive">
               <thead>
                 <tr>
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
                   {{-- @if(ends_with(Route::currentRouteAction(), 'RecipeController@myRecipes')) --}}
                     <th>Status</th>
                   {{-- @endif --}}
                   @if(checkACL('author'))
                     <th data-orderable="false"></th>
                   @endif
                 </tr>
               </thead>
               <tbody>
                 @foreach ($recipes as $recipe)
                   <tr>
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
                     <td class="hidden-sm hidden-xs">
                       @include('common.authorFormat', ['model'=>$recipe, 'field'=>'user'])
                     </td>
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
            <h3 class="panel-title">My Favorite Recipes</h3>
         </div>
         <div class="panel-body">
            <div class="text text-danger">NO RECORDS FOUND</div>
         </div>
      </div>
   @endif
@stop


@section('scripts')

@stop