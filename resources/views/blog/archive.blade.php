{{-- Used to display blog list when user clicks on links in the blog archives block on the main page --}}

@extends ('layouts.app')

@section ('title', '| Blog')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('blog.index') }}">Blog</a></li>
	<li class="active"><span>Archives</span></li>
@stop

@section ('content')
	
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9">
			@include('blog.archive.main')
		</div>
		<div class="col-xs-12 col-sm-4 col-md-3">
			@include('blog.archive.controls')
			@include('blog.blocks.archives')
		</div>
	</div>
	
@stop

@section ('scripts')
@stop
