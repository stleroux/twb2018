@extends('backend.layouts.app')

@section ('title','| ')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.modules.sidebar')
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li><a href="{{ route('backend.modules.index') }}">Modules</a></li>
  <li><span class="active">Edit Module</span></li>
@stop

@section('content')
  {!! Form::model($module, ['route'=>['backend.modules.update', $module->id], 'method' => 'PUT']) !!}
    {{-- <input type="hidden" value="{{ $ref }}" name="ref" size="50"/> --}}

    <div class="panel text-right">
      {{-- <a href="{{ route($ref) }}" class="btn btn-default">Cancel</a> --}}
      <a class="btn btn-default" href="{{ route('backend.modules.index') }}">Cancel</a>
      {{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading"><i class="fa fa-cubes" aria-hidden="true"></i> Modules</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  {{ Form::label ('name', 'Name', ['class'=>'required']) }}
                  {{ Form::text ('name', null, ['class' => 'form-control', 'autofocus', "onfocus"=>"this.focus();this.select()"]) }}
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  {{ Form::Close() }}
@stop

@section ('scripts')
@stop