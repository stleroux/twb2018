@if(Auth::check())
   @if(Auth::user()->profile->backendStyle === 'bootstrap')
      <style>
         .menu_active { background-color: #90caf9; }
      </style>
   @endif
   @if(Auth::user()->profile->backendStyle === 'slate')
      <style>
         .menu_active { background-color: #0f0f0f; }
      </style>
   @endif
   @if(Auth::user()->profile->backendStyle === 'cerulean')
      <style>
         .menu_active { background-color: #0f0f0f; }
      </style>
   @endif
@else
   <style>
      .menu_active { background-color: #90caf9; }
   </style>
@endif

