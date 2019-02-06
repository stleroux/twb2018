{{-- Page to display Recipes in frontend --}}

@extends('layouts.app')

@section('title', '| Unpublished Recipes')

@section('stylesheets')
   {{ Html::style('css/recipes.css') }}
@stop

@section('sectionSidebar')
   @include('recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="/">Home</a></li>
   <li class="active"><span>Unpublished Recipes</span></li>
@stop

@section('menubar')
   @include('recipes.menubar')
@endsection

@section('content')
    {{-- {{ Session::get('backURL') }} --}}

   <form style="display:inline;">
      {!! csrf_field() !!}
      
      <div class="panel panel-primary">
         @include('recipes.unpublished.panelHeader')
         @include('recipes.unpublished.alphabet')
         @include('recipes.unpublished.help')
         <div class="panel-body">
            @if($recipes->count())
               @include('recipes.unpublished.datagrid')
            @else
               @include('common.noRecordsFound')
            @endif
         </div>
      </div>
@stop

@section('blocks')
   @include('recipes.unpublished.controls')
   {{-- @include('recipes.blocks.archives') --}}
@stop

@section('scripts')
   @include('recipes.common.btnScript')
@stop
