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
	<li class="active"><span>Published Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}
		
		@if($articles->count() > 0)
			<div class="panel panel-primary">
				<div class="panel-heading" style="position:relative;">
					<h3 class="panel-title">
						<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
							data-title="Published Articles"
							data-content="These articles are available for viewing by logged in users.">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							Published Articles
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						</a>

						@include('backend.articles.pages.bulkActions', [
							'buttons'=>['trashAll','unpublishAll']
						])

					</h3>
				</div>
	</form>

				<div class="well well-sm text text-center">
					<a href="{{ route('backend.articles.published') }}" class="{{ Request::is('backend/articles/published') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
					@foreach($letters as $value)
						<a href="{{ route('backend.articles.published', $value) }}" class="{{ Request::is('backend/articles/published/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
					@endforeach
				</div>


{{-- <div class="well well-sm text text-center">
	Filters
</div> --}}


				<div class="panel-body">
					@include('backend.articles.pages.datagrid', [
						'cols'=>['created_at', 'published_at'],
						'params'=>['favorites', 'duplicate', 'resetViewsCount', 'publish', 'edit', 'trash']
					])
				</div>
			</div>
		@else
			@include('common.noRecordsFound', ['name'=>'Published Articles', 'icon'=>'file-text-o', 'color'=>'primary'])
		@endif

	@include('backend.userGuide.articles.published', ['name'=>'Articles'])
@stop

@section('user_guide')
@stop
	{{--
		Section is here only to display the User Guide link in the top right hand menu bar
		If not define, the link will not show up
	 --}}

@section('scripts')
	@include('backend.articles.pages.btnScript')
@stop