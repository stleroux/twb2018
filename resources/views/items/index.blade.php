@extends('layouts.app')

@section ('title', '| Items')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

{{-- @section('sectionSidebar')
  @include('frontend.profiles.sidebar')
@stop --}}

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Items</span></li>
@stop

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Items</h3>
	</div>
	<div class="panel-body">
		Items list goes here
	</div>
</div>

@endsection
