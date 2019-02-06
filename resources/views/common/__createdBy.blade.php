{{-- Requires Model name --}}

@if (Auth::check())
   
   @if (Auth::user()->profile->author_format == 1)
   {{-- @if (Session::get('authorFormat') == 1) --}}
      {{-- Username --}}
      {{-- <a href="{{ route('profile.showUser', $model->$field) }}">{{ $model->$field->username}}</a> --}}
      <a href="" data-toggle="modal" data-target="#viewCreatedByModal{{ $model->id }}">{{ $model->user->username }}</a>
      {{-- <a href="" data-toggle="modal" data-target="#viewCreatedByModal">{{ $article->user->username }}</a> --}}
      {{-- @include('frontend.modals.authorModal', ['model'=>$model]) --}}
   @elseif (Auth::user()->profile->author_format == 2)
   {{-- @elseif (Session::get('authorFormat') == 2) --}}
      {{-- Last Name, First Name --}}
      {{-- <a href="{{ route('profile.showUser', $model->$field) }}">{{ $model->$field->last_name }}, {{ $model->$field->first_name }}</a> --}}
      <a href="" data-toggle="modal" data-target="#viewCreatedByModal{{ $model->id }}">{{ $model->user->profile->last_name }}, {{ $model->user->profile->first_name }}</a>
      {{-- @include('frontend.modals.authorModal', ['model'=>$model]) --}}
   @elseif (Auth::user()->profile->author_format == 3)
   {{-- @elseif (Session::get('authorFormat') == 3) --}}
      {{-- First Name Last Name --}}
      {{-- <a href="{{ route('profile.showUser', $model->$field) }}">{{ $model->$field->first_name }} {{ $model->$field->last_name }}</a> --}}
      {{-- {{ $model->user->profile->last_name }} --}}
      <a href="" data-toggle="modal" data-target="#viewCreatedByModal{{ $model->id }}">{{ $model->user->profile->first_name }} {{ $model->user->profile->last_name }}</a>
      {{-- @include('frontend.modals.authorModal', ['model'=>$model]) --}}
   @endif

   @include('modals.createdBy', ['model'=>$model])

@else
   {{-- Username --}}
   {{ $model->user->username }}
@endif