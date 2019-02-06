{{-- JQUERY DateTime Picker --}}
<script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script>  

<script>
  $("#datetime").datetimepicker({
	 step: 30,
	 showOn: 'button',
	 buttonImage: '',
	 buttonImageOnly: true,
	 format:'Y-m-d H:i'+':00'
  });
</script>