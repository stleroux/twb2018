@extends('backend.layouts.app')

@section ('title','Parsing Import Items')

@section ('stylesheets')
@stop

@section('sectionSidebar')
    @include('backend.items.sidebar')
@stop

@section('breadcrumb')
    <li><a href="\backend\dashboard">Dashboard</a></li>
    <li><a href="{{ route('backend.items.index') }}">Items</a></li>
    <li><a href="{{ route('backend.items.import') }}">Import Items</a></li>
    <li class="active"><span>Parse Import Items</span></li>
@stop

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('backend.items.import_process') }}">
        {{ csrf_field() }}
        <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />
    
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                    Import Items
                </h3>
            </div>

            <div class="panel-body">

                <table class="table">
                    @if (isset($csv_header_fields))
                        <tr>
                            @foreach ($csv_header_fields as $csv_header_field)
                                <th>{{ $csv_header_field }}</th>
                            @endforeach
                        </tr>
                    @endif
                    @foreach ($csv_data as $row)
                        <tr>
                            @foreach ($row as $key => $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr>
                        @foreach ($csv_data[0] as $key => $value)
                            <td>
                                <select name="fields[{{ $key }}]">
                                    @foreach (config('app.items_db_fields') as $db_field)
                                        <option value="{{ (\Request::has('header')) ? $db_field : $loop->index }}"
                                            @if ($key === $db_field) selected @endif>{{ $db_field }}</option>
                                    @endforeach
                                </select>
                            </td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>

@endsection

@section('blocks')
        @include('common.controlCenterHeader')

            <button type="submit" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Import Data
            </button>

        @include('common.controlCenterFooter')
    </form>
@endsection