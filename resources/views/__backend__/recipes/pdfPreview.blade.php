@extends('backend.layouts.app')

{{-- <style type="text/css">
   table td, table th{
      border:1px solid black;
   }
</style> --}}
@section('breadcrumb')
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="{{ route('backend.recipes.index') }}">Recipes</a></li>
    <li class="active"><span>PDF Preview</span></li>
@stop

@section('sectionSidebar')
  @include('backend.recipes.sidebar')
@stop

@section('content')
   <div class="panel panel-primary">
      <div class="panel-heading">
         <h3 class="panel-title"><strong>Articles Details</strong></h3>
      </div>

      <table class="table table-condensed">
         <tbody>
            @foreach ($recipes as $key => $recipe)
               <tr>
                  <td width="15%" class="active">No</td>
                  <td>
                     {{-- {{ ++$key }} --}}
                     {{ $recipe->id }}
                  </td>
               </tr>
               <tr>
                  <td class="active">Title</td>
                  <td>{{ $recipe->title }}</td>
               </tr>
               <tr>
                  <td class="active">Prep Time</td>
                  <td>{{ $recipe->prep_time }}</td>
               </tr>
               <tr>
                  <td class="active">Servings</td>
                  <td>{{ $recipe->servings }}</td>
               </tr>
               <tr>
                  <td colspan="2">&nbsp;</td>
               </tr>
            @endforeach
         </tbody>
      </table>

   </div>

@stop