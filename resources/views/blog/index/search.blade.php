<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
         <i class="fa fa-search" aria-hidden="true"></i>
         Search Blog Entries
      </h3>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'blog.search', 'method'=> 'GET']) !!}
			{{ Form::text('search', null, ['class' => 'form-control', 'style="margin-bottom:5px"']) }}
			{{ Form::button('<i class="fa fa-search" aria-hidden="true"></i> Search', array('type' => 'submit', 'class' => 'btn btn-default btn-block')) }}
		{!! Form::close() !!}
	</div>
</div>