@include('homepage.greeting')

@auth
	{{-- @if(Auth::user()->login_count < 5) --}}
	@if(Auth::check())
		@include('homepage.loggedIn')
		
      @if(Auth::user()->login_count == 1)
         @include('homepage.newUser')
      @endif
	@endif
@endauth


         