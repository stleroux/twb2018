@extends('backend.layouts.app')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.woodProjects.admin.sidebar')
@stop

@section('breadcrumb')
  <li><a href="dashboard">Dashboard</a></li>
  <li><a href="{{ route('backend.woodProjects.index') }}">Woodshop Projects</a></li>
  <li class="active"><span>Administration</span></li>
@stop

@section('content')
   <div class="row">
      <div class="col-xs-12">
         <div class="panel panel-primary">
            <div class="panel-heading">
               <div class="panel-title">Woodshop Projects Administration Section</div>
            </div>
            <div class="panel-body">
               <p>In order to manage the different dropdown list needed by the Projects pages, go to the Categories section to add entries.</p>
               <p>These would include : </p>
               <ul>
                 <li>Wood Species</li>
                 <li>Wood Types</li>
                 <li>Stain Types</li>
                 <li>Stain Colors</li>
                 <li>Stain Sheens</li>
                 <li>Finish Types</li>
                 <li>Finish Sheens</li>
               </ul>
            </div>
            {{-- <div class="panel-footer">
               Footer
            </div> --}}
         </div>
      </div>
   </div>
@endsection