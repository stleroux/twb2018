@if(checkACL('editor'))
   <div class="panel-default">
      <a href="{{ route('recipes.index') }}" class="btn btn-sm {{ Route::is('recipes.index') ? "btn-primary": "btn-default" }}">
         All Recipes
      </a>
      <a href="{{ route('recipes.newRecipes') }}" class="btn btn-sm {{ Route::is('recipes.newRecipes') ? "btn-primary": "btn-default" }}">
         New Recipes
      </a>
      <a href="{{ route('recipes.unpublished') }}" class="btn btn-sm {{ Route::is('recipes.unpublished') ? "btn-primary": "btn-default" }}">
         Unpublished Recipes
      </a>
      <a href="{{ route('recipes.future') }}" class="btn btn-sm {{ Route::is('recipes.future') ? "btn-primary": "btn-default" }}">
         Future Recipes
      </a>
      <a href="{{ route('recipes.trashed') }}" class="btn btn-sm {{ Route::is('recipes.trashed') ? "btn-primary": "btn-default" }}">
         Trashed Recipes
      </a>
      <br />
      <br />
   </div>
@endif