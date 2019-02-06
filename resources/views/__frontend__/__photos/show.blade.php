{{-- PHOTO SHOW --}}

@extends ('frontend.layouts.app')

@section ('stylesheets')
@stop

@section('sectionSidebar')
   {{-- @include('backend.photos.sidebar') --}}
@stop

@section('breadcrumb')
   <li><a href="\">Home</a></li>
   <li><a href="{{ route('albums') }}">Albums</a></li>
   <li><a href="{{ route('albums.show', $photo->album_id) }}">{{ $photo->album->name }}</a></li>
   <li class="active"><span>View Photo</span></li>
@stop

@section('content')

   <div class="panel text-right">
      <a href="/albums/{{ $photo->album_id }}" class="btn btn-default">Back to Album</a>
    </div>

   <div class="panel panel-primary">
      <div class="panel-heading">
         <div class="panel-title">
            {{ $photo->ori_name }}
            <span class="badge pull-right">Size : {{ $photo->size }}</span>
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

@endsection