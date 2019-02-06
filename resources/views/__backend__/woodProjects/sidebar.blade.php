<div class="panel panel-primary">

	<div class="panel-heading">
		<h4 class="panel-title">
			<i class="fa fa-diamond" aria-hidden="true"></i>
			Woodshop Projects
		</h4>
	</div>

	<div class="list-group">

		<a href="{{ route('backend.woodProjects.newWoodProjects') }}" class="list-group-item {{ Nav::isRoute('backend.woodProjects.newWoodProjects') }}">
			<i class="fa fa-pagelines" aria-hidden="true"></i>
			New Projects
			<div class="badge pull-right">
				{{ App\WoodProject::newWoodProjects()->count() }}
			</div>
		</a>

		<a href="{{ route('backend.woodProjects.index') }}"
			class="list-group-item
					{{ Nav::isRoute('backend.woodProjects.index') }}
					{{ Nav::isRoute('backend.woodProjectImage.show') }}
					{{ Nav::isRoute('backend.woodProjects.show') }}
			">
			<i class="fa fa-pagelines" aria-hidden="true"></i>
			Woodshop Projects
		</a>
		
		<a href="{{ route('backend.woodProjects.create') }}" class="list-group-item {{ Nav::isRoute('backend.woodProjects.create') }}">
			<i class="fa fa-plus-square" aria-hidden="true"></i>
			Add Project
		</a>


		<a href="{{ route('backend.woodProjects.admin') }}" class="list-group-item {{ Nav::isRoute('backend.woodProjects.admin') }}">
			<i class="fa fa-cog" aria-hidden="true"></i>
			Administer
		</a>
		
	</div>

</div>
