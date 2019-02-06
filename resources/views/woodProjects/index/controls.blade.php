@include('common.controlCenterHeader')
	
{{-- 	<a href="{{ route('woodProjects.index') }}" class="btn btn-default btn-block">
		<i class="fa fa-pagelines" aria-hidden="true"></i>
		Wood Projects
	</a> --}}

	<a href="{{ route('woodProjects.create') }}" class="btn btn-default btn-block">
		<i class="fa fa-plus-square" aria-hidden="true"></i>
		Add Project
	</a>

	<a href="{{ route('woodProjects.admin') }}" class="btn btn-default btn-block">
		<i class="fa fa-cog" aria-hidden="true"></i>
		Administer
	</a>

@include('common.controlCenterFooter')