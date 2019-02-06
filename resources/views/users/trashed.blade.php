@extends('layouts.app')

@section('title','Inactive Users')

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
    {!! csrf_field() !!}
    
    <div class="panel panel-danger">
      @include('users.trashed.panelHeader')
      {{-- @include('users.trashed.alphabet') --}}
      @include('users.trashed.help')
      <div class="panel-body">
        @if($users->count())
          @include('users.trashed.datagrid')
        @else
          @include('common.noRecordsFound')
        @endif
      </div>
    </div>
@stop

@section('blocks')
    @auth
      @include('users.trashed.controls')
    @endauth
    {{-- @include('users.blocks.archives') --}}
  </form>
@endsection

@section('scripts')
  @include('users.common.btnScript')
@endsection