@extends('layouts.app')

@section ('title', '| Members')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

{{-- @section('sectionSidebar')
  @include('frontend.profiles.sidebar')
@stop --}}

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Our Members</span></li>
@stop

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-users" aria-hidden="true"></i>
				Our Members
			</h3>
		</div>
		<div class="panel-body">
			@foreach($members as $member)
				<div class="col-xs-12 col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">{{ $member->username }}</h4>
						</div>
						{{-- <div class="panel-body"> --}}
							<div class="media-left media-middle">
								@if($member->profile->image)
									<img class="media-object" src="_profiles/{{ $member->profile->image }}" alt="..." height="100px" width="85px">
								@else
									<img class="media-object" src="_profiles/no_photo.jpg" alt="..." height="100px" width="85px">
								@endif
							</div>
							<div class="media-body">
								<strong>First Name :</strong> {{ $member->profile->first_name or 'N/A' }}<br />
								<strong>Last Name :</strong> {{ $member->profile->last_name or 'N/A' }}<br />
								<strong>E-mail :</strong>
									@if($member->public_email == 0)
										Undisclosed
									@else
										{{ $member->email }}
									@endif<br />
								<strong>Member Since :</strong> @include('common.dateFormat', ['model'=>$member, 'field'=>'created_at'])<br />
								<strong>Role :</strong> {{ $member->role->display_name }}
							</div>
						{{-- </div> --}}
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection