<!-- Make alert messages fade off the screen -->
<script type="text/javascript">
	$(document).ready(function () {
	 
		window.setTimeout(function() {
			//$(".message").fadeTo(5000, 0).delay(5000).slideUp(5000, function(){
			$(".message").fadeIn().delay({{ Auth::check() ? Auth::user()->profile->alert_fade_time : 5000 }}).fadeOut( function(){
				$(this).remove(); 
			});
		}
		);
	});
</script>

{{-- ,

			
				if (Auth::check()) { 
					// echo Auth::user()->profile->alert_fade_time;
				} else {
					echo '5000';
				}
			?> --}}