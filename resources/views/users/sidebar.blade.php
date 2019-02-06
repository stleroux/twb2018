	<div class="panel panel-primary">

      <div class="panel-heading">
         <h4 class="panel-title">
            Module Menu
         </h4>
      </div>


		<div class="list-group">

			<a href="{{ route('users.index') }}" class="list-group-item {{ Nav::isRoute('users.index') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				All Users
				<div class="badge pull-right">
            	{{ App\User::count() }}
         	</div>
			</a>

			<a href="{{ route('users.newUsers') }}" class="list-group-item {{ Nav::isRoute('users.newUsers') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				New Users
				<div class="badge pull-right">
            	{{ App\User::newUsers()->count() }}
         	</div>
			</a>

			<a href="{{ route('users.inactiveUsers') }}" class="list-group-item {{ Nav::isRoute('users.inactiveUsers') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				Inactive Users
				<div class="badge pull-right">
            	{{ App\User::inactiveUsers()->count() }}
         	</div>
			</a>

			<a href="{{ route('users.trashed') }}" class="list-group-item {{ Nav::isRoute('users.trashed') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				Trashed Users
				<div class="badge pull-right">
            	{{ DB::table('users')->where('deleted_at', '!=', 'null')->count() }}
         	</div>
			</a>

		</div>

	</div>
