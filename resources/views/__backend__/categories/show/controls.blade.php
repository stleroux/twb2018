@include('common.controlCenterHeader')

	{{-- 	<a href="{{ route($ref) }}" class="btn btn-sm btn-block btn-default">
		Previous Page
	</a> --}}
	<a href="{{ url()->previous() }}" class="btn btn-sm btn-default btn-block">
		<i class="fa fa-undo" aria-hidden="true"></i>
		Back
	</a>

@include('common.controlCenterFooter')