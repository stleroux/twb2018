@extends ('backend.layouts.app')

@section ('title','View Image')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.woodProjects.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.woodProjects.index') }}">Albums</a></li>
	<li><a href="{{ route('backend.woodProjects.show', $image->wood_project_id) }}">{{ $image->woodProject->name }}</a></li>
	<li class="active"><span>View Image</span></li>
@stop

@section('content')
   {!! Form::open(['action' => ['Backend\WoodProjectImagesController@destroy', $image->id], 'method'=>'POST', 'style'=>'display:inline;']) !!}
	  {{ Form::hidden('_method', 'DELETE') }}
	  @include('backend.woodProjectImage.show.main')
@endsection

@section('blocks')
   	@include('backend.woodProjectImage.show.controls')
   {!! Form::close() !!}
@endsection