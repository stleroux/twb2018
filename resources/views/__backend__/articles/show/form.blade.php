<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-file-text-o" aria-hidden="true"></i>
			Article Details
		</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<div class="form-group">
					{!! Form::label('title', 'Title') !!}
					{{-- {!! Form::text('title', $article->title, ['class'=>'form-control', 'readonly']) !!} --}}
					<div class="well well-sm">
						{{ $article->title }}
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div class="form-group">
					{{ Form::label('category_id', 'Category') }}
					{{-- {{ Form::text('category_id', $article->category->name, ['class'=>'form-control', 'readonly']) }} --}}
					<div class="well well-sm">
						{{ $article->category->name }}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::label('description_eng', 'Description (En)') !!}
				<div class="well">{!! $article->description_eng !!}</div>
			</div>
		</div>  

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::label('description_fre', 'Description (Fr)') !!}
				<div class="well">{!! $article->description_fre !!}</div>
			</div>
		</div>
	</div>
</div>