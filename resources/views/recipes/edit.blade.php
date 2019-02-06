@extends ('layouts.app')

@section ('title', 'Edit Recipe')

@section ('stylesheets')
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('sectionSidebar')
    @include('recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li><a href="{{ route('recipes.index') }}">Recipes</a></li>
   <li class="active"><span>Update Recipe</span></li>
@stop

@section('menubar')
      
@stop

@section ('content')
   {!! Form::model($recipe, ['route'=>['recipes.update', $recipe->id], 'method' => 'PUT', 'files' => true]) !!}
      {{-- <input type="hidden" value="{{ $ref }}" name="ref" size="50"/> --}}
      @include('recipes.edit.datagrid1')
@stop

@section('blocks')
      @include('recipes.edit.controls')
   {!! Form::close() !!}
@stop

@section ('scripts')
   <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop