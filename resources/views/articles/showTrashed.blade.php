@extends('layouts.app')

@section ('title','View Article')

@section ('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>View Article</span></li>
@stop

@section('content')

	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title"><strong>Article Details</strong></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8">
					<div class="form-group">
						{!! Form::label('title', 'Title') !!}
						{{-- {!! Form::text('title', $article->title, ['class'=>'form-control', 'readonly']) !!} --}}
						<div class="well well-sm">{!! $article->title !!}</div>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						{{ Form::label('category_id', 'Category', ['class'=>'required']) }}
						{{-- {{ Form::text('category_id', $article->category->name, ['class'=>'form-control', 'readonly']) }} --}}
						<div class="well well-sm">{{ $article->category->name}}</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{!! Form::label('description_eng', 'Description (En)', ['class'=>'required']) !!}
					<div class="well">{!! $article->description_eng !!}</div>
					{{-- {{ Form::textarea('decription_eng', $article->description_eng, ['class'=>'form-control', 'readonly']) }} --}}
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

	@include('articles.modals.delete')
	@include('articles.modals.publish')
	@include('articles.modals.restore')
@stop

@section('blocks')
	@include('articles.showTrashed.controls')
	@include('articles.trashed.help')
@endsection

@section ('scripts')
	@include('scripts.modals.delete')
	@include('scripts.modals.publish')
	@include('scripts.modals.restore')
@stop