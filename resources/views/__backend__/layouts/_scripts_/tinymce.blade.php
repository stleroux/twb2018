{{-- Configuration setting for TinyMCE Editor --}}
{{-- Will only add the editor to textareas that have class = wysiwyg. See post->add for example --}}
<script src="{{url('tinymce/tinymce.min.js')}}"></script>

<script>
	tinymce.init({
		selector: '.wysiwyg',
		branding: false,
		plugins: [
			'code lists advlist',
			'link charmap hr pagebreak',
			'wordcount',
			'nonbreaking table contextmenu',
			'emoticons paste textcolor colorpicker textpattern codesample'
		],
		toolbar1: 'undo redo | insert | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | codesample | link'
		});
</script>
<script>
	tinymce.init({
		selector: '.simple',
		branding: false,
		menubar: false,
		plugins: [
			'advlist autolink lists link charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
		],
		toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
		content_css: '//www.tinymce.com/css/codepen.min.css'
	});
</script>
