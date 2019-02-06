{{--
<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
	<label for="current-password" class="required">Current Password</label>
		<input id="current-password" type="password" class="form-control input-sm" name="current-password">
		@if ($errors->has('current-password'))
			<span class="help-block">
				<strong>{{ $errors->first('current-password') }}</strong>
			</span>
		@endif
</div>
--}}

<div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
	<label for="new-password" class="required">New Password</label>
	{!! Form::text("new-password", null, ["class" => "form-control input-sm", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}

	@if ($errors->has('new-password'))
		<span class="help-block">
			{{ $errors->first('new-password') }}
		</span>
	@endif
</div>

<div class="form-group">
	<label for="new-password-confirm" class="required">Confirm New Password</label>
		<input id="new-password-confirm" type="text" class="form-control input-sm" name="new-password_confirmation">
</div>