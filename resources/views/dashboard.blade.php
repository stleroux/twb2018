@extends('layouts.app')

@section ('stylesheets')
@stop

{{-- @section('sectionSidebar')
	@include('sidebar')
@stop --}}

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li>Dashboard</li>
@stop

@section('content')

	@php
		$totalnewItems = $newAlbums->count() + $newArticles->count() + $newCategories->count() + $newComments->count() + $newModules->count() + $newPosts->count() + $newRecipes->count() + $newRoles->count() + $newUsers->count() + $newWoodProjects->count();
	@endphp

	@include('dashboard.welcome')

	@include('dashboard.statistics')

	@include('dashboard.newItems')

@endsection
