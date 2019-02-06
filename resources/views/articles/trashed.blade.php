@extends('layouts.app')

@section('title','Articles')

@section('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>Trashed Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}

		<div class="panel panel-danger">
			@include('articles.trashed.panelHeader')
			@include('articles.trashed.alphabet')
			@include('articles.trashed.help')
			<div class="panel-body">
				@if($articles->count())
					@include('articles.trashed.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
			<div class="panel-footer">
				<p><strong>Note:</strong></p>
				<p><strong>Publish Selected</strong> will set the deleted_at field to Null and the published_at field to the current date and time for all selected records.</p>
				<p><strong>Restore Selected</strong> will set the deleted_at field to Null for all selected records. (Will not change anything else.)</p>
				<p><strong>Delete Selected</strong> will <span class="text-danger">permanently delete</span> all selected records from the database.</p>
			</div>
		</div>
@stop

@section('blocks')
		@include('articles.trashed.controls')
	</form>
@endsection

@section('scripts')
	@include('articles.common.btnScript')
@stop