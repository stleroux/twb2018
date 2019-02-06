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
  <li class="active"><span>Trashed Recipes</span></li>
@stop

@section('content')
<form style="display:inline;">
{!! csrf_field() !!}
@if($recipes->count() > 0)
      <div class="panel panel-danger">
         <div class="panel-heading" style="position:relative;">
            <h3 class="panel-title">
               <a href="#" id="popover" data-toggle="popover" data-trigger="hover"
                  data-title="Trashed Recipes"
                  data-content="These recipes have been marked as deleted and cannot be viewed by frontend users.">
                  <i class="fa fa-question-circle" aria-hidden="true"></i> Trashed Recipes
               </a>

               <button
                  class="btn btn-xs btn-danger pull-right"
                  type="submit"
                  formaction="{{ route('backend.recipes.deleteAll') }}"
                  formmethod="POST"
                  id="bulk-delete"
                  style="display:none; margin-left:2px">
                     Delete Selected
               </button>
               
               <button
                  class="btn btn-xs btn-primary pull-right"
                  type="submit"
                  formaction="{{ route('backend.recipes.restoreAll') }}"
                  formmethod="POST"
                  id="bulk-restore"
                  style="display:none; margin-left:2px">
                     Restore Selected
               </button>

               <button
                  class="btn btn-xs btn-default pull-right"
                  type="submit"
                  formaction="{{ route('backend.recipes.publishAll') }}"
                  formmethod="POST"
                  id="bulk-publish"
                  style="display:none; margin-left:2px">
                     Publish Selected
               </button>

            </h3>
         </div>
</form>
         
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
                   {{-- @if(ends_with(Route::currentRouteAction(), 'RecipeController@myRecipes')) --}}
                     <th>Deleted On</th>
                   {{-- @endif --}}
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
                     <td class="hidden-sm hidden-xs">
                       @include('common.authorFormat', ['model'=>$recipe, 'field'=>'user'])
                     </td>
                     <td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'deleted_at'])</td>

                     @if(checkACL('author'))
                      
                       <td class="text-right">
                        
                           @include('backend.layouts.partials.actionsDD', [
                              'model'=>$recipe,
                              'name'=>'recipes',
                              'params'=>['publish', 'edit', 'permDelete','restore']
                           ])
                        
                       </td>
                      
                     @endif
                   </tr>
                 @endforeach
               </tbody>
            </table>
         </div>

         <div class="panel-footer">
            <table border="0" cellpadding="0" cellspacing="0">
               <tr>
                  <td colspan="2"><strong>Note:</strong></td>
               </tr>
               <tr>
                  <td>Restore</td>
                  <td>: Will restore the individual record. (Removes the deleted_at info but does not change anything else.)</td>
               </tr>
               <tr>
                  <td>Delete</td>
                  <td>: Will <span class="text-danger"><strong>permanently delete</strong></span> the individual record from the database.</td>
               </tr>
               <tr>
                  <td>Publish Selected</td>
                  <td>: Will set the deleted_at field to Null and the published_at field to the current date and time for all selected records.</td>
               </tr>
               <tr>
                  <td>Restore Selected&nbsp;</td>
                  <td>: Will set the deleted_at field to Null for all selected records. (Will not change anything else.)</td>
               </tr>
               <tr>
                  <td>Delete Selected</td>
                  <td>: Will <span class="text-danger"><strong>permanently delete</strong></span> all selected records from the database.</td>
               </tr>
            </table>
         </div>
      </div>
   @else
      <div class="panel panel-primary">
         <div class="panel-heading">
            <h3 class="panel-title">Trashed Articles</h3>
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
               $("#bulk-restore").show();
               $("#bulk-publish").show();
               $(".selectmenu").hide();

            } else {
               $("input[type=checkbox]").each(function () {
                  $(this).attr("checked", false);
               });
               $("#bulk-delete").hide();
               $("#bulk-restore").hide();
               $("#bulk-publish").hide();
               $(".selectmenu").show();
            }
         });
      });

      function checkbox_is_checked() {

         if ($(".check-all:checked").length > 0)
         {
            $("#bulk-delete").show();
            $("#bulk-restore").show();
            $("#bulk-publish").show();
            $(".selectmenu").hide();
         }
         else
         {
            $("#bulk-delete").hide();
            $("#bulk-restore").hide();
            $("#bulk-publish").hide();
            $(".selectmenu").show();
         }
      };
   </script>
@stop