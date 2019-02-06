@extends('backend.layouts.app')

@section ('title','Import Items')

@section ('stylesheets')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('sectionSidebar')
    @include('backend.items.sidebar')
@stop

@section('breadcrumb')
    <li><a href="\backend\dashboard">Dashboard</a></li>
    <li><a href="{{ route('items.index') }}">Items</a></li>
    <li class="active"><span>Import Items</span></li>
@stop

@section('content')

    <form class="form-horizontal" method="POST" action="{{ route('items.import_parse') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                    Import Items
                </h3>
            </div>

            <div class="panel-body">

                <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                    <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>
                    <div class="col-md-6">
                        <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                        @if ($errors->has('csv_file'))
                            <span class="help-block">
                            <strong>{{ $errors->first('csv_file') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="header" class="col-md-4 control-label">File contains header row?</label>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <input type="checkbox" name="header" checked
                                data-toggle="toggle"
                                data-on="Yes"
                                data-off="No"
                            >
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection

@section('blocks')

        @include('common.controlCenterHeader')

            <button type="submit" class="btn btn-sm btn-primary btn-block">
                Parse CSV
            </button>

        @include('common.controlCenterFooter')
    </form>
@endsection

@section('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection