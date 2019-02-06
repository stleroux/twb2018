@extends('layouts.app')

@section ('title','Create Post')

@section ('stylesheets')
  {{ Html::style('css/select2.min.css') }}
@stop

@section('sectionSidebar')
    @include('posts.sidebar')
@stop

@section('breadcrumb')
  <li>Home</li>
  <li><a href="{{ route('posts.index') }}">Posts</a></li>
  <li>Add Post</li>
@stop

@section('menubar')
  {!! Form::open(['route' => 'posts.store', 'files'=>'true']) !!}
    {{-- @include('layouts.buttons.cancel', ['name'=>'posts']) --}}
    {{-- @include('layouts.buttons.save', ['name'=>'posts']) --}}
@stop

@section('content')

    {{-- @include('layouts.partials.section_top', ['name'=>'Create Post', 'icon'=>'fa-newspaper-o']) --}}
          <div class="panel-body">
            
            <div class="row">
              <div class="col-md-8">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  {{ Form::label ('title', 'Title', ['class'=>'required'])}}
                  {{ Form::text ('title', null, array('class' => 'form-control', 'autofocus'=>'autofocus')) }}
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                  {{ Form::label('category_id', 'Category', ['class'=>'required']) }}
                  {{-- {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }} --}}
                  {{ Form::select('category_id', array(''=>'Select a category') + $categories, null, ['class'=>'form-control']) }}
                  <span class="text-danger">{{ $errors->first('category_id') }}</span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                  {{ Form::label ('slug', 'Slug', ['class'=>'required'])}}
                  {{ Form::text ('slug', null, array('class' => 'form-control')) }}
                  <span class="text-danger">{{ $errors->first('slug') }}</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                  {{ Form::label ('image', 'Upload image') }}
                  {{ Form::file('image', ['class'=>'form-control']) }}
                  <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group {{ $errors->has('tag') ? 'has-error' : '' }}">
                  {{ Form::label('tag_id', 'Tag') }}
                  <select class="form-control select2-multi" name="tags[]" multiple="multiple" style="width: 99%;">
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                  </select>

                   <span class="text-danger">{{ $errors->first('tag') }}</span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                  {{ Form::label ('body', 'Body', ['class'=>'required']) }}
                  {{ Form::textarea ('body', null, array('class' => 'form-control wysiwyg')) }}
                  <span class="text-danger">{{ $errors->first('body') }}</span>
                </div>
              </div>
            </div>
          </div>
    {{-- @include('layouts.create_edit_panel_footer') --}}
    {{-- @include('layouts.partials.section_close') --}}
  {!! Form::close() !!}

@stop

@section ('scripts')
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@stop
