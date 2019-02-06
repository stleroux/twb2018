@include('common.controlCenterHeader')

   <a href="{{ route('woodProjectImages.create', $project->id) }}" class="btn btn-default btn-block">Add Image</a>
   <a href="{{ Session::get('fullURL') }}" class="btn btn-default btn-block">
      <i class="fa fa-" aria-hidden="true"></i>
      Previous
   </a>
   <a href="/woodProjects/" class="btn btn-default btn-block">Wood Projects</a>

@include('common.controlCenterFooter')

