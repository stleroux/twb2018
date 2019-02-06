@extends('backend.layouts.app')

@section ('title','Import Items')

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

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Import Items
            </h3>
        </div>

        <div class="panel-body">
            Data imported successfully.
        </div>
    </div>
    
@endsection

@section('blocks')

    @include('common.controlCenterHeader')

        <a href="{{ route('backend.items.index') }}" class="btn btn-sm btn-primary btn-block">
            <i class="fa fa-list" aria-hidden="true"></i>
            Items
        </a>

    @include('common.controlCenterFooter')

@endsection