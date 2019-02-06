<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">

			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-bar-chart" aria-hidden="true"></i>
					New items since last login ({{ $totalnewItems }})
				</div>
			</div>

			<div class="panel-body">
					@include('dashboard.newItems.albums')
					@include('dashboard.newItems.articles')
					@include('dashboard.newItems.categories')
					@include('dashboard.newItems.comments')
					@include('dashboard.newItems.modules')
					@include('dashboard.newItems.posts')
					@include('dashboard.newItems.recipes')
					@include('dashboard.newItems.roles')
					@include('dashboard.newItems.users')
					@include('dashboard.newItems.woodProjects')
			</div>

		</div>
	</div>
</div>
