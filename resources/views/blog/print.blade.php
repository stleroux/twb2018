@extends ('common.layouts.print')

@section ('title', 'Print Post')

@section ('stylesheets')
   {{ Html::style('css/print.css') }}
@stop

{{-- @section('sectionSidebar')
   @include('posts.frontend.sidebar')
@stop --}}

{{-- @section('breadcrumb')
   <li><a href="/">Home</a></li>
   <li class="active"><span>posts</span></li>
@stop --}}

@section ('content')
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">
         <h3 class="panel-title">BLOG POST</h3>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9">
               <div class="panel panel-default">
                  <div class="panel-heading">Title</div>
                  <div class="panel-body">{{ ucwords($post->title) }}</div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
               <div class="panel panel-default">
                  <div class="panel-heading">Category</div>
                  <div class="panel-body">{!! $post->category->name !!}</div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <div class="panel panel-default">
                  <div class="panel-heading">Content</div>
                  <div class="panel-body">
                     @if($post->body)
                        {!! $post->body !!}
                     @else
                        N/A
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="panel-footer">
         From the Blog at TheWoodBarn.ca
      </div>
   </div>
@stop
