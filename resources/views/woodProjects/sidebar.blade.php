<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-pagelines" aria-hidden="true"></i>
         Woodshop Projects
      </h4>
   </div>

   <div class="list-group">

      <a href="{{ route('woodProjects.newWoodProjects') }}" class="list-group-item {{ Nav::isRoute('woodProjects.newWoodProjects') }}">
         <i class="fa fa-pagelines" aria-hidden="true"></i>
         New Projects
         <div class="badge pull-right">
            {{ App\WoodProject::newWoodProjects()->count() }}
         </div>
      </a>

      <a href="{{ route('woodProjects.index') }}"
         class="list-group-item
               {{ Nav::isRoute('woodProjects.index') }}
               {{ Nav::isRoute('woodProjectImages.show') }}
               {{ Nav::isRoute('woodProjects.show') }}
               {{ Nav::isRoute('woodProjects.admin') }}
         ">
         <i class="fa fa-pagelines" aria-hidden="true"></i>
         Woodshop Projects
         <div class="badge pull-right">
            {{ App\WoodProject::count() }}
         </div>
      </a>
      
      


      
      
   </div>

</div>
