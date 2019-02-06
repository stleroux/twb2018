{{-- 
====================================================
| TOP MENU                                         |
====================================================
| SIDEBAR | BREADCRUMB                             |
|         |========================================|
|         | MENU | CONTENT                         |
==================================================== 
 --}}

<div class="row">
   
{{--    <div class="col-xs-12 col-md-2">
      @include('layouts.partials.sidebar')
   </div> --}}

   <div class="col-xs-12">
      <div class="row">
         <div class="col-xs-12">
            @include('layouts.partials.breadcrumbs')

            @if(View::hasSection('warning'))
               @yield('warning')
            @endif
               
            @if(View::hasSection('intro'))
               @yield('intro')
            @endif

{{--             <div class="row">
               <div class="col-xs-12 col-md-9 col-md-push-3">
                  @yield('content')
               </div>
               <div class="col-xs-12 col-md-3 col-md-pull-9">
                  @yield('blocks')
               </div>
            </div> --}}

            <div class="row">
               @if(View::hasSection('blocks'))
                  <div class="col-xs-12 col-md-9 col-md-push-3">
                     @yield('content')
                  </div>
                  <div class="col-xs-12 col-md-3 col-md-pull-9">
                     @yield('blocks')
                  </div>
               @else
                  <div class="col-xs-12">
                     @yield('content')
                  </div>
               @endif
            </div>
         </div>
      </div>
   </div>

</div>

