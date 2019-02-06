@extends ('layouts.app')

@section ('title','View Image')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('woodProjects.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('woodProjects.index') }}">Wood Projects</a></li>
	<li><a href="{{ route('woodProjects.show', $image->wood_project_id) }}">{{ $image->woodProject->name }}</a></li>
	<li class="active"><span>View Image</span></li>
@stop

@section('content')
   {!! Form::open(['action' => ['WoodProjectImagesController@destroy', $image->id], 'method'=>'POST', 'style'=>'display:inline;']) !!}
	  {{ Form::hidden('_method', 'DELETE') }}
	  @include('woodProjectImages.show.main')
@endsection

@section('blocks')
   	@include('woodProjectImages.show.controls')
   {!! Form::close() !!}
@endsection