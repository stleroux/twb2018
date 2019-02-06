@extends ('layouts.backend')

@section ('title', 'Print article')

@section ('stylesheets')
@stop

@section ('content')
	<div class="panel panel-default">
		<div class="panel-heading">{{ ucwords($article->title) }}</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12">
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
