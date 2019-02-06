@if(Auth::check())
   @if(Auth::user()->profile->frontendStyle === 'bootstrap')
      <style>
         .menu_active { background-color: #90caf9; }
      </style>
   @endif
   @if(Auth::user()->profile->frontendStyle === 'slate')
      <style>
         .menu_active { background-color: #0f0f0f; }
      </style>
   @endif
    @if(Auth::user()->profile->frontendStyle === 'cerulean')
      <style>
         .menu_active { background-color: #90caf9; }
      </style>
   @endif
@else
   <style>
      .menu_active { background-color: #0f0f0f; }
   </style>
@endif