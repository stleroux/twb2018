<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			{{ $image->ori_name }}
			<span class="badge pull-right">Size : {{ $image->size }}</span>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<img src="/_woodProjects/images/{{ $image->wood_project_id }}/{{ $image->new_name }}" alt="{{ $image->name}}" height="100%" width="100%">
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<strong>Description :</strong>
		<br />
		{{ $image->description}}
	</div>
</div>