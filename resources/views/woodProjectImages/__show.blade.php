{{-- PHOTO SHOW --}}

@extends ('frontend.layouts.app')

{{-- @section ('title', '| ') --}}

@section ('stylesheets')
@stop

@section('sectionSidebar')
   {{-- @include('frontend.woodProjects.sidebar') --}}
@stop

@section('breadcrumb')
   <li><a href="/">Home</a></li>
   <li><a href="{{ route('woodProjects') }}">Wood Projects</a></li>
   <li><a href="{{ route('woodProjects.show', $image->wood_project_id) }}">{{ $image->woodProject->name }}</a></li>
   <li class="active"><span>View Project Image</span></li>
@stop


@section('content')

   <div class="panel text-right">
{{--       {!! Form::open(['action' => ['Frontend\WoodProjectImagesController@destroy', $image->id], 'method'=>'POST', 'style'=>'display:inline;']) !!}
         <input type="hidden" method="DELETE" />
         {{ Form::hidden('_method', 'DELETE') }}
         {!! Form::submit('Delete Image', ['class'=>'btn btn-danger']) !!}
      {!! Form::close() !!} --}}
      <a href="/woodProjects/{{ $image->wood_project_id }}" class="btn btn-default">Back to Project</a>
    </div>

   <div class="panel panel-primary">
      <div class="panel-heading">
         <div class="panel-title">
            {{ $image->ori_name }}
            <span class="badge pull-right">Size : {{ $image->size }}</span>
         </div>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12 col-sm-12">
               <img src="/_woodProjects/images/{{ $image->wood_project_id }}/{{ $image->new_name }}" alt="{{ $image->name}}" height="100%" width="100%">
            </div>
         </div>
      </div>
      <div class="panel-footer">
         <strong>Description :</strong>
         <br />
         {{ $image->description}}
      </div>
   </div>

@endsection