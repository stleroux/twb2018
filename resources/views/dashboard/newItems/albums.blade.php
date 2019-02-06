<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
			Albums
		</div>
	</div>
	
	<div class="panel-body">
		@if($newAlbums->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Created By</th>
						<th>Created On</th>
						<th>Public</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newAlbums as $newAlbum)
						<tr>
							<td><a href="albums\{{$newAlbum->id}}">{{ $newAlbum->name }}</a></td>
							<td>{{-- {{ $album->user->username }} --}}</td>
							<td>@include('common.dateFormat', ['model'=>$newAlbum, 'field'=>'created_at'])</td>
							<td></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
