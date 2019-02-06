@extends ('backend.layouts.app')

@section ('title', '| ')

@section ('stylesheets')
	{{ Html::style('css/admin.css') }}
@stop 

@section('sectionSidebar')
	@include('backend.articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.articles.index') }}">Articles</a></li>
	<li class="active"><span>Import Article</span></li>
@stop

@section('content')
	<form action="{{ URL::to('backend/articles/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9">
				<div class="panel panel-primary">
					<div class='panel-heading'>
						<h3 class="panel-title">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							Import Articles
						</h3>
					</div>
					<div class="panel-body">
						{!! Form::token() !!}
						<input type="file" name="import_file" class="btn"/>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-3">
				@include('backend.articles.import.controls')
			</div>
		</div>
	</form>
@stop

@section ('scripts')
	{!! Html::script('js/bootstrap.file-input.js') !!}

	<script type="text/javascript">
		$('input[type=file]').bootstrapFileInput();
		$('.file-inputs').bootstrapFileInput();
	</script>
@stop