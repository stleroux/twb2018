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
	<li class="active"><span>Unpublished Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}

		@if($articles->count() > 0)
			<div class="panel panel-primary">
				<div class="panel-heading" style="position:relative;">
					<h3 class="panel-title">
						<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
							data-title="Unpublished Articles"
							data-content="These articles have not been published yet and as such cannot be seen by users.">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							Unpublished Articles
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						</a>
	
						@include('backend.articles.pages.bulkActions', ['buttons'=>['publishAll','trashAll']])
					</h3>
				</div>
	</form>

				<div class="well well-sm text text-center">
					<a href="{{ route('backend.articles.unpublished') }}" class="{{ Request::is('backend/articles/unpublished') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
					@foreach($letters as $value)
						<a href="{{ route('backend.articles.unpublished', $value) }}" class="{{ Request::is('backend/articles/unpublished/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
					@endforeach
				</div>

				<div class="panel-body">
					@include('backend.articles.pages.datagrid', [
						'cols'=>['created_at'],
						'params'=>['duplicate', 'resetViewsCount', 'publish', 'edit', 'trash']
					])
				</div>
			</div>
		 @else
			@include('common.noRecordsFound', ['name'=>'Unpublished Articles', 'icon'=>'file-text-o', 'color'=>'primary'])
		@endif

@stop

@section('scripts')
	@include('backend.articles.pages.btnScript')
@stop