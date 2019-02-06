{{-- Page to display Recipes in frontend --}}

@extends('layouts.app')

@section('title', '| My Recipes')

@section('stylesheets')
   {{ Html::style('css/recipes.css') }}
@stop

@section('sectionSidebar')
   @include('recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="/">Home</a></li>
   <li class="active"><span>My Recipes</span></li>
@stop

@section('content')
   <form style="display:inline;">
      {!! csrf_field() !!}
      
      <div class="panel panel-primary">
         @include('recipes.myRecipes.panelHeader')
         @include('recipes.myRecipes.alphabet')
         @include('recipes.myRecipes.help')
         <div class="panel-body">
            @if($recipes->count())
               @include('recipes.myRecipes.datagrid')
            @else
               @include('common.noRecordsFound')
            @endif
         </div>
      </div>
@stop

@section('blocks')
   @include('recipes.myRecipes.controls')
   {{-- @include('recipes.blocks.archives') --}}
@stop

@section('scripts')
   @include('recipes.common.btnScript')
@stop
