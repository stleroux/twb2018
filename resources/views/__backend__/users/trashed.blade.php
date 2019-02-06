@extends('backend.layouts.app')

@section('title','Inactive Users')

@section('stylesheets')
@stop

@section('sectionSidebar')
    @include('backend.users.sidebar')
@stop

@section('breadcrumb')
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="{{ route('backend.users.index') }}">Users</a></li>
    <li class="active"><span>Inactive Users</span></li>
@stop

@section('content')
<form style="display:inline;">
{{-- <form method="POST" action="{{ route('backend.recipes.trashAll') }}"> --}}
    {!! csrf_field() !!}
    
   @if($users->count() > 0)
      <div class="panel panel-danger">
         <div class="panel-heading" style="position:relative;">
            <h3 class="panel-title">
               <a href="#" id="popover" data-toggle="popover" data-trigger="hover"
                  data-title="Inactive Users"
                  data-content=".">
                  <i class="fa fa-question-circle" aria-hidden="true"></i> Inactive Users
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

{{--          <div class="well well-sm text text-center">
            <a href="{{ route('backend.users.index') }}" class="{{ Request::is('backend/users') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
            @foreach($letters as $value)
               <a href="{{ route('backend.users.index', $value) }}" class="{{ Request::is('backend/users/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
            @endforeach
         </div> --}}


         <div class="panel-body">
         <table id="datatable" class="table table-hover table-condensed table-responsive">
            <thead>
               <tr>
                  <th><input type="checkbox" id="selectall" class="checked" /></th>
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  @if(checkACL('author'))
                     <th data-orderable="false"></th>
                  @endif
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
                  <tr>
                     <td>
                        <input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{$user->id}}" class="check-all">
                     </td>
                     <td>{{ $user->username }}</td>
                     <td>{{-- {{ $user->profile->first_name }} --}}</td>
                     <td>{{-- {{ $user->profile->last_name }} --}}</td>
                     <td>{{ $user->email }}</td>
                     {{-- <td><a href="{{ route('backend.users.show', $user->id) }}">{{ ucfirst($user->username) }}</a></td> --}}
                     @if(checkACL('author'))
                        <td class="text-right">
                           @include('backend.layouts.partials.actionsDD', [
                              'model'=>$user,
                              'name'=>'users',
                              'params'=>['permDelete', 'restore']
                              
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
      <div class="panel panel-danger">
         <div class="panel-heading">
            <h3 class="panel-title">
              <a href="#" id="popover" data-toggle="popover" data-trigger="hover"
                  data-title="Inactive Users"
                  data-content=".">
                  <i class="fa fa-question-circle" aria-hidden="true"></i> Inactive Users
               </a>
            </h3>
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