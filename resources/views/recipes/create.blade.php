@extends('layouts.app')

@section ('title', 'Create Recipe')

@section ('stylesheets')
@stop

@section('sectionSidebar')
   @include('recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li><a href="{{ route('recipes.index') }}">Recipes</a></li>
   <li><span class="active">Create Recipe</span></li>
@stop

@section('content')
   {!! Form::open(['route' => 'recipes.store', 'files'=>'true']) !!}
      <input type="hidden" value="{{ $ref }}" name="ref" size="50"/>
      @include('recipes.create.datagrid1')
@stop

@section('blocks')
      @include('recipes.create.controls')
   {!! Form::close() !!}
@endsection

@section ('scripts')
@stop
