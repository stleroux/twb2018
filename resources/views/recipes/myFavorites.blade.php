{{-- Page to display Recipes in frontend --}}

@extends('layouts.app')

@section('title', '| My Favorite Recipes')

@section('stylesheets')
   {{ Html::style('css/recipes.css') }}
@stop

@section('sectionSidebar')
   @include('recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="/">Home</a></li>
   <li class="active"><span>My Favorite Recipes</span></li>
@stop

@section('content')
   <form style="display:inline;">
      {!! csrf_field() !!}
      
      <div class="panel panel-primary">
         @include('recipes.myFavorites.panelHeader')
         {{-- @include('recipes.myFavorites.alphabet') --}}
         @include('recipes.myFavorites.help')
         <div class="panel-body">
            @if($recipes)
               @include('recipes.myFavorites.datagrid')
            @else
               @include('common.noRecordsFound')
            @endif
         </div>
      </div>
@stop

@section('blocks')
   @include('recipes.myFavorites.controls')
   {{-- @include('recipes.blocks.archives') --}}
@stop

@section('scripts')
   @include('recipes.common.btnScript')
@stop
