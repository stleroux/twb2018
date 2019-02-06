@extends('layouts.app')

@section ('title','Edit Article')

@section ('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>Edit Article</span></li>
@stop

@section('content')
	{!! Form::model($article, ['route'=>['articles.update', $article->id], 'method' => 'PUT']) !!}
		{{-- <input type="hidden" value="{{ $ref }}" name="ref" size="50"/> --}}

{{-- 		<div class="panel text-right">
			<a href="{{ route($ref) }}" class="btn btn-default">Cancel</a>
			{{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
		</div> --}}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9">
		@include('articles.edit.form')
	</div>

	<div class="col-xs-12 col-sm-12 col-md-3">
		@include('articles.edit.controls')
	</div>
</div>



	{!! Form::close() !!}
@stop

@section ('scripts')
{{--   <script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script>
	<script>
		$("#datetime").datetimepicker({
			step: 30,
			showOn: 'button',
			buttonImage: '',
			buttonImageOnly: true,
			format:'Y-m-d H:i',
			lang:'ru'
		});
	</script> --}}
@stop

	
