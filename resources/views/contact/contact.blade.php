@extends ('layouts.app')

@section ('title', 'Contact Us')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Contact Us</span></li>
@stop

@section ('content')

	@include('errors.construction')

	<form action="{{ route('postContact') }}" method="POST">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-9">
				@include('contact.main')
			</div>
		
			<div class="col-md-3">
				@include('contact.controls')
			</div>
	 	</div>
  	</form>

@stop



@section ('scripts')
@stop