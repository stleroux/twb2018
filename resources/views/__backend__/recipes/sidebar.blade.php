   <div class="panel panel-primary">

      {{-- <div class="panel-heading">
         <h4 class="panel-title">
            <i class="fa fa-address-card-o" aria-hidden="true"></i>
            Recipes
            <div class="badge pull-right">
               {{ App\Recipe::count() }}
            </div>
         </h4>
      </div> --}}
      <div class="panel-heading">
         <a href="{{ route('backend.recipes.index') }}" style="text-decoration: none; color:white;">
            <h4 class="panel-title">
                  <i class="fa fa-address-card-o" aria-hidden="true"></i>
                  Recipes
                  <div class="badge pull-right">
                     {{ App\Recipe::count() }}
                  </div>
            </h4>
         </a>
      </div>

      <div class="list-group">

         @if(checkACL('author'))
            <a href="{{ route('backend.recipes.newRecipes') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.newRecipes') }} ">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               New Recipes
               <div class="badge pull-right">
                  {{ App\Recipe::newRecipes()->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('user'))
            <a href="{{ route('backend.recipes.published') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.published') }} ">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Published
               <div class="badge pull-right">
                  {{ App\Recipe::published()->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('author'))
            <a href="{{ route('backend.recipes.myRecipes') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.myRecipes') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Created By Me
               <div class="badge pull-right">
                  {{ App\Recipe::myRecipes()->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('user'))
            <a href="{{ route('backend.recipes.myFavorites') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.myFavorites') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               My Favorites
               <div class="badge pull-right">
                  ?
               </div>
            </a>
         @endif

         @if(checkACL('publisher'))
            <a href="{{ route('backend.recipes.unpublished') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.unpublished') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Unpublished
               <div class="badge pull-right">
                  {{ App\Recipe::unpublished()->count() }}
               </div>
            </a>
         @endif
         
         @if(checkACL('publisher'))
            <a href="{{ route('backend.recipes.future') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.future') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Future
               <div class="badge pull-right">
                  {{ App\Recipe::future()->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('manager'))
            <a href="{{ route('backend.recipes.trashed') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.trashed') }}">
               <i class="fa fa-trash-o" aria-hidden="true"></i>
               Trashed
               <div class="badge pull-right">
                  {{ App\Recipe::trashedCount()->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('author'))
            <a href="{{ route('backend.recipes.create') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.create') }}">
               <i class="fa fa-plus-square" aria-hidden="true"></i>
               Add Recipe
            </a>
         @endif

         @if(checkACL('manager'))
            <a href="{{ route('backend.recipes.import') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.import') }}">
               <i class="fa fa-upload" aria-hidden="true"></i>
               Import
            </a>
         @endif

         @if(checkACL('manager'))
            <a href="{{ URL::to('backend/recipes/downloadExcel/xls') }}" class="list-group-item">
               <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               Download All as XLS
            </a>

            <a href="{{ URL::to('backend/recipes/downloadExcel/xlsx') }}" class="list-group-item">
               <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               Download All as XLSX
            </a>

            <a href="{{ URL::to('backend/recipes/downloadExcel/csv') }}" class="list-group-item">
               <i class="fa fa-file-text-o" aria-hidden="true"></i>
               Download All as CSV
            </a>

            <a href="{{ route('backend.recipes.pdfview') }}" class="list-group-item {{ Nav::isRoute('backend.recipes.pdfview') }}">
               <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
               Preview All as PDF
            </a>

            <a href="{{ route('backend.recipes.pdfview',['download'=>'pdf']) }}" class="list-group-item">
               <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
               Download All to PDF
            </a>
         @endif

      </div>

   </div>
