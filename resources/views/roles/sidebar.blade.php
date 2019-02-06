<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-circle" aria-hidden="true"></i>
         Roles
      </h4>
   </div>

   <div class="list-group">

      <a href="{{ route('roles.newRoles') }}" class="list-group-item {{ Nav::isRoute('roles.newRoles') }}">
         <i class="fa fa-circle" aria-hidden="true"></i>
         New Roles
         <div class="badge pull-right">
            {{ App\Role::newRoles()->count() }}
         </div>
      </a>

      <a href="{{ route('roles.index') }}"
         class="list-group-item
            {{ Nav::isRoute('roles.index') }}
            {{ Nav::isRoute('roles.edit') }}
            {{ Nav::isRoute('roles.show') }}">
         <i class="fa fa-circle" aria-hidden="true"></i>
         Roles
         <div class="badge pull-right">
            {{ App\Role::count() }}
         </div>
      </a>

      <a href="{{ route('roles.create') }}" class="list-group-item {{ Nav::isRoute('roles.create') }}">
         <i class="fa fa-plus-square" aria-hidden="true"></i>
         Add Role
      </a>

   </div>

</div>