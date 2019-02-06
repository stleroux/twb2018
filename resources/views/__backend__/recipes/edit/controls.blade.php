@include('common.controlCenterHeader')

	{{-- <a href="{{ route($ref) }}" class="btn btn-default">Cancel</a> --}}

	{{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary btn-block')) }}

   {{-- <a class="btn btn-sm btn-default btn-block" href="{{ URL::previous() }}">Cancel</a> --}}

	<a href="{{-- {{ route('backend.recipes.deleteImage', $recipe->id) }} --}}" class="btn btn-sm btn-danger btn-block">
		<i class="fa fa-trash-o" aria-hidden="true"></i> Delete Image
	</a>

@include('common.controlCenterFooter')