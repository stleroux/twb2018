{{-- This page displays forms to allow user to update their account and profile as well as change their password --}}

@extends('layouts.app')

@section ('title', '| Profile')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

{{-- @section('sectionSidebar')
  @include('profiles.sidebar')
@stop --}}

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><span class="active">My Account</span></li>
@stop

@section('content')
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id="tabMenu">
			<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
			<li role="presentation"><a href="#account" aria-controls="account" role="tab" data-toggle="tab">Account</a></li>
			<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Preferences</a></li>
			<li role="presentation"><a href="#changePwd" aria-controls="changePwd" role="tab" data-toggle="tab">Change Password</a></li>
			<li role="presentation"><a href="#privileges" aria-controls="privileges" role="tab" data-toggle="tab">Privileges</a></li>
			<li role="presentation"><a href="#pastNotifications" aria-controls="pastNotifications" role="tab" data-toggle="tab">Past Notifications</a></li>
		</ul>

		<div class="row">
			{{-- <br /> --}}
			<!-- Tab panes -->
			<div class="tab-content" style="padding-top: 0px;">
				<div role="tabpanel" class="tab-pane active" id="profile">
					@include('profiles.inc.profile')
				</div>
				<div role="tabpanel" class="tab-pane" id="account">
					@include('profiles.inc.account')
				</div>
				<div role="tabpanel" class="tab-pane" id="settings">
					@include('profiles.inc.settings')
				</div>
				<div role="tabpanel" class="tab-pane" id="changePwd">
					@include('profiles.inc.changePwd')
				</div>
				<div role="tabpanel" class="tab-pane" id="privileges">
					@include('profiles.inc.privileges')
				</div>
				<div role="tabpanel" class="tab-pane" id="pastNotifications">
					@include('profiles.inc.pastNotifications')
				</div>
			</div>
		</div>
	</div>
@endsection