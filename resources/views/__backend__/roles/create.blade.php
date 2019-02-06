@extends('layouts.app')

@section('title','Create Role')

@section('stylesheets')
@stop

@section('sectionSidebar')
    @include('roles.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li><a href="{{ route('roles.index') }}">Role</a></li>
   <li class="active"><span>Create New Role</span></li>
@stop

@section('content')

   {!! Form::open(['route' => 'roles.store']) !!}

      <div class="panel text-right">
         <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
         {{ Form::submit('Create Role', ['class'=>'btn btn-success']) }}
      </div>

      <div class="panel panel-primary">
         <div class="panel-heading">
            <div class="panel-title">New Role</div>
         </div>

         <div class="panel-body">
            <div class="row">
               <div class="col-xs-12 col-sm-2 col-md-2">
                  <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                     {!! Form::label('id', 'ID', ['class'=>'required']) !!}
                     {!! Form::text('id', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
                     <span class="text-danger">{{ $errors->first('id') }}</span>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                     {!! Form::label('name', 'Internal Name', ['class'=>'required']) !!}
                     {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
                     <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
                     {!! Form::label('display_name', 'Display Name', ['class'=>'required']) !!}
                     {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                     <span class="text-danger">{{ $errors->first('display_name') }}</span>
                  </div>
               </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                   {!! Form::label('description', 'Description', ['class'=>'required']) !!}
                   {!! Form::text('description', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
                   <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
              </div>
           </div>
         </div>

         <div class="panel-footer">
            <div>Fields with <i class="fa fa-star" style="color:#ff0000" aria-hidden="true"></i> are required</div>
         </div>

      </div>
   {{ Form::close() }}
@stop
