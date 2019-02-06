@if(checkACL('user'))
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				Project Images
			</div>
		</div>
		<div class="panel-body">
			@if($project->projectImages->count() > 0)
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

					<!-- Indicators -->
					<ol class="carousel-indicators">
						@foreach( $project->projectImages as $image )
							<li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
						@endforeach
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						@foreach( $project->projectImages as $image )
							<div class="item {{ $loop->first ? ' active' : '' }}" >
								<a href="" data-toggle="modal" data-target="#extraImageModal{{$image->id}}">
									<img class="center-block" src="/_woodProjects/images/thumbs/{{ $image->wood_project_id }}/{{ ucfirst($image->new_name) }}" alt="{{ $image->name}}">
								</a>
								{{-- <div class="carousel-caption"><small>{{ $image->ori_name }}</small></div> --}}
								<div class="text text-center">{{ ucfirst($image->ori_name) }}</div>
							</div>

									 {{-- EXTRA IMAGE MODAL --}}
										 <div class="modal fade" id="extraImageModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="extraImageModalLabel">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
												 <div class="modal-header">
													 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													 </button>
													 <h4 class="modal-title" id="">Project Extra Image</h4>
												 </div>
												 <div class="modal-body">
													 <p>{{ Html::image("_woodProjects/images/".$image->wood_project_id."/".ucfirst($image->new_name), "", array('height'=>'100%','width'=>'100%')) }}</p>
												 </div>
												 <div class="modal-footer">
													 <button type="button" class="btn-default" data-dismiss="modal">Close</button>
												 </div>
												</div>
											</div>
										 </div>
										 {{-- @include('modals.imageModal', [
												 'title'=>'Extra Project Image',
												 'img_path'=>'_woodProjects\images',
												 'img_name'=>'new_name',
												 'model'=>$project
												 ]) --}}
								@endforeach
						 </div>

						 <!-- Controls -->
						 <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class=""></span>
								<span class="sr-only">Previous</span>
						 </a>
						 <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
						 </a>
					</div>
			 @else
					No Extra Images Available At This Time
			 @endif

		</div>
		<div class="panel-footer">
			 Click on image to view it full size
		</div>
	</div>
@endif
