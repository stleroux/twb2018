{{-- This page displays forms to allow user to update their account and profile as well as change their password --}}

@extends('backend.layouts.app')

@section ('title', '| Profile')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.profiles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li class="active"><span>My Account</span></li>
@stop

@section('content')
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id="tabMenu">
			<li role="presentation" class="active"><a href="#account" aria-controls="account" role="tab" data-toggle="tab">Account</a></li>
			<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
			<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Preferences</a></li>
			<li role="presentation"><a href="#changePwd" aria-controls="changePwd" role="tab" data-toggle="tab">Change Password</a></li>
		</ul>

		<div class="row">
			{{-- <br /> --}}
			<!-- Tab panes -->
			<div class="tab-content" style="padding-top: 2px;">
				<div role="tabpanel" class="tab-pane active" id="account">
					@include('backend.profiles.inc.account')
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					@include('backend.profiles.inc.profile')
				</div>
				<div role="tabpanel" class="tab-pane" id="settings">
					@include('backend.profiles.inc.settings')
				</div>
				<div role="tabpanel" class="tab-pane" id="changePwd">
					@include('backend.profiles.inc.changePwd')
				</div>
			</div>
		</div>
	</div>
@endsection