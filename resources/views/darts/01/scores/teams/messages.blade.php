<div style="padding-top: 5px"></div>

@if(session('success'))
   <div id="display-success">
      <div class="panel panel-success">
         <div class="panel-heading">
            <div class="panel-title">{{ session('success') }}</div>
         </div>
      </div>
   </div>
@endif


@if (session('error'))
   <div id="display-danger">
      <div class="panel panel-danger">
         <div class="panel-heading">
            <div class="panel-title">{{ session('error') }}</div>
         </div>
      </div>
   </div>
@endif


@if (count($errors) > 0)
   <div id="display-error">
      <div class="panel panel-danger">
         <div class="panel-heading">
            <div class="panel-title">@foreach ($errors->all() as $error)
                  <li> {{ $error }} </li>
               @endforeach</div>
         </div>
      </div>
   </div>
@endif
