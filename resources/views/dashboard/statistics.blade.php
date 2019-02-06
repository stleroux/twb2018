<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-bar-chart" aria-hidden="true"></i>
					Statistics
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th></th>
						<th>Published</th>
						<th>Unpublished</th>
						<th>Future</th>
						<th>Trashed</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Articles</th>
						<td>{{ App\Article::published()->count() }}</td>
						<td>{{ App\Article::unpublished()->count() }}</td>
						<td>{{ App\Article::future()->count() }}</td>
						<td>{{ App\Article::trashedCount()->count() }}</td>
					</tr>
					<tr>
						<th>Projects</th>
						<td>{{ App\WoodProject::count() }}</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
					</tr>
					<tr>
						<th>Recipes</th>
						<td>{{ App\Recipe::published()->count() }}</td>
						<td>{{ App\Recipe::unpublished()->count() }}</td>
						<td>{{ App\Recipe::future()->count() }}</td>
						<td>{{ App\Recipe::trashedCount()->count() }}</td>
					</tr>
					<tr>
						<th>Products</th>
						<td>N/A</td>
						<td>N/A</td>
						<td>N/A</td>
						<td>N/A</td>
					</tr>
					<tr>
						<th>Wood Project</th>
						<td>{{ App\WoodProject::count() }}</td>
						<td>N/A</td>
						<td>N/A</td>
						<td>N/A</td>
					</tr>
					<tr>
						<th>Photo Albums</th>
						<td>{{ App\Album::count() }}</td>
						<td>N/A</td>
						<td>N/A</td>
						<td>N/A</td>
					</tr>
					<tr>
						<th>Invoices</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					{{-- <tr>
						<th></th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr> --}}
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
