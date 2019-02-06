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
				<li class="{{ Request::is('darts') ? "active": "" }}">
					<a href="{{ route('darts.index') }}">
						<i class="fa fa-bullseye" aria-hidden="true"></i>
						{{-- <img src="images/darts.png" height="25px" /> --}}
						Darts
					</a>
				</li>
				<li class="{{ Request::is('darts/newGame') ? "active": "" }}">
					<a href="{{ route('darts.game.create') }}">
						<i class="fa fa-gamepad" aria-hidden="true"></i>
						New Game
					</a>
				</li>
				<li class="{{ Request::is('darts/games/board*') ? "active": "" }}">
					<a href="{{ route('darts.games.board') }}">
						<i class="fa fa-industry" aria-hidden="true"></i>
						Games Board
					</a>
				</li>
			</ul>

