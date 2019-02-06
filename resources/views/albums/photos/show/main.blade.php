<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			{{ $photo->ori_name }}
			<span class="badge pull-right">Size : {{ $photo->size }} Kb</span>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<img src="/_albums/images/{{ $photo->album_id }}/{{ $photo->new_name }}" alt="{{ $photo->name}}" height="100%" width="100%">
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<strong>Description :</strong>
		<br />
		{{ $photo->description}}
	</div>
</div>