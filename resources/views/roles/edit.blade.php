@extends('layouts.app')

@section ('title','Edit Role')

@section ('stylesheets')
@stop

@section('sectionSidebar')
   @include('roles.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li><a href="{{ route('roles.index') }}">Roles</a></li>
   <li class="active"><span>Edit Role</span></li>
@stop

@section('content')
   {!! Form::model($role, ['route'=>['roles.update', $role->id], 'method' => 'PUT']) !!}

      <div class="panel text-right">
         <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
         {{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
      </div>

      <div class="panel panel-primary">
         <div class="panel-heading">
            <h3 class="panel-title"><strong>Role Details</strong></h3>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                     {!! Form::label("id", "ID", ['class'=>'required']) !!}
                     {!! Form::text("id", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
                     <span class="text-danger">{{ $errors->first('id') }}</span>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                     {!! Form::label("name", "Internal Name", ['class'=>'required']) !!}
                     {!! Form::text("name", null, ["class" => "form-control"]) !!}
                     <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
                     {!! Form::label("display_name", "Display Name", ['class'=>'required']) !!}
                     {!! Form::text("display_name", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
                     <span class="text-danger">{{ $errors->first('display_name') }}</span>
                  </div>
               </div>
               <div class="col-xs-12">
                  <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                     {!! Form::label("description", "Description", ['class'=>'required']) !!}
                     {!! Form::text("description", null, ["class" => "form-control"]) !!}
                     <span class="text-danger">{{ $errors->first('description') }}</span>
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

   
