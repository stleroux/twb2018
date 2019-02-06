@extends('backend.layouts.app')

@section('title','New Comments')

@section('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.comments.sidebar')
@stop

@section('breadcrumb')
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="{{ route('backend.comments.index') }}">Comments</a></li>
    <li class="active"><span>New Comments</span></li>
@stop

@section('content')
<form style="display:inline;">
{{-- <form method="POST" action="{{ route('backend.recipes.trashAll') }}"> --}}
    {!! csrf_field() !!}
    
   @if($comments->count() > 0)
      <div class="panel panel-primary">
         <div class="panel-heading" style="position:relative;">
            <h3 class="panel-title">
               <a href="#" id="popover" data-toggle="popover" data-trigger="hover"
                  data-title="Active Comments"
                  data-content=".">
                  <i class="fa fa-question-circle" aria-hidden="true"></i> New Comments
               </a>

               {{-- <button
                  class="btn btn-xs btn-danger pull-right"
                  type="submit"
                  formaction="{{ route('backend.recipes.trashAll') }}"
                  formmethod="POST"
                  id="bulk-delete"
                  style="display:none; margin-left:2px"
                  onclick="return confirm('Are you sure you want to trash these recipes?')">
                  Trash Selected
               </button> --}}
                      
               {{-- <button
                  class = "btn btn-xs btn-default pull-right"
                  type="submit"
                  formaction="{{ route('backend.recipes.unpublishAll') }}"
                  formmethod="POST"
                  id="bulk-unpublish"
                  style="display:none; margin-left:2px"
                  onclick="return confirm('Are you sure you want to unpublish these recipes?')">
                  Unpublish Selected
               </button> --}}

            </h3>
         </div>
</form>

         {{-- <div class="well well-sm text text-center">
            <a href="{{ route('backend.comments.index') }}" class="{{ Request::is('backend/comments') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
            @foreach($letters as $value)
               <a href="{{ route('backend.comments.index', $value) }}" class="{{ Request::is('backend/comments/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
            @endforeach
         </div> --}}


         <div class="panel-body">
         <table id="datatable" class="table table-hover table-condensed table-responsive">
            <thead>
               <tr>
                  <th><input type="checkbox" id="selectall" class="checked" /></th>
                  {{-- <th>ID</th> --}}
                  <th>Username</th>
                  <th>Email</th>
                  <th>Comment</th>
                  <th>Item Type</th>
                  <th>Item ID</th>
                  @if(checkACL('author'))
                     <th data-orderable="false"></th>
                  @endif
               </tr>
            </thead>
            <tbody>
               @foreach ($comments as $comment)
                  <tr>
                     <td>
                        <input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{ $comment->id }}" class="check-all">
                     </td>
                     {{-- <td>{{ $comment->id }}</td> --}}
                     <td>{{ $comment->user->username }}</td>
                     <td>{{ $comment->user->email }}</td>
                     <td>{{ $comment->comment }}</td>
                     <td>{{ $comment->commentable_type }}</td>
                     <td>{{ $comment->commentable_id }}</td>
                     @if(checkACL('author'))
                        <td class="text-right">
                           @include('backend.layouts.partials.actionsDD', [
                              'model'=>$comment,
                              'name'=>'comments',
                              'params'=>['edit', 'trash']
                           ])
                        </td>
                     @endif
                  </tr>
               @endforeach
            </tbody>
            </table>
         </div>
         </div>
          
   @else
      <div class="panel panel-primary">
         <div class="panel-heading">
            <h3 class="panel-title">Comments</h3>
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
                      $("#bulk-unpublish").show();
                      $(".selectmenu").hide();

                  } else {
                      $("input[type=checkbox]").each(function () {
                           $(this).attr("checked", false);
                      });
                      $("#bulk-delete").hide();
                      $("#bulk-unpublish").hide();
                      $(".selectmenu").show();
                  }
             });
         });

         function checkbox_is_checked() {

             if ($(".check-all:checked").length > 0)
             {
                  $("#bulk-delete").show();
                  $("#bulk-unpublish").show();
                  $(".selectmenu").hide();
             }
             else
             {
                  $("#bulk-delete").hide();
                  $("#bulk-unpublish").hide();
                  $(".selectmenu").show();
             }
         };

    </script>

@stop