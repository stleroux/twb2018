@extends('backend.layouts.app')

@section ('title','View Article')

@section ('stylesheets')
@stop

{{-- Pass along the ROUTE value of the previous page --}}
@php
	$ref = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
	// get the last part of the route, after the last dot
	//$end = substr(strrchr($ref, '.'), 1);
	if(substr(strrchr($ref, '.'), 1) == 'index') {
		$end = 'Articles';
	} else {
		$end = substr(strrchr($ref, '.'), 1);
	}
@endphp

@section('sectionSidebar')
	@include('backend.articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.articles.index') }}">Articles</a></li>
	{{-- <li><a href="{{ route($ref) }}">{{ ucfirst($end) }}</a></li> --}}
	<li class="active"><span>View Article</span></li>
@stop

@section('content')
	@include('backend.articles.show.form')
@stop

@section('blocks')
	@include('backend.articles.show.controls')
	@include('common.information', ['model'=>$article, 'title'=>'Article'])
@endsection


@section ('scripts')

		<script type="text/javascript">
				(function() {

			'use strict';

			// click events
			document.body.addEventListener('click', copy, true);

			// event handler
			function copy(e) {

				// find target element
				var
					t = e.target,
					c = t.dataset.copytarget,
					inp = (c ? document.querySelector(c) : null);

				// is element selectable?
				if (inp && inp.select) {

					// select text
					inp.select();

					try {
						// copy text
						document.execCommand('copy');
						inp.blur();
					}
					catch (err) {
						alert('please press Ctrl/Cmd+C to copy');
					}
				}
			}
		})();
		</script>
@stop