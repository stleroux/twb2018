@extends('darts.layouts.app')

@section('stylesheets')
	<style>
		.hover { background-color: grey; }
		.thead tr th { color: yellow; }

		/*tr.rowcolSelected{ background-color: #222222; }*/
		td.rowcolSelected:hover{
			background-color: red;
			color: black;
			font-weight: bold;
		}
	</style>
@endsection

@section('content')

	@include('darts.inc.scoreboard')
	{{-- @include('darts.scores.01._scorePanel') --}}
	
	<div class="row">
		<div class="col-sm-4">
			@include('darts.scores.01.t1scorePanel')
		</div>

		<div class="col-sm-4">
			@include('darts.scores.01.gameInfo')
		</div>

		<div class="col-sm-4">
			@include('darts.scores.01.t2scorePanel')
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			@include('darts.scores.01.t1scoresheet')
			@include('darts.scores.01.t1possibleOuts')
		</div>

		<div class="col-sm-4">
			@include('darts.scores.01.gameStats')
			@include('darts.scores.01.playerStats')
		</div>

		<div class="col-sm-4">
			@include('darts.scores.01.t2scoresheet')
			@include('darts.scores.01.t2possibleOuts')
		</div>
	</div>

@endsection

@section('scripts')
	<script>
		$("#tbl").delegate('td','mouseover mouseleave', function(e) {
			if (e.type == 'mouseover') {
				$(this).parent().addClass("hover");
				$("colgroup").eq($(this).index()).addClass("hover");
			} else {
				$(this).parent().removeClass("hover");
				$("colgroup").eq($(this).index()).removeClass("hover");
			}
		});
	</script>

	<script type="text/javascript">
		// $(document).ready(function () {
		// 	window.setTimeout(function() {
		// 		$(".alert").fadeTo(1500, 0).slideUp(1500, function(){
		// 			$(this).remove(); 
		// 		});
		// 	}, 7000);
		// });


	   $(document).ready(function(){
	      $('#display-success').fadeIn().delay(4000).fadeOut();
	      $('#display-error').fadeIn().delay(8000).fadeOut();
	   });

	</script>
@endsection