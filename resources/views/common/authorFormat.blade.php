{{-- Requires Model name --}}


@if (Auth::check())

	@if (Auth::user()->profile->author_format == 1)
		@if($field == 'user')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->user->username }}</a>
		@elseif($field == 'modifiedBy')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->modifiedBy->username }}</a>
		@elseif($field == 'lastViewedBy')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->lastViewedBy->username }}</a>
		@endif
	@elseif (Auth::user()->profile->author_format == 2)
		@if($field == 'user')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->user->profile->last_name }}, {{ $model->user->profile->first_name }}</a>
		@elseif($field == 'modifiedBy')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->modifiedBy->profile->last_name }}, {{ $model->user->profile->first_name }}</a>
		@elseif($field == 'lastViewedBy')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->lastViewedBy->username }}profile->last_name }}, {{ $model->user->profile->first_name }}</a>
		@endif
		{{-- <a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->user->profile->last_name }}, {{ $model->user->profile->first_name }}</a> --}}
	@elseif (Auth::user()->profile->author_format == 3)
		@if($field == 'user')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->user->profile->first_name }} {{ $model->user->profile->last_name }}</a>
		@elseif($field == 'modifiedBy')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->modifiedBy->profile->first_name }} {{ $model->user->profile->last_name }}</a>
		@elseif($field == 'lastViewedBy')
			<a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->lastViewedBy->profile->first_name }} {{ $model->user->profile->last_name }}</a>
		@endif
		{{-- <a href="" data-toggle="modal" data-target="#view{{ $field }}Modal{{ $model->id }}">{{ $model->user->profile->first_name }} {{ $model->user->profile->last_name }}</a> --}}
	@endif

	@include('modals.author')

@else
	{{-- Username --}}
	@if($field == 'user')
		{{ $model->user->username }}
	@elseif($field == 'modifiedBy')
		{{ $model->modifiedBy->username }}
	@elseif($field == 'lastViewedBy')
		{{ $model->lastViewedBy->username }}
	@endif

	
@endif

