<form method="POST" action="{{ route('backend.profile.changePassword') }}">
	{{ csrf_field() }}
	<div class="col-xs-12 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Change Password</div>
			</div>

			<div class="panel-body">
				<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
					<label for="current-password" class="required">Current Password</label>
						<input id="current-password" type="password" class="form-control input-sm" name="current-password">
						@if ($errors->has('current-password'))
							<span class="help-block">
								<strong>{{ $errors->first('current-password') }}</strong>
							</span>
						@endif
				</div>

				<div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
					<label for="new-password" class="required">New Password</label>
						<input id="new-password" type="password" class="form-control input-sm" name="new-password">
						@if ($errors->has('new-password'))
							<span class="help-block">
								<strong>{{ $errors->first('new-password') }}</strong>
							</span>
						@endif
				</div>

				<div class="form-group">
					<label for="new-password-confirm" class="required">Confirm New Password</label>
						<input id="new-password-confirm" type="password" class="form-control input-sm" name="new-password_confirmation">
				</div>
			</div>

			<div class="panel-footer">
				<button type="submit" class="btn btn-xs btn-primary">
					Change Password
				</button>
			</div>

		</div>
	</div>
</form>

@section('scripts')
	<script>
		//redirect to specific tab
		$(document).ready(function () {
			$('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
		});
	</script>
@endsection
