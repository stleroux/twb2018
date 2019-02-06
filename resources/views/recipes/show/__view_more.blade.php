@if(!checkACL('user'))
	<div class="alert alert-info text-center">
		If you would like to see more details about this recipe, please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> an account.
	</div>
@endif
