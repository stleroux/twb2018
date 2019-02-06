@extends('backend.layouts.app')

@section ('title','Recipes')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.recipes.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li><span class="active">Recipes</span></li>
@stop

@section('menubar')
{{-- Alternate button bar --}}
{{--   <div class="well well-sm clearfix">
    <div class="pull-right">
      @if(checkACL('author'))
        <a href="{{ route('recipes.create') }}" class="btn btn-success btn-xs btn-sq-sm" title="New Recipe">
          <i class="fa fa-3x fa-plus-square" aria-hidden="true"></i>
          <br />
          NEW
        </a>
      @endif
      @if(checkACL('author'))
        <a href="{{ route('recipes.myFavorites','all') }}"
          class="{{ Request::is('recipes/myFavorites/*') ? "btn-primary": "btn-default" }} btn btn-xs btn-sq-sm"
          title="My Favorites" >
          <i class="fa fa-3x fa-thumbs-o-up" aria-hidden="true"></i>
          <br />
          FAVS
        </a>
      @endif
      @if(checkACL('author'))
        <a href="{{ route('recipes.myRecipes','all') }}"
          class="{{ Request::is('recipes/myRecipes/*') ? "btn-primary": "btn-default" }} btn btn-xs btn-sq-sm"
          title="My Recipes" >
          <i class="fa fa-3x fa-list" aria-hidden="true"></i>
          <br />
          MY
        </a>
      @endif
      @if(checkACL('author'))
        <a href="{{ route('recipes.index','all') }}"
          class="{{ Request::is('recipes/index*') ? "btn-primary": "btn-default" }} btn btn-xs btn-sq-sm"
          title="All Recipes" >
          <i class="fa fa-3x fa-list-alt" aria-hidden="true"></i>
          <br />
          ALL
        </a>
      @endif
    </div>
  </div> --}}



      {{--================================================================================================================================--}}
      {{-- ADD BUTTON                                                                                                                     --}}
      {{--================================================================================================================================--}}
      @if(checkACL('author'))
        <a href="{{ route('backend.recipes.create') }}" class="btn btn-success btn-xs" title="New Recipe">
          @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="fa fa-plus-square" aria-hidden="true"></i> New Recipe
          @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="fa fa-plus-square" aria-hidden="true"></i>
          @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}New Recipe
          @endif
        </a>
      @endif
      {{--================================================================================================================================--}}
      {{-- END ADD BUTTON                                                                                                                 --}}
      {{--================================================================================================================================--}}

      <!-- Only show the Dashboard button if coming from the Dashboard page -->
      @if (false !== stripos($_SERVER['HTTP_REFERER'], "/dashboard"))
        <a href="{{ URL::previous() }}" class="btn btn-xs btn-default">
          <div class="text text-left">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Dashboard
          </div>
        </a>
      @endif

      {{--================================================================================================================================--}}
      {{-- PUBLISHED                                                                                                                      --}}
      {{--================================================================================================================================--}}
      @if(checkACL('publisher'))
        <a href="{{-- {{ route('backend.recipes.published','all') }} --}}" class="{{ Request::is('backend/recipes/published/*') ? "btn-primary": "btn-default" }} btn btn-xs" {{ (Auth::user()->actionButtons == 1) ? 'title=Published' : '' }}>
          {{-- <div class="text text-left">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> My Favorites
          </div> --}}
          @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="fa fa-angle-double-up" aria-hidden="true"></i> Published
          @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="fa fa-angle-double-up" aria-hidden="true"></i>
          @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}Published
          @endif
        </a>
      @endif
      {{--================================================================================================================================--}}
      {{-- END PUBLISHED                                                                                                                  --}}
      {{--================================================================================================================================--}}

      {{--================================================================================================================================--}}
      {{-- NON PUBLISHED                                                                                                                  --}}
      {{--================================================================================================================================--}}
      @if(checkACL('publisher'))
        <a href="{{-- {{ route('backend.recipes.nonPublished','all') }} --}}" class="{{ Request::is('recipes/nonPublished/*') ? "btn-primary": "btn-default" }} btn btn-xs" {{ (Auth::user()->actionButtons == 1) ? 'title=Non Published' : '' }}>
          {{-- <div class="text text-left">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> My Favorites
          </div> --}}
          @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="fa fa-angle-double-down" aria-hidden="true"></i> Non Published
          @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="fa fa-angle-double-down" aria-hidden="true"></i>
          @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}Non Published
          @endif
        </a>
      @endif
      {{--================================================================================================================================--}}
      {{-- END NON PUBLISHED                                                                                                              --}}
      {{--================================================================================================================================--}}

      {{--================================================================================================================================--}}
      {{-- MY FAVORITES                                                                                                                   --}}
      {{--================================================================================================================================--}}
      @if(checkACL('author'))
        <a href="{{-- {{ route('backend.recipes.myFavorites','all') }} --}}" class="{{ Request::is('recipes/myFavorites/*') ? "btn-primary": "btn-default" }} btn btn-xs" {{ (Auth::user()->actionButtons == 1) ? 'title=My Favorites' : '' }}>
          {{-- <div class="text text-left">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> My Favorites
          </div> --}}
          @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> My Favorites
          @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
          @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}My Favorites
          @endif
        </a>
      @endif
      {{--================================================================================================================================--}}
      {{-- END MY FAVORITES                                                                                                               --}}
      {{--================================================================================================================================--}}

      {{--================================================================================================================================--}}
      {{-- MY RECIPES                                                                                                                     --}}
      {{--================================================================================================================================--}}
      @if(checkACL('author'))
        <a href="{{-- {{ route('backend.recipes.myRecipes','all') }} --}}" class="{{ Request::is('recipes/myRecipes*') ? "btn-primary": "btn-default" }} btn btn-xs" {{ (Auth::user()->actionButtons == 1) ? 'title=My Recipes' : '' }}>
          @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="fa fa-list" aria-hidden="true"></i> My Recipes
          @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="fa fa-list" aria-hidden="true"></i>
          @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}My Recipes
          @endif
        </a>
      @endif
      {{--================================================================================================================================--}}
      {{-- END MY RECIPES                                                                                                                 --}}
      {{--================================================================================================================================--}}

      {{--================================================================================================================================--}}
      {{-- ALL RECIPES                                                                                                                    --}}
      {{--================================================================================================================================--}}
      <a href="{{ route('backend.recipes.index','all') }}" class="btn {{ Request::is('recipes/index*') ? "btn-primary": "btn-default" }} btn-xs">
        @if(Auth::check())
          @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="fa fa-book" aria-hidden="true"></i> All Recipes
          @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="fa fa-book" aria-hidden="true"></i>
          @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}All Recipes
          @endif
        @else
          <i class="fa fa-list-alt" aria-hidden="true"></i> All Recipes
        @endif
      </a>
      {{--================================================================================================================================--}}
      {{-- END ALL RECIPES                                                                                                                --}}
      {{--================================================================================================================================--}}
@stop

@section('content')
{{--   <div class="row">
    <div class="col-md-12"> --}}
      @if(ends_with(Route::currentRouteAction(), 'RecipeController@index'))
        @include('recipes.panels.indexAlphabet')
      @endif

      @if(ends_with(Route::currentRouteAction(), 'RecipeController@myRecipes'))
        @include('recipes.panels.myRecipesAlphabet')
      @endif

      @if(ends_with(Route::currentRouteAction(), 'RecipeController@published'))
        @include('recipes.panels.publishedAlphabet')
      @endif

      @if(ends_with(Route::currentRouteAction(), 'RecipeController@nonPublished'))
        @include('recipes.panels.nonPublishedAlphabet')
      @endif

      @if(ends_with(Route::currentRouteAction(), 'RecipeController@index'))
        {{-- <i class="fa fa-book" aria-hidden="true"></i> Recipes --}}
        @include('layouts.partials.section_top', ['name'=>'Recipes', 'icon'=>'fa-book'])
      @endif
      @if(ends_with(Route::currentRouteAction(), 'RecipeController@myFavorites'))
        {{-- <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> My Favorites --}}
        @include('layouts.partials.section_top', ['name'=>'My Favorites', 'icon'=>'fa-thumbs-o-up'])
      @endif
      @if(ends_with(Route::currentRouteAction(), 'RecipeController@myRecipes'))
        {{-- <i class="fa fa-list" aria-hidden="true"></i> My Recipes --}}
        @include('layouts.partials.section_top', ['name'=>'My Recipes', 'icon'=>'fa-list'])
      @endif
      @if(ends_with(Route::currentRouteAction(), 'RecipeController@published'))
        {{-- <i class="fa fa-list" aria-hidden="true"></i> My Recipes --}}
        @include('layouts.partials.section_top', ['name'=>'Published Recipes', 'icon'=>'fa-list'])
      @endif
      @if(ends_with(Route::currentRouteAction(), 'RecipeController@nonPublished'))
        {{-- <i class="fa fa-list" aria-hidden="true"></i> My Recipes --}}
        @include('layouts.partials.section_top', ['name'=>'Non Published Recipes', 'icon'=>'fa-list'])
      @endif

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
                    @include('backend.layouts.partials.authorFormat', ['model'=>$recipe])
                  </td>
                  <td>@include('backend.layouts.partials.dateFormat', ['model'=>$recipe, 'field'=>'published_at'])</td>

                  @if(checkACL('author'))
                    <td>
                      <span class="pull-right">
                        <table>
                          <tr>
                            @if($recipe->published)
                              @if(count($recipe->favorites))
                                <td>
                                  <a class="btn btn-xs btn-default" href="{{-- {{ route('recipes.removefavorite', $recipe->id) }} --}}">
                                    <i class="fa fa-fw fa-minus-circle text-warning" aria-hidden="true" title="Remove from favorites list"></i>
                                  </a>
                                </td>
                              @else
                                <td>
                                  <a class="btn btn-xs btn-default" href="{{-- {{ route('recipes.addfavorite', $recipe->id) }} --}}">
                                    <i class="fa fa-fw fa-plus-circle text-info" aria-hidden="true" title="Add to favorites list"></i>
                                  </a>
                                </td>
                              @endif
                            @endif
                            
                            @if(checkACL('publisher'))
                              @if($recipe->published)
                                <td>
                                  <a class="btn btn-xs btn-warning" href="{{-- {{ route('recipes.unpublish', $recipe->id) }} --}}">
                                    <i class="fa fa-fw fa-arrow-down" aria-hidden="true" title="Un-publish"></i>
                                  </a>
                                </td>
                              @else
                                <td>
                                  <a class="btn btn-xs btn-info" href="{{-- {{ route('recipes.publish', $recipe->id) }} --}}">
                                    <i class="fa fa-fw fa-arrow-up" aria-hidden="true" title="Publish"></i>
                                  </a>
                                </td>
                              @endif
                            @endif

                            @if((checkACL('editor')) || checkOwner($recipe))
                              <td>
                                <a class="btn btn-xs btn-primary" href="{{-- {{ route('recipes.edit', $recipe->id) }} --}}">
                                  <i class="fa fa-fw fa-pencil" title="Edit"></i>
                                </a>
                              </td>
                            @else
                              <td>
                                <a class="btn btn-xs" disabled="disabled" href="#">
                                  <i class="fa fa-fw fa-pencil text-primary" title="Edit"></i>
                                </a>
                              </td>
                            @endif

                            @if((checkACL('manager')) || checkOwner($recipe))
                              <td class="clearfix">
                                <form method="POST" action="{{-- {{ route('recipes.destroy', $recipe->id) }} --}}"
                                  accept-charset="UTF-8" style="display:inline;">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a
                                    class="btn btn-danger btn-xs"
                                    {{ Auth::user()->actionButtons == 2 ? 'title=Delete' : '' }}
                                    type="button"
                                    data-toggle="modal"
                                    data-id="{{ $recipe->id }}"
                                    data-target="#confirmDelete"
                                    data-title="Delete Recipe"
                                    data-message="Are you sure you want to delete this recipe?">
                                      <i class="fa fa-fw fa-trash" title="Delete"></i>
                                  </a>
                                </form>
                              </td>
                            @else
                              <td>
                                <a class="btn btn-xs" disabled="disabled" href="#">
                                  <i class="fa fa-fw fa-trash text-primary" title="Delete"></i>
                                </a>
                              </td>
                            @endif
                          </tr>
                        </table>
                      </span>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>

      @if(checkACL('publisher'))
        <div class="panel-footer">
          All items are shown here whether they are published or not
        </div>
      @endif
      
    {{-- @include('layouts.partials.section_close') --}}
@stop
