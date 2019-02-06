@extends('layouts.app')

@section ('title','View Role')

@section ('stylesheets')
@stop

{{-- Pass along the ROUTE value of the previous page --}}
{{-- @php
   $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
   // get the last part of the route, after the last dot
   //$end = substr(strrchr($ref, '.'), 1);
   if(substr(strrchr($ref, '.'), 1) == 'index') {
      $end = 'Articles';
   } else {
      $end = substr(strrchr($ref, '.'), 1);
   }
@endphp --}}

@section('sectionSidebar')
   @include('roles.sidebar')
@stop

@section('breadcrumb')
      <li><a href="dashboard">Dashboard</a></li>
      <li><a href="{{ route('roles.index') }}">Roles</a></li>
      <li class="active"><span>View Role</span></li>
@stop

@section('content')

   <div class="panel text-right">
      <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
   </div>

   <div class="row">
      <div class="col-xs-12">
         <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">Role Details</h3>
            </div>
            <div class="panel-body">
               <div class="row">
                  <div class="col-xs-12 col-sm-2">
                     <div class="form-group">
                        {!! Form::label('id', 'ID') !!}
                        {!! Form::text('id', $role->id, ['class'=>'form-control', 'readonly']) !!}
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-5">
                     <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $role->name, ['class'=>'form-control', 'readonly']) !!}
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-5">
                     <div class="form-group">
                        {{ Form::label('display_name', 'Display Name') }}
                        {{ Form::text('display_name', $role->display_name, ['class'=>'form-control', 'readonly']) }}
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     {!! Form::label('description', 'Description') !!}
                     <div class="well">{!! $role->description !!}</div>
                  </div>
               </div>  
            </div>
         </div>
      </div>
   </div>


   
@stop


@section ('scripts')
@stop