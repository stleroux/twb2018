@include('backend.userGuide.header')
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				New Articles
			</h4>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12">
					<p>This section will display the articles that have been created in the system since the last time you logged in.</p>
					<br />
					<h4>The Alphabet Bar</h4>
					<p>The Alphabet Bar will display the first letter of the article titles. Use these buttons to filter the articles.</p>
					<br />
					<h4>Table Grid</h4>
					<table class="table table-hover">
						<tr>
							<th>Show entries dropdown</th>
							<td>Use this dropdown to change the number of rows displayed on the page.</td>
						</tr>
						<tr>
							<th>Search box</th>
							<td>
								Start typing to automatically refresh the list of articles.<br />
								Keep in mind this will search not only the title but also the content os the articles.<br />
								Click on the "X" to clear the content of the Search box
							</td>
						</tr>
						<tr>
							<th>Checkboxes</th>
							<td>
								Selecting the checkbox beside the Title column header will select all articles on the page.<br />
								Selecting the checkbox beside each row will select only the specific row(s).<br />
								By clicking the checkbox(es), different things will happen on the page.<br />
								Clicking any of the checkbox(es) will display the mass options buttons on the right in the header and will remove the actions dropdown for individual rows.<br />
							</td>
						</tr>
						<tr>
							<th>Column Headers</th>
							<td>Click on the column header to sort the field ascending or descending</td>
						</tr>
						<tr>
							<th>Author column</th>
							<td>Clicking this link will display a popup with information about the author of the article.</td>
						</tr>
						<tr>
							<th>Actions dropdown</th>
							<td>
								<table class="table table-bordered">
									<tr>
										<th>View</th>
										<td>Select this action to view the article.</td>
									</tr>
									<tr>
										<th>Duplicate</th>
										<td>Select this action to make an exact suplicate of the article. the only difference will be the created at date and the author (which will be you).</td>
									</tr>
									<tr>
										<th>Publish</th>
										<td>Select this action to change the article's status to published which will make the article visible in the frontend.</td>
									</tr>
									<tr>
										<th>Edit</th>
										<td>Select this action to edit the article.</td>
									</tr>
									<tr>
										<th>Trash</th>
										<td>Select this action to trash the article. This action will hide the article from the frontend users. If you trash an article by error, do not panic. It can be restored.</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<th>Navigation Bar</th>
							<td></td>
						</tr>
						<tr>
							<th>Mass buttons</th>
							<td>
								<table class="table table-bordered">
									<tr>
										<th>Unpublish Selected</th>
										<td>Will unpubish all selected articles.</td>
									</tr>
									<tr>
										<th>Trash Selected</th>
										<td>Will trash all selected articles.</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

@include('backend.userGuide.footer')