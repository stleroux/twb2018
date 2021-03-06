{{-- 
====================================================
| TOP MENU                                         |
====================================================
| BREADCRUMB                             | SIDEBAR |
=========================================|         |
| CONTENT                         | MENU |         |
==================================================== 
--}}

<div class="row">
   
   <div class="col-xs-12 col-md-2 col-md-push-10">
      @include('backend.layouts.partials.sidebar')
   </div>

   <div class="col-xs-12 col-md-10 col-md-pull-2">
      <div class="row">
         <div class="col-xs-12">
            @include('backend.layouts.partials.breadcrumbs')

            @if(View::hasSection('warning'))
               @yield('warning')
            @endif
               
            @if(View::hasSection('intro'))
               @yield('intro')
            @endif
{{--             <div class="row">
               <div class="col-xs-12 col-md-9">
                  @yield('content')
               </div>
               <div class="col-xs-12 col-md-3">
                  @yield('blocks')
               </div>
            </div> --}}
            
            <div class="row">
               @if(View::hasSection('blocks'))
                  <div class="col-xs-12 col-md-9">
                     @yield('content')
                  </div>
                  <div class="col-xs-12 col-md-3">
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