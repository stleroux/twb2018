@extends('invoicer.layouts.app')

@section('content')

	<div class="panel panel-primary">

		<div class="panel-heading">
			<h3 class="panel-title">
				Welcome to the Invoicer Dashboard
				<span class="pull-right"><small>V.1.0</small></span>
			</h3>
		</div>
		
		<div class="panel-body">

			<div class="col-xs-12">
				@include('invoicer.dashboard.inc.totals')
			</div>

			<div class="col-xs-12 col-sm-3">
				@include('invoicer.dashboard.inc.invoices')
			</div>

			<div class="col-xs-12 col-sm-6">
				@include('invoicer.dashboard.inc.clients')
			</div>

			<div class="col-xs-12 col-sm-3">
				@include('invoicer.dashboard.inc.products')
			</div>
		
		</div>

	</div>

@endsection
