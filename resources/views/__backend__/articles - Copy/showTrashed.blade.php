@extends('backend.layouts.app')

@section ('title','View Article')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.articles.index') }}">Articles</a></li>
	<li class="active"><span>View Article</span></li>
@stop

@section('content')

	<div class="panel text-right">
		<a href="{{ route('backend.articles.trashed') }}" class="btn btn-default">Back</a>
	</div>

	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title"><strong>Article Details</strong></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8">
					<div class="form-group">
						{!! Form::label('title', 'Title') !!}
						{!! Form::text('title', $article->title, ['class'=>'form-control', 'readonly']) !!}
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						{{ Form::label('category_id', 'Category', ['class'=>'required']) }}
						{{ Form::text('category_id', $article->category->name, ['class'=>'form-control', 'readonly']) }}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{!! Form::label('description_eng', 'Description (En)', ['class'=>'required']) !!}
					<div class="well">{!! $article->description_eng !!}</div>
				</div>
			</div>  

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{!! Form::label('description_fre', 'Description (Fr)', ['class'=>'required']) !!}
					<div class="well">{!! $article->description_fre !!}</div>
				</div>
			</div>
		</div>
	</div>
@stop


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