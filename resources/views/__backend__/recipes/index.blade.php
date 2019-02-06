@extends('backend.layouts.app')

@section('title','Recipes')

@section('stylesheets')
@stop

@section('sectionSidebar')
   @include('backend.recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li class="active"><span>Recipes</span></li>
@stop

@section('content')
   <div class="panel panel-primary">
      <div class="panel-heading">
         <h3 class="panel-title">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
            Recipes
         </h3>
      </div>
      <div class="panel-body">
         <p>Select the option in the menu on the left that represents the type of recipes you wish to display or the action you wish to take.</p>

         <table class="table table-hover">
            <thead>
               <tr>
                  <th>Page</th>
                  <th>Description</th>
                  <th>Minimum Permission</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Recipes</td>
                  <td>This page.</td>
                  <td>Authenticated User</td>
               </tr>
               <tr>
                  <td>New Recipes</td>
                  <td>These recipes were added since the last time you logged in.</td>
                  <td>Author</td>
               </tr>
               <tr>
                  <td>Published</td>
                  <td>These recipes are available for viewing by logged in users.</td>
                  <td>User</td>
               </tr>
               <tr>
                  <td>Created By Me</td>
                  <td>These recipes were added by me. All Recipes are shown here including unpublished ones.</td>
                  <td>Author</td>
               </tr>
               <tr>
                  <td>My Favorites</td>
                  <td>These recipes were marked as my favorite Recipes on the site.</td>
                  <td>User</td>
               </tr>
               <tr>
                  <td>Unpublished</td>
                  <td>These recipes have not been published yet and as such cannot be seen by users.</td>
                  <td>Editor</td>
               </tr>
               <tr>
                  <td>Future</td>
                  <td>These recipes are set to be available at a future date.</td>
                  <td>Editor</td>
               </tr>
               <tr>
                  <td>Trashed</td>
                  <td>These recipes have been marked as deleted and cannot be viewed by frontend users.</td>
                  <td>Manager</td>
               </tr>
               <tr>
                  <td>Add Recipe</td>
                  <td>Add Recipe</td>
                  <td>Author</td>
               </tr>
               <tr>
                  <td>Import</td>
                  <td>Import Recipes</td>
                  <td>Manager</td>
               </tr>
               <tr>
                  <td>Download to XLS</td>
                  <td>Download to XLS</td>
                  <td>Manager</td>
               </tr>
               <tr>
                  <td>Download to XLSX</td>
                  <td>Download to XLSX</td>
                  <td>Manager</td>
               </tr>
               <tr>
                  <td>Download to CSV</td>
                  <td>Download to CSV</td>
                  <td>Manager</td>
               </tr>
               <tr>
                  <td>Preview All as PDF</td>
                  <td>Preview All as PDF</td>
                  <td>Manager</td>
               </tr>
               <tr>
                  <td>Download All as PDF</td>
                  <td>Download All as PDF</td>
                  <td>Manager</td>
               </tr>
            </tbody>
         </table>

      </div>
      <div class="panel-footer">
         See Manage Account setting page to request a higher access level.
      </div>
   </div>

@stop

