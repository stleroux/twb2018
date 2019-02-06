{!! Form::model($user, ['route'=>['backend.profile.updateSettings', $user->profile->id], 'method' => 'POST']) !!}
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					User Preferences
					<p class="text-muted"><small>(Features marked with	<i class="fa fa-check-square-o" aria-hidden="true"></i> have been implemented in code)</small></p>
				</div>
			</div>

			<div class="panel-body">

				{{-- ACTION BUTTONS --}}
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">Action Buttons
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Action Buttons"
										data-content="Changes the appearance of some buttons (Edit & Delete only at the moment).">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('action_buttons', array(
								'1' => 'Icons and Text (Default)',
								'2' => 'Icons only',
								'3' => 'Text Only',
								), $user->profile->action_buttons, array('class'=>'form-control input-sm'))
							}}
						</div>
					</div>
				</div>
				
				{{-- ALERT FADE TIME --}}
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Alert Fade Time
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Alert Fade Time"
										data-content="Changes the length of time the alerts will be displayed.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('alert_fade_time', array(
								'2000' => '2 seconds',
								'3000' => '3 seconds',
								'4000' => '4 seconds',
								'5000' => '5 seconds (Default)',
								'6000' => '6 seconds',
								'7000' => '7 seconds',
								'8000' => '8 seconds',
								'9000' => '9 seconds',
								'10000' => '10 seconds',
								'15000' => '15 seconds',
								'20000' => '20 seconds',
								'1000000000' => 'Forever',
								), $user->profile->alert_fade_time, array('class'=>'form-control input-sm'))
							}}
						</div>
					</div>
				</div>

				{{-- AUTHOR FORMAT --}}
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Author Format
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Author Format"
										data-content="Changes the way the author's name will be displayed.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('author_format', array(
								'1' => 'Username (Default)' ,
								'2' => 'Last Name, First Name',
								'3' => 'First Name Last Name'
								), $user->profile->author_format, array('class'=>'form-control input-sm')) }}
						</div>
					</div>
				</div>

				{{-- DATE FORMAT --}}
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Date Format
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Date Format"
										data-content="Changes the way the dates are displayed.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('date_format', array(
								'1' => 'Jan 01, 2017 (Default)',
								'2' => 'Jan 1, 2017',
								'3' => '01/01/2017 (M-D-Y)',
								'4' => '1/01/2017 (M-D-Y)',
								'5' => '01 Jan 2017',
								'6' => '1 Jan 2017',
								'7' => '01/01/2017 (D-M-Y)',
								'8' => '1/01/2017 (D-M-Y)',
								), $user->profile->date_format, array('class'=>'form-control input-sm')) }}
								{{-- '9' => 'Jan 01, 2017 12:00:00' --}}
						</div>
					</div>
				</div>

				{{-- DISPLAY SIZE --}}
				{{-- <div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">Display Size
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Display Size"
										data-content="Changes the width of the display of the whole site.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('display_size', array(
								'normal' => 'Normal (Default)',
								'wide' => 'Wide',
								), $user->profile->display_size, array('class'=>'form-control input-sm')) }}
						</div>
					</div>
				</div> --}}

				{{-- LANDING PAGE --}}
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Landing Page
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Landing Page"
										data-content="The page you will be redirected to when you log in to the site.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{-- {{ Form::select('landing_page', array(
								'/'                               => 'Home (Default)',
								'/articles'                       => 'Articles',
								'/blog'                           => 'Blog',
								'/backend/dashboard'              => 'Dashboard',
								'/backend/profile/'. $user->id    => 'Profile',
								), $user->profile->landing_page, array('class'=>'form-control input-sm')) }} --}}

								{{ Form::select('landing_page_id', $landingPages, $user->profile->landing_page_id , ['class' => 'form-control']) }}
								{{-- {{ Form::select('landing_page_id', array('' => '-- Landing PAGE --') + $landingPages, null , ['class' => 'form-control']) }}

								{{ $user->profile }} --}}
						</div>
					</div>
				</div>

				{{-- ROWS PER PAGE --}}
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Rows Per Page
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Rows Per Page"
										data-content="Changes the number of entries displayed in grids.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('rows_per_page', array(
								'5' => '5',
								'10' => '10',
								'15' => '15 (Default)',
								'20' => '20',
								'25' => '25',
								'50' => '50',
								'100' => '100'
								), $user->profile->rows_per_page, array('class'=>'form-control input-sm')) }}
						</div>
					</div>
				</div>

				{{-- FRONTEND STYLE --}}
				<div class="col-xs-6 col-sm-4 col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Frontend Style
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Style"
										data-content="Choosing a different style will change the apperance of the whole site.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('frontendStyle', array(
								'bootstrap' => 'Bootstrap',
								'cerulean' => 'Cerulean',
								'cosmo' => 'Cosmo',
								'cyborg'=>'Cyborg',
								'darkly'=>'Darkly',
								'flatly'=>'Flatly',
								'journal'=>'Journal',
								'lumen'=>'Lumen',
								'paper'=>'Paper',
								'readable'=>'Readable',
								'sandstone'=>'Sandstone',
								'simplex'=>'Simplex',
								'slate'=>'Slate (Default)',
								'spacelab'=>'SpaceLab',
								'superhero'=>'SuperHero',
								'united'=>'United',
								'yeti'=>'Yeti',
								), $user->profile->frontendStyle, array('class'=>'form-control input-sm')) }}
						</div>
					</div>
				</div>

				{{-- BACKEND STYLE --}}
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Backend Style
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Style"
										data-content="Choosing a different style will change the apperance of the whole site.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							{{ Form::select('backendStyle', array(
								'bootstrap' => 'Bootstrap (Default)',
								'cerulean' => 'Cerulean',
								'cosmo' => 'Cosmo',
								'cyborg'=>'Cyborg',
								'darkly'=>'Darkly',
								'flatly'=>'Flatly',
								'journal'=>'Journal',
								'lumen'=>'Lumen',
								'paper'=>'Paper',
								'readable'=>'Readable',
								'sandstone'=>'Sandstone',
								'simplex'=>'Simplex',
								'slate'=>'Slate',
								'spacelab'=>'SpaceLab',
								'superhero'=>'SuperHero',
								'united'=>'United',
								'yeti'=>'Yeti',
								), $user->profile->backendStyle, array('class'=>'form-control input-sm')) }}
						</div>
					</div>
				</div>

				{{-- SITE LAYOUT --}}
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Site Layout
								<div class="pull-right">
									<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
										data-placement="top"
										data-title="Layouts"
										data-content="Choosing a different layout will change the layout of the whole site.">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default form-check-label {{ $user->profile->layout == 1 ? 'active' : '' }}">
									<input class="form-check-input" name="layout" id="layout1" value="1" type="radio" {{ $user->profile->layout == 1 ? 'checked' : '' }} autocomplete="off">
									<pre>@include('backend.profiles.inc.layout1_preview')</pre>
									Layout 1 (Default)
								</label>
								<label class="btn btn-default form-check-label {{ $user->profile->layout == 2 ? 'active' : '' }}">
									<input class="form-check-input" name="layout" id="layout2" value="2" type="radio" {{ $user->profile->layout == 2 ? 'checked' : '' }} autocomplete="off">
									<pre>@include('backend.profiles.inc.layout2_preview')</pre>
									Layout 2
								</label>
								<label class="btn btn-default form-check-label {{ $user->profile->layout == 3 ? 'active' : '' }}">
									<input class="form-check-input" name="layout" id="layout3" value="3" type="radio" {{ $user->profile->layout == 3 ? 'checked' : '' }} autocomplete="off">
									<pre>@include('backend.profiles.inc.layout3_preview')</pre>
									Layout 3
								</label>
								<label class="btn btn-default form-check-label {{ $user->profile->layout == 4 ? 'active' : '' }}">
									<input class="form-check-input" name="layout" id="layout4" value="4" type="radio" {{ $user->profile->layout == 4 ? 'checked' : '' }} autocomplete="off">
									<pre>@include('backend.profiles.inc.layout4_preview')</pre>
									Layout 4
								</label>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="panel-footer">
				{{ Form::button('<i class="fa fa-save"></i> Update Preferences', array('type' => 'submit', 'class' => 'btn btn-xs btn-primary')) }}
				<a href="{{ route('backend.profile.resetSettings', $user->profile->id) }}" class="btn btn-xs btn-default">Reset All Defaults</a>
			</div>
			
		</div>
	</div>
{{ Form::close() }}