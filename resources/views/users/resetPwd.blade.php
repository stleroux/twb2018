@extends('layouts.app')

@section('title','Change user Password')

@section('stylesheets')
@stop

@section('sectionSidebar')
    @include('users.sidebar')
@stop

@section('breadcrumb')
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="{{ route('users.index') }}">Users</a></li>
    <li class="active"><span>Change User Password</span></li>
@stop

@section('content')
   {{-- <form style="display:inline;"> --}}
    {!! Form::model($user, ['route'=>['users.changePassword', $user->id], 'method' => 'POST']) !!}

      {!! csrf_field() !!}
      <input type="text" name="id" value="{{ $user->id }}">

      <div class="panel panel-primary">
         @include('users.resetPwd.panelHeader')
         @include('users.resetPwd.help')
         <div class="panel-body">
            @include('users.resetPwd.datagrid')
         </div>
      </div>
@endsection

@section('blocks')
      @include('users.resetPwd.controls')
   </form>
@endsection

@section('scripts')
@endsection
