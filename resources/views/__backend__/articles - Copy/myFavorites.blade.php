@extends('backend.layouts.app')

@section('title','Articles')

@section('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.articles.index') }}">Articles</a></li>
	<li class="active"><span>My Favorite Articles</span></li>
@stop

@section('content')

	@if($articles)
		<div class="panel panel-primary">
			<div class="panel-heading" style="position:relative;">
				<h3 class="panel-title">
					<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
						data-title="My Favorite Articles"
						data-content="These articles were marked as my favorite articles on the site.">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						My Favorite Articles
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					</a>
				</h3>
			</div>

			@include('backend.articles.pages.bulkActions', [
				'buttons'=>[]
			])

			<div class="panel-body">
				@include('backend.articles.pages.datagrid', [
					'cols'=>['created_at', 'published_at'],
					'params'=>['favorites', 'duplicate', 'resetViewsCount', 'publish', 'edit', 'trash']
				])
			</div>
		</div>
	@else
		@include('common.noRecordsFound', ['name'=>'My Favorite Articles', 'icon'=>'file-text-o', 'color'=>'primary'])
	@endif
@stop


@section('scripts')
	@include('backend.articles.pages.btnScript')
@stop