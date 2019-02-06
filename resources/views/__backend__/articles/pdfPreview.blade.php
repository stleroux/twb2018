@extends('backend.layouts.app')

{{-- <style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style> --}}
@section('breadcrumb')
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="{{ route('backend.articles.index') }}">Articles</a></li>
    <li class="active"><span>PDF Preview</span></li>
@stop

@section('sectionSidebar')
  @include('backend.articles.sidebar')
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><strong>Articles Details</strong></h3>
		</div>

		<table class="table table-condensed">
			<tbody>
				@foreach ($articles as $key => $article)
					<tr>
						<td width="15%" class="active">No</td>
						<td>
							{{-- {{ ++$key }} --}}
							{{ $article->id }}
						</td>
					</tr>
					<tr>
						<td class="active">Title</td>
						<td>{!! $article->title !!}</td>
					</tr>
					<tr>
						<td class="active">Description (En)</td>
						<td>{!! $article->description_eng !!}</td>
					</tr>
					<tr>
						<td class="active">Description (Fr)</td>
						<td>{!! $article->description_fre !!}</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>

@stop