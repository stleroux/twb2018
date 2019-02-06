@extends('backend.layouts.app')

@section ('title','| ')

@section ('stylesheets')
@stop

@section('sectionSidebar')
    @include('backend.comments.sidebar')
@stop

@section('breadcrumb')
  <li><a href="/dashboard">Dashboard</a></li>
  <li><a href="{{ route('backend.comments.index') }}">Comments</a></li>
  <li><span class="active">Edit Comment</span></li>
@stop

@section('content')
{!! Form::model($comment, ['route'=>['backend.comments.update', $comment->id], 'method' => 'PUT']) !!}

    <div class="panel text-right">
      <a class="btn btn-default" href="{{ route('backend.comments.index') }}">Cancel</a>
      {{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
    </div>

   <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Comment</div>
        <div class="panel-body">

          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}

          {{ Form::label('email', 'Email:') }}
          {{ Form::text('email', null, ['class' => 'form-control']) }}

          {{ Form::label('comment', 'Comment:') }}
          {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

        </div>
      </div>
    </div>
  </div>
{{ Form::close() }}
@stop

@section ('scripts')
@stop