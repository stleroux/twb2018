{{-- Make default Bootstrap dropdown open when hovered --}}
<script>
	$(function() {
		$(".dropdown").hover(
			function(){ $(this).addClass('open') },
			function(){ $(this).removeClass('open') }
		);
	});
</script>