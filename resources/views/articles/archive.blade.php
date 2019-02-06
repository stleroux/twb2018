{{-- Used to display recipe list when user clicks on links in the recipe archives block on the main page --}}

@extends ('layouts.app')

@section ('title', '| Articles Archive')

@section ('stylesheets')
   {{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
   {{-- @include('recipes.sidebar') --}}
@stop

@section('breadcrumb')
   <li><a href="/">Home</a></li>
   <li><a href="#">Articles</a></li>
   <li class="active">Archives</li>
@stop

@section ('content')
   <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-9">
         @include('articles.archive.main')
      </div>

      <div class="col-xs-12 col-sm-4 col-md-3">
         @include('articles.archive.controls')
         @include('articles.blocks.archives')
      </div>
   </div>
@stop

@section ('scripts')
@stop
