<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-phone" aria-hidden="true"></i>
			Contact Us
		</h3>
	</div>
	
	<div class="panel-body">
		<!-- Use url() instead of route() when there is no named route -->
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<label name="email">Email:</label>
			<input id="email" name="email" class="form-control" autofocus="autofocus" value="{{ old('email') }}">
			<span class="text-danger">{{ $errors->first('email') }}</span>
		</div>
		<div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
			<label name="subject">Subject:</label>
			<input id="subject" name="subject" class="form-control" value="{{ old('subject') }}">
			<span class="text-danger">{{ $errors->first('subject') }}</span>
		</div>
		<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
			<label name="message">Message:</label>
			<textarea id="message" name="message" class="form-control" placeholder="Type your message here" rows="5">{{ old('message') }}</textarea>
			<span class="text-danger">{{ $errors->first('message') }}</span>
		</div>
		<div class="g-recaptcha" data-sitekey="6LduZyYTAAAAANM_G6pjSZs4O61YJpVDPlLABw11"></div>
	</div>

</div>