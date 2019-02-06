@extends('backend.layouts.app')

@section('title','Posts')

@section('stylesheets')
@stop

@section('sectionSidebar')
    @include('backend.posts.sidebar')
@stop

@section('breadcrumb')
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="{{ route('backend.posts.index') }}">Posts</a></li>
    <li class="active"><span>Active Posts</span></li>
@stop

@section('content')
<form style="display:inline;">
    {!! csrf_field() !!}
    
   @if($posts->count() > 0)
      <div class="panel panel-primary">
         <div class="panel-heading" style="position:relative;">
            <h3 class="panel-title">
               <a href="#" id="popover" data-toggle="popover" data-trigger="hover"
                  data-title="Active Posts"
                  data-content=".">
                  <i class="fa fa-question-circle" aria-hidden="true"></i> Active Posts
               </a>

               {{-- <button
                  class="btn btn-xs btn-danger pull-right"
                  type="submit"
                  formaction="{{ route('backend.posts.trashAll') }}"
                  formmethod="POST"
                  id="bulk-delete"
                  style="display:none; margin-left:2px"
                  onclick="return confirm('Are you sure you want to trash these posts?')">
                  Trash Selected
               </button> --}}
                      
               {{-- <button
                  class = "btn btn-xs btn-default pull-right"
                  type="submit"
                  formaction="{{ route('backend.posts.unpublishAll') }}"
                  formmethod="POST"
                  id="bulk-unpublish"
                  style="display:none; margin-left:2px"
                  onclick="return confirm('Are you sure you want to unpublish these posts?')">
                  Unpublish Selected
               </button> --}}

            </h3>
         </div>
</form>

         <div class="well well-sm text text-center">
            <a href="{{ route('backend.posts.index') }}" class="{{ Request::is('backend/posts') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
            @foreach($letters as $value)
               <a href="{{ route('backend.posts.index', $value) }}" class="{{ Request::is('backend/posts/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
            @endforeach
         </div>


         <div class="panel-body">
         <table id="datatable" class="table table-hover table-condensed table-responsive">
            <thead>
               <tr>
                  <th><input type="checkbox" id="selectall" class="checked" /></th>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Category</th>
                  <th>Views</th>
                  @if(checkACL('author'))
                     <th data-orderable="false"></th>
                  @endif
               </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
                  <tr>
                     <td>
                        <input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{ $post->id }}" class="check-all">
                     </td>
                     <td>{{ $post->id }}</td>
                     <td>{{ $post->title }}</td>
                     <td>{{ $post->slug }}</td>
                     <td>{{ $post->category->name }}</td>
                     <td>{{ $post->views }}</td>
                     @if(checkACL('author'))
                        <td class="text-right">
                           @include('backend.layouts.partials.actionsDD', [
                              'model'=>$post,
                              'name'=>'posts',
                              'params'=>['edit', 'delete']
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
            <h3 class="panel-title">Posts</h3>
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