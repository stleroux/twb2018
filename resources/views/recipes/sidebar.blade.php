@auth
   <div class="panel panel-primary">

      <div class="panel-heading">
            <h4 class="panel-title">
               Module Menu
            </h4>
         </div>

         <div class="list-group">

            @if(checkACL('user'))
               <a href="{{ route('recipes.index') }}" class="list-group-item {{ Nav::isRoute('recipes.index') }}">
                  <i class="fa fa-address-card-o" aria-hidden="true"></i>
                  Recipes
                  <div class="badge pull-right">
                     {{ App\Recipe::published()->count() }}
                  </div>
               </a>
            @endif

      

         @if(checkACL('author'))
            <a href="{{ route('recipes.newRecipes') }}" class="list-group-item {{ Nav::isRoute('recipes.newRecipes') }} ">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               New Recipes
               <div class="badge pull-right">
                  {{ App\Recipe::newRecipes()->count() }}
               </div>
            </a>
         @endif

{{--          @if(checkACL('user'))
            <a href="{{ route('recipes.published') }}" class="list-group-item {{ Nav::isRoute('recipes.published') }} ">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Published
               <div class="badge pull-right">
                  {{ App\Recipe::published()->count() }}
               </div>
            </a>
         @endif --}}

         @if(checkACL('author'))
            <a href="{{ route('recipes.myRecipes') }}" class="list-group-item {{ Nav::isRoute('recipes.myRecipes') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Created By Me
               <div class="badge pull-right">
                  {{ App\Recipe::myRecipes()->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('user'))
            <a href="{{ route('recipes.myFavorites') }}" class="list-group-item {{ Nav::isRoute('recipes.myFavorites') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               My Favorites
               <div class="badge pull-right">
                  {{ DB::table('recipe_user')->where('user_id','=',Auth::user()->id)->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('publisher'))
            <a href="{{ route('recipes.unpublished') }}" class="list-group-item {{ Nav::isRoute('recipes.unpublished') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Unpublished
               <div class="badge pull-right">
                  {{ App\Recipe::unpublished()->count() }}
               </div>
            </a>
         @endif
         
         @if(checkACL('publisher'))
            <a href="{{ route('recipes.future') }}" class="list-group-item {{ Nav::isRoute('recipes.future') }}">
               <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Future
               <div class="badge pull-right">
                  {{ App\Recipe::future()->count() }}
               </div>
            </a>
         @endif

         @if(checkACL('manager'))
            <a href="{{ route('recipes.trashed') }}" class="list-group-item {{ Nav::isRoute('recipes.trashed') }}">
               <i class="fa fa-trash-o" aria-hidden="true"></i>
               Trashed
               <div class="badge pull-right">
                  {{ App\Recipe::trashedCount()->count() }}
               </div>
            </a>
         @endif

         {{-- @if(checkACL('author'))
            <a href="{{ route('recipes.create') }}" class="list-group-item {{ Nav::isRoute('recipes.create') }}">
               <i class="fa fa-plus-square" aria-hidden="true"></i>
               Add Recipe
            </a>
         @endif

         @if(checkACL('manager'))
            <a href="{{ route('recipes.import') }}" class="list-group-item {{ Nav::isRoute('recipes.import') }}">
               <i class="fa fa-upload" aria-hidden="true"></i>
               Import
            </a>
         @endif

         @if(checkACL('manager'))
            <a href="{{ URL::to('recipes/downloadExcel/xls') }}" class="list-group-item">
               <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               Download All as XLS
            </a>

            <a href="{{ URL::to('recipes/downloadExcel/xlsx') }}" class="list-group-item">
               <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               Download All as XLSX
            </a>

            <a href="{{ URL::to('recipes/downloadExcel/csv') }}" class="list-group-item">
               <i class="fa fa-file-text-o" aria-hidden="true"></i>
               Download All as CSV
            </a>

            <a href="{{ route('recipes.pdfview') }}" class="list-group-item {{ Nav::isRoute('recipes.pdfview') }}">
               <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
               Preview All as PDF
            </a>

            <a href="{{ route('recipes.pdfview',['download'=>'pdf']) }}" class="list-group-item">
               <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
               Download All to PDF
            </a>
         @endif --}}

      </div>

   </div>

@endauth