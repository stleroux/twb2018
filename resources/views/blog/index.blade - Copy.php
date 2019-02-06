@extends ('frontend.layouts.app')

@section ('title', '| Blog')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Blog</span></li>
@stop

@section ('content')
	<div class="row">
		<div class="col-xs-12 col-md-9">
			@include('frontend.blog.index.main')
		</div>

		<div class="col-md-3">
			@include('frontend.blog.index.search')
		</div>
	</div>
@stop

@section ('scripts')
@stop
