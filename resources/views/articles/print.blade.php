@extends ('common.layouts.print')

@section ('title', 'Print article')

@section ('stylesheets')
	{{ Html::style('css/print.css') }}
@stop

{{-- @section('sectionSidebar')
	@include('articles.frontend.sidebar')
@stop --}}

{{-- @section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Articles</span></li>
@stop --}}

@section ('content')
	<br />
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">ARTICLE</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">Title</div>
						<div class="panel-body">{{ ucwords($article->title) }}</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">Category</div>
						<div class="panel-body">{!! $article->category->name !!}</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">Description (En)</div>
						<div class="panel-body">
							@if($article->description_eng)
								{!! $article->description_eng !!}
							@else
								N/A
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">Description (Fr)</div>
						<div class="panel-body">
							@if($article->description_fre)
								{!! $article->description_fre !!}
							@else
								N/A
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			From the articles list at TheWoodBarn.ca
		</div>
	</div>
@stop
