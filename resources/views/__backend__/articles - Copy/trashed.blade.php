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
	<li class="active"><span>Trashed Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}

		@if($articles->count() > 0)
			<div class="panel panel-danger">
				<div class="panel-heading" style="position:relative;">
					<h3 class="panel-title">
						<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
							data-title="Trashed Articles"
							data-content="These articles have been marked as deleted and cannot be viewed by frontend users.">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							Trashed Articles
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						</a>

						@include('backend.articles.pages.bulkActions', [
							'buttons'=>['publishAll','deleteAll','restoreAll']
						])

					</h3>
				</div>
	</form>
			
				<div class="panel-body">
					@include('backend.articles.pages.datagrid', [
						'cols'=>['created_at', 'published_at', 'deleted_at'],
						'params'=>['publish', 'edit', 'delete', 'restore']
					])
				</div>

				<div class="panel-footer">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td colspan="2"><strong>Note:</strong></td>
						</tr>
						<tr>
							<td>Publish</td>
							<td>&nbsp;: Will set the deleted_at field to Null and the published_at field to the current date and time for the selected records.</td>
						</tr>
						<tr>
							<td>Restore\Undelete</td>
							<td>&nbsp;: Will restore the individual record. (Removes the deleted_at info but does not change anything else.)</td>
						</tr>
						<tr>
							<td>Delete</td>
							<td>&nbsp;: Will <span class="text-danger"><strong>permanently delete</strong></span> the individual record from the database.</td>
						</tr>
						<tr>
							<td>Publish Selected</td>
							<td>&nbsp;: Will set the deleted_at field to Null and the published_at field to the current date and time for all selected records.</td>
						</tr>
						<tr>
							<td>Restore Selected&nbsp;</td>
							<td>&nbsp;: Will set the deleted_at field to Null for all selected records. (Will not change anything else.)</td>
						</tr>
						<tr>
							<td>Delete Selected</td>
							<td>&nbsp;: Will <span class="text-danger"><strong>permanently delete</strong></span> all selected records from the database.</td>
						</tr>
					</table>
				</div>
			</div>
		@else
			@include('common.noRecordsFound', ['name'=>'Trashed Articles', 'icon'=>'trash-o', 'color'=>'danger'])
		@endif
@stop


@section('scripts')
	@include('backend.articles.pages.btnScript')
@stop