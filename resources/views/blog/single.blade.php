@extends('layouts.app')

<?php
	$titleTag = htmlspecialchars($post->title);
	$titleTag = '| ' . $titleTag;
?>

@section('title', "$titleTag")

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('blog.index') }}">Blog</a></li>
	<li class="active"><span>View Blog</span></li>
@stop

@section('content')
	
	<div class="row">
		@include('blog.single.title')
		@include('blog.single.category')
	</div>
	
	<div class="row">
		@include('blog.single.main')
	</div>
	
	<div class="row">
		@include('common.view_more', ['message'=>'If you would like to see the complete post'])
	</div>

	@include('blog.single.comments')

	@include('modals.image', [
		'title'=>'Post Image',
		'img_path'=>'_posts',
		'img_name'=>'image',
		'model'=>$post
		])
	@include('modals.print', [
		'title'=>'Print',
		'name'=>'blog',
		'model'=>$post
		])

@stop

@section('blocks')
	@include('blog.single.controls')
	@include('blog.single.image')
	{{-- @include('blog.single.information') --}}
	@include('common.information', ['model'=>$post, 'title'=>'Blog Post'])
	@include('blog.blocks.archives')
	@include('blog.single.leaveComment')
@stop






@section ('scripts')
@stop