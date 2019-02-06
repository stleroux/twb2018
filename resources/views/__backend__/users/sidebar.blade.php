	<div class="panel panel-primary">

		<div class="panel-heading">
			<h4 class="panel-title">
				<i class="fa fa-users" aria-hidden="true"></i>
				Users
			</h4>
		</div>

		<div class="list-group">

			<a href="{{ route('backend.users.newUsers') }}" class="list-group-item {{ Nav::isRoute('backend.users.newUsers') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				New Users
				<div class="badge pull-right">
            	{{ App\User::newUsers()->count() }}
         	</div>
			</a>

			<a href="{{ route('backend.users.index') }}" class="list-group-item {{ Nav::isRoute('backend.users.index') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				Active Users
				<div class="badge pull-right">
            	{{ App\User::count() }}
         	</div>
			</a>

			<a href="{{ route('backend.users.inactiveUsers') }}" class="list-group-item {{ Nav::isRoute('backend.users.inactiveUsers') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				Inactive Users
				<div class="badge pull-right">
            	{{ App\User::inactiveUsers()->count() }}
         	</div>
			</a>

			<a href="{{ route('backend.users.trashed') }}" class="list-group-item {{ Nav::isRoute('backend.users.trashed') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				Trashed Users
				<div class="badge pull-right">
            	{{-- {{ App\User::trashedUsers()->count() }} --}}
         	</div>
			</a>

			<a href="{{ route('backend.users.create') }}" class="list-group-item {{ Nav::isRoute('backend.users.create') }}">
				<i class="fa fa-plus-square" aria-hidden="true"></i>
				Add User
			</a>

		</div>

	</div>
