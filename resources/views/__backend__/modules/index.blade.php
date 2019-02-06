@extends('backend.layouts.app')

@section('title','| ')

@section('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.modules.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li><span class="active">Modules</span></li>
@stop

@section('content')

  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-cubes" aria-hidden="true"></i> Modules</div>
        <div class="panel-body">
          <table id="datatable" class="table table-hover table-condensed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th data-orderable="false"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($modules as $module)
                <tr>
                  <td>{{ $module->id }}</td>
                  <td>{{ $module->name }}</td>
                  <td class="text-right">
                    <a href="{{ route('backend.modules.edit', $module->id) }}" class="btn btn-sm btn-primary" title="Remove from Favorites">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <form method="POST" action="{{ route('backend.modules.destroy', $module->id) }}" accept-charset="UTF-8" style="display:inline">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button
                        class="btn btn-sm btn-danger"
                        {{ Auth::user()->actionButtons == 2 ? 'title=Delete' : '' }}
                        type="button"
                        data-toggle="modal"
                        data-id="{{ $module->id }}"
                        data-target="#confirmDelete"
                        data-title="Delete Module"
                        data-message="Are you sure you want to delete this module?">
                          @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="glyphicon glyphicon-trash"></i> Delete
                          @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="glyphicon glyphicon-trash"></i>
                          @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}Delete
                          @endif
                          <i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      {{-- @ability('admin','modules_create') --}}
        {!! Form::open(['route' => 'backend.modules.store']) !!}
          <div class="panel panel-primary">
            <div class="panel-heading">New Module</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {{ Form::label('name', 'Name', ['class'=>'required']) }}
                    {{ Form::text('name', null, ['class' => 'form-control input-sm', 'autofocus']) }}
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  {{ Form::button('<div class="text text-left"><i class="fa fa-save" aria-hidden="true"></i> Save</div>', array('type' => 'submit', 'class' => 'btn btn-success btn-block')) }}
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <div>Fields with <i class="fa fa-star" style="color:#ff0000" aria-hidden="true"></i> are required</div>
            </div>
        </div>
      {!! Form::close() !!}
    {{-- @endability --}}
  </div>

</div>

@stop