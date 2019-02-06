@extends ('backend.layouts.app')

@section ('title', '| ')

@section ('stylesheets')
@stop 

@section('sectionSidebar')
   @include('backend.recipes.sidebar')
@stop

@section('breadcrumb')
   <li><a href="dashboard">Dashboard</a></li>
   <li><a href="{{ route('backend.recipes.index') }}">Recipes</a></li>
   <li class="active"><span>Import Recipes</span></li>
@stop

@section('content')

   <form action="{{ URL::to('backend/recipes/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="panel text-right">
         {{-- Pass along the ROUTE value of the previous page --}}
         @php
            $ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
         @endphp
         <a href="{{ route($ref) }}" class="btn btn-default">Cancel</a>
         <button type="submit" name="submit" class="btn btn-success">
            <div class="text text-left">
               <i class="fa fa-save"></i> Import Recipes
            </div>
         </button>
      </div>

      <div class="panel panel-primary">
         <div class='panel-heading'>
            <h3 class="panel-title"><strong>Import Recipes</strong></h3>
         </div>
         <div class="panel-body">
            {!! Form::token() !!}
            <input type="file" name="import_file" class="btn"/>
         </div>
      </div>
   </form>
   
@stop

@section ('scripts')
   {!! Html::script('js/bootstrap.file-input.js') !!}

   <script type="text/javascript">
      $('input[type=file]').bootstrapFileInput();
      $('.file-inputs').bootstrapFileInput();
   </script>
@stop