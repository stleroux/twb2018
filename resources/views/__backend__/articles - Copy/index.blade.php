@extends('backend.layouts.app')

@section('title','Articles')

@section('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li class="active"><span>Articles</span></li>
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
				Articles
			</h3>
		</div>
		<div class="panel-body">
			<p>Select the option in the menu on the left that represents the type of articles you wish to display or the action you wish to take.</p>

			<table class="table table-hover">
				<thead>
					<tr>
						<th>Page</th>
						<th>Description</th>
						<th>Required Role</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Articles</td>
						<td>This page.</td>
						<td>Authenticated User</td>
					</tr>
					<tr>
						<td>New Articles</td>
						<td>These articles were added since the last time you logged in.</td>
						<td>User</td>
					</tr>
					<tr>
						<td>Published</td>
						<td>These articles are available for viewing by logged in users.</td>
						<td>User</td>
					</tr>
					<tr>
						<td>Created By Me</td>
						<td>These articles were added by me. All articles are shown here including unpublished ones.</td>
						<td>Author</td>
					</tr>
					<tr>
						<td>My Favorites</td>
						<td>These articles were marked as my favorite articles on the site.</td>
						<td>User</td>
					</tr>
					<tr>
						<td>Unpublished</td>
						<td>These articles have not been published yet and as such cannot be seen by users.</td>
						<td>Publisher</td>
					</tr>
					<tr>
						<td>Future</td>
						<td>These articles are set to be available at a future date.</td>
						<td>Publisher</td>
					</tr>
					<tr>
						<td>Trashed</td>
						<td>These articles have been marked as deleted and cannot be viewed by frontend users.</td>
						<td>Manager</td>
					</tr>
					<tr>
						<td>Add Article</td>
						<td>Add Article</td>
						<td>Author</td>
					</tr>
					<tr>
						<td>Import</td>
						<td>Import Articles</td>
						<td>Manager</td>
					</tr>
					<tr>
						<td>Download to XLS</td>
						<td>Download to XLS</td>
						<td>Manager</td>
					</tr>
					<tr>
						<td>Download to XLSX</td>
						<td>Download to XLSX</td>
						<td>Manager</td>
					</tr>
					<tr>
						<td>Download to CSV</td>
						<td>Download to CSV</td>
						<td>Manager</td>
					</tr>
					<tr>
						<td>Preview All as PDF</td>
						<td>Preview All as PDF</td>
						<td>Manager</td>
					</tr>
					<tr>
						<td>Download All as PDF</td>
						<td>Download All as PDF</td>
						<td>Manager</td>
					</tr>
				</tbody>
			</table>

		</div>
{{-- 		<div class="panel-footer">
			&nbsp;
		</div> --}}
	</div>

@stop