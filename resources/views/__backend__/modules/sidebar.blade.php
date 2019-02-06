<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-cubes" aria-hidden="true"></i>
         Modules
      </h4>
   </div>

   <div class="list-group">

      <a href="{{ route('backend.modules.newModules') }}" class="list-group-item {{ Nav::isRoute('backend.modules.newModules') }}">
         <i class="fa fa-cubes" aria-hidden="true"></i>
         New Modules
         <div class="badge pull-right">
            {{ App\Module::newModules()->count() }}
         </div>
      </a>

      <a href="{{ route('backend.modules.index') }}" class="list-group-item {{ Nav::isRoute('backend.modules.index') }}">
         <i class="fa fa-cubes" aria-hidden="true"></i>
         Modules
         <div class="badge pull-right">
            {{ App\Module::count() }}
         </div>
      </a>

   </div>

</div>
