@include('common.controlCenterHeader')
		
	<button type="submit" name="submit" class="btn btn-sm btn-block btn-success">
		<i class="fa fa-save"></i>
		Import Articles
	</button>
	
{{-- 	<a href="{{ route($ref) }}" class="btn btn-sm btn-block btn-default">
		<i class="fa fa-undo" aria-hidden="true"></i>
		Back
	</a> --}}

{{-- 	<a href="{{ route('backend.articles.index') }}" class="btn btn-sm btn-block btn-default">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Articles
	</a> --}}

@include('common.controlCenterFooter')