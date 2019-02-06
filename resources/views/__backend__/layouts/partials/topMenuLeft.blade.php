<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">TheWoodBarn.ca</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				{{-- <li class="{{ Request::is('/') ? "active": "" }}"><a href="/">Home</a></li> --}}
				{{-- <li><a href="#">Blog</a></li>
				<li><a href="#">Recipes</a></li>
				<li><a href="#">Shop</a></li>
				<li class="{{ Request::is('about*') ? "active": "" }}"><a href="about">About Us</a></li>
				<li class="{{ Request::is('contact*') ? "active": "" }}"><a href="contact">Contact Us</a></li> --}}
				{{-- @if(Auth::check())
					<li class="{{ Request::is('backend*') ? "active": "" }}"><a href="dashboard">Dashboard</a></li>
				@endif --}}
{{-- 				@if(Auth::check())
					<li class="{{ Request::is('profile*') ? "active": "" }}"><a href="/profile">My Account</a></li>
				@endif --}}
			</ul>