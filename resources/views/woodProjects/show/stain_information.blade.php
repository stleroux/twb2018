@if(checkACL('user'))
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Stain Information</div>
		</div>
		<div class="panel-body">
			<div class="col-xs-4">
				<label for="wood_type">Type</label>
				<div class="well well-xs">
					{{ $project->stain_type_id ? $project->stainType->name : 'N/A' }}
					{{-- {{ $project->stain_type_id or 'N/A' }} --}}
				</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Color</label>
				<div class="well well-xs">
					{{ $project->stain_color_id ? $project->stainColor->name : 'N/A' }}
					{{-- {{ $project->stain_color_id or 'N/A' }} --}}
				</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Sheen</label>
				<div class="well well-xs">
					{{ $project->stain_sheen_id ? $project->stainSheen->name : 'N/A' }}
					{{-- {{ $project->stain_sheen_id or 'N/A' }} --}}
				</div>
			</div>
		</div>
	</div>
@endif