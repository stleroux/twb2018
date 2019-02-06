@extends ('layouts.app')

@section ('title', '| Blog')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

{{-- @section('sectionSidebar')
@stop --}}

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Blog</span></li>
@stop

@section('warning')
   {{-- <div style="background-color:red">WARNING<br /></div> --}}
@stop

@section('intro')
   {{-- <div style="background-color:yellow">INTRO<br /></div> --}}
@stop

@section('content')
  @include('blog.index.main')
@stop

@section('blocks')
   @include('blog.index.controls')
	@include('blog.index.search')
   @include('blog.blocks.archives')
@stop

@section ('scripts')
@stop
