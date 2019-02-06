@if(!checkACL('user'))
   <div class="col-xs-12">
      <div class="panel panel-info">
         <div class="panel-heading">
            <h3 class="panel-title">
               <i class="fa fa-arrow-right" aria-hidden="true"></i>
               Want to see more?
               <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </h3>
         </div>
         <div class="panel-body">
            {{ $message }}, please <a href="{{ route('login') }}">LOGIN</a> if you are already a member or <a href="{{ route('register') }}">REGISTER</a> an account if you are not.
         </div>
      </div>
   </div>
@endif
