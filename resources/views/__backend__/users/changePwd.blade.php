@extends('backend.layouts.app')

@section('title','Change user Password')

@section('stylesheets')
@stop

@section('sectionSidebar')
    @include('backend.users.sidebar')
@stop

@section('breadcrumb')
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="{{ route('backend.users.index') }}">Users</a></li>
    <li class="active"><span>Change User Password</span></li>
@stop

@section('content')
   <form method="POST" action="{{ route('backend.users.changePassword', $user->id) }}">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $user->id }}">
      <div class="col-xs-12 col-sm-6">
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="panel-title">Reset {{ $user->username }}'s Password</div>
            </div>

            <div class="panel-body">
               {{-- <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                  <label for="current-password" class="required">Current Password</label>
                     <input id="current-password" type="password" class="form-control input-sm" name="current-password">
                     @if ($errors->has('current-password'))
                        <span class="help-block">
                           <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                     @endif
               </div> --}}

               <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                  <label for="new-password" class="required">New Password</label>
                     {{-- <input id="new-password" type="password" class="form-control input-sm" name="new-password"> --}}

                     {!! Form::text("new-password", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}

                     @if ($errors->has('new-password'))
                        <span class="help-block">
                           <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                     @endif
               </div>

               <div class="form-group">
                  <label for="new-password-confirm" class="required">Confirm New Password</label>
                     <input id="new-password-confirm" type="password" class="form-control input-sm" name="new-password_confirmation">
               </div>
            </div>

            <div class="panel-footer">
               <button type="submit" class="btn btn-xs btn-primary">
                  Change Password
               </button>
            </div>

         </div>
      </div>
   </form>
@stop

@section('scripts')
@endsection
