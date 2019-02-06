@extends('backend.layouts.app')

@section ('title','Edit User')

@section ('stylesheets')
@stop

@section('sectionSidebar')
   @include('backend.users.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li><a href="{{ route('backend.users.index') }}">Users</a></li>
   <li class="active"><span>Edit User</span></li>
@stop

@section('content')
   {!! Form::model($user, ['route'=>['backend.users.update', $user->id], 'method' => 'PUT']) !!}
      {{-- <input type="hidden" value="{{ $ref }}" name="ref" size="50"/> --}}

      <div class="panel text-right">
         <a href="{{ route('backend.users.index') }}" class="btn btn-default">Cancel</a>
         {{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
      </div>

      <div class="panel panel-primary">
         <div class="panel-heading">
            <h3 class="panel-title"><strong>User Details</strong></h3>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                     {!! Form::label("username", "Username", ['class'=>'required']) !!}
                     {!! Form::text("username", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
                     <span class="text-danger">{{ $errors->first('username') }}</span>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                     {!! Form::label("email", "Email Address", ['class'=>'required']) !!}
                     {!! Form::text("email", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
                     <span class="text-danger">{{ $errors->first('email') }}</span>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-4">
                  <div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
                     {{ Form::label('role_id', 'Role', ['class'=>'required']) }}
                     {{ Form::select('role_id', $roles, null, ['class'=>'form-control']) }}
                     <span class="text-danger">{{ $errors->first('role_id') }}</span>
                  </div>
               </div>
            </div>
         </div>
      </div>

   {!! Form::close() !!}
@stop

@section ('scripts')
{{--   <script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script>
   <script>
      $("#datetime").datetimepicker({
         step: 30,
         showOn: 'button',
         buttonImage: '',
         buttonImageOnly: true,
         format:'Y-m-d H:i',
         lang:'ru'
      });
   </script> --}}
@stop

   
