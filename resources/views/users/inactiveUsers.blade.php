@extends('layouts.app')

@section('title','| Inactive Users')

@section('stylesheets')
@stop

@section('sectionSidebar')
    @include('users.sidebar')
@stop

@section('breadcrumb')
    <li><a href="/">Home</a></li>
    <li><a href="{{ route('users.index') }}">Users</a></li>
    <li class="active"><span>Inactive Users</span></li>
@stop

@section('content')
<form style="display:inline;">
{{-- <form method="POST" action="{{ route('recipes.trashAll') }}"> --}}
    {!! csrf_field() !!}
    
   @if($users->count() > 0)
      <div class="panel panel-primary">
         <div class="panel-heading" style="position:relative;">
            <h3 class="panel-title">
               <a href="#" id="popover" data-toggle="popover" data-trigger="hover"
                  data-title="Inactive Users"
                  data-content="These users have never logged in to the system.">
                  Inactive Users
                  <i class="fa fa-question-circle" aria-hidden="true"></i>
               </a>

               {{-- <button
                  class="btn btn-xs btn-danger pull-right"
                  type="submit"
                  formaction="{{ route('recipes.trashAll') }}"
                  formmethod="POST"
                  id="bulk-delete"
                  style="display:none; margin-left:2px"
                  onclick="return confirm('Are you sure you want to trash these recipes?')">
                  Trash Selected
               </button> --}}
                      
               {{-- <button
                  class = "btn btn-xs btn-default pull-right"
                  type="submit"
                  formaction="{{ route('recipes.unpublishAll') }}"
                  formmethod="POST"
                  id="bulk-unpublish"
                  style="display:none; margin-left:2px"
                  onclick="return confirm('Are you sure you want to unpublish these recipes?')">
                  Unpublish Selected
               </button> --}}

            </h3>
         </div>
</form>

         <div class="well well-sm text text-center">
            <a href="{{ route('users.inactiveUsers') }}" class="{{ Request::is('users/inactiveUsers') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
            @foreach($letters as $value)
               <a href="{{ route('users.inactiveUsers', $value) }}" class="{{ Request::is('users/inactiveUsers/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
            @endforeach
         </div>


         <div class="panel-body">
         <table id="datatable" class="table table-hover table-condensed table-responsive">
            <thead>
               <tr>
                  <th><input type="checkbox" id="selectall" class="checked" /></th>
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Logins</th>
                  {{-- @if(checkACL('author'))
                     <th data-orderable="false"></th>
                  @endif --}}
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
                  <tr>
                     <td>
                        <input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{$user->id}}" class="check-all">
                     </td>
                     <td>{{ $user->username }}</td>
                     <td>{{ $user->profile->first_name }}</td>
                     <td>{{ $user->profile->last_name }}</td>
                     <td>{{ ucfirst($user->role->name) }}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->login_count }}</td>
                     {{-- <td><a href="{{ route('users.show', $user->id) }}">{{ ucfirst($user->username) }}</a></td> --}}
                     {{-- @if(checkACL('author'))
                        <td class="text-right">
                           @include('layouts.partials.actionsDD', [
                              'model'=>$user,
                              'name'=>'users',
                              'params'=>['changePwd','edit', 'delete']
                              
                           ])
                        </td>
                     @endif --}}
                  </tr>
               @endforeach
            </tbody>
            </table>
         </div>
         </div>
          
   @else
      <div class="panel panel-primary">
         <div class="panel-heading">
            <h3 class="panel-title">Users</h3>
         </div>
         <div class="panel-body">
            <div class="text text-danger">NO RECORDS FOUND</div>
         </div>
      </div>
   @endif
@stop

@section('blocks')
@endsection

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