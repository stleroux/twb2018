{{-- Back button --}}
<a class="btn btn-info" href="{{ URL::previous() }}">back</a>

{{-- Limit length of string being displayed --}}
{{ str_limit($article->title, $limit = 40, $end = '...') }}

{{-- Duplicate a row in the database --}}
$task = Task::find($id);
	$newTask = $task->replicate();
$newTask->save();

{{-- display date only - no time stamp --}}
{{ date('M d, Y', strtotime($article->created_at)) }}

{{-- Display date based on user's preferences --}}
@include('partials._dateFormat', ['model'=>$recipe, 'field'=>'created_at'])

{{-- Display author column based on user's preferences --}}
@include('partials._author', ['model'=>$recipe, 'field'=>'user'])

<input type="number" step="5" min="5" max="100" value="{{ $user->rowsPerPage }}" class = "form-control" />

{{--  Only show this button if coming from the search results page --}}
@if (false !== stripos($_SERVER['HTTP_REFERER'], "/search/recipes"))
	<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
		<div class="text text-left">
			<i class="fa fa-arrow-left" aria-hidden="true"></i>	Back to Search Results
		</div>
	</a>
@endif

<a href="{{ url()->previous() }}" class="btn btn-default btn-block">Cancel</a>

<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default">
	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>

{{ Form::submit ('Create Recipe', array('class' => 'btn btn-success btn-block')) }}

{!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default btn-block']) !!}

{{Form::button('<div class="text text-left"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Recipe</div>', array('type' => 'submit', 'class' => 'btn btn-success btn-block'))}}

<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
	<div class="text text-left">
		<i class="fa fa-ban" aria-hidden="true"></i> Cancel
	</div>
</a>

<div class="{{ $errors->has('title') ? 'has-error' : '' }}" >
	{{ Form::text ('title', null, array('class' => 'form-control', 'autofocus'=>'autofocus')) }}
	<span class="text-danger">{{ $errors->first('title') }}</span>
</div>

<!-- Make dropdown menu open on hover -->
 <li class="dropdown">


 {!! str_limit($product->description, $limit = 40, $end = '...') !!}