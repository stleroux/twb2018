{{-- Page to display Recipes in frontend --}}

@extends('layouts.app')

@section ('title', '| New Recipes')

@section ('stylesheets')
   {{ Html::style('css/recipes.css') }}
@stop

@section('sectionSidebar')
   @include('recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="/">Home</a></li>
   <li class="active"><span>New Recipes</span></li>
@stop

@section('menubar')
   @include('recipes.menubar')
@endsection

@section('content')
   <form style="display:inline;">
      {!! csrf_field() !!}
      
      <div class="panel panel-primary">
         @include('recipes.newRecipes.panelHeader')
         @include('recipes.newRecipes.alphabet')
         @include('recipes.newRecipes.help')
         <div class="panel-body">
            @if($recipes->count())
               @include('recipes.newRecipes.datagrid')
            @else
               @include('common.noRecordsFound')
            @endif
         </div>
      </div>
@stop

@section('blocks')
   @include('recipes.newRecipes.controls')
   {{-- @include('recipes.blocks.archives') --}}
@stop