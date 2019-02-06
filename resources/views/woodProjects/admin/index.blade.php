@extends('layouts.app')

@section('title', '| Wood Projects')

@section('stylesheets')
  {{ Html::style('css/styles.css') }}
@stop

@section('sectionSidebar')
  @include('woodProjects.sidebar')
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li><a href="{{ route('woodProjects.index') }}">Woodshop Projects</a></li>
  <li class="active"><span>Administration</span></li>
@stop

@section('content')
  <form style="display:inline;">
    {!! csrf_field() !!}
    
    <div class="panel panel-primary">
      @include('woodProjects.admin.panelHeader')
      @include('woodProjects.admin.help')
      <div class="panel-body">
        @include('woodProjects.admin.datagrid')
      </div>
    </div>
@stop

@section('blocks')
  @auth
    @include('woodProjects.admin.controls')
  @endauth
@stop

@section('scripts')
  {{-- @include('woodProjects.common.btnScript') --}}
@stop
