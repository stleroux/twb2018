@extends('layouts.app')

@section('title','Home')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

{{-- @section('sectionSidebar')
   @include('layouts.partials.sidebar')
@stop --}}

{{-- @section('breadcrumb')
@stop --}}

@section('warning')
	@include('homepage.warnings')
@stop

@section('intro')
	@include('homepage.intro')
@stop

@section('content')
	@include('homepage.interests')
	@include('homepage.main')
@stop

@section('blocks')
	@include('homepage.imageSlider')
   @include('homepage.popular')
   @include('articles.blocks.archives')
   @include('blog.blocks.archives')
   @include('recipes.blocks.archives')
@stop
