<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<i class="fa fa-cogs" aria-hidden="true"></i>
					Welcome back {{ Auth::user()->profile->first_name }}!
				</h4>
			</div>
			<div class="panel-body">
				<p>You have logged in {{ Auth::user()->login_count }} times to date.</p>
			</div>
		</div>
	</div>
</div>