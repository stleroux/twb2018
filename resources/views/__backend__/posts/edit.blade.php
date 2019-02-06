@extends ('layouts.main')

@section ('title', 'Edit Post')

@section ('stylesheets')
  {{ Html::style('css/styles.css') }}
  {!! Html::style('css/select2.min.css') !!}
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li><a href="{{ route('posts.index') }}">Posts</a></li>
  <li class="active">Edit Post</li>
@stop
            

@section('menubar')
  {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
    @if($post->image)
      <a href="{{ route('posts.deleteImage', $post->id) }}" class="btn btn-danger btn-xs">Delete Image</a>
    @endif
    @include('layouts.buttons.cancel', ['name'=>'posts'])
    @include('layouts.buttons.update', ['name'=>'posts'])
@stop

@section ('content')
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          @include('layouts.commonErrorPanelHeaderFooter')
          Edit Post
        </div>
        <div class="panel-body">
          {{-- @include('layouts.displayErrorsWarning') --}}
            <div class="row">
              <div class="col-md-8">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  {{ Form::label ('title', 'Title', ['class'=>'required']) }}
                  {{ Form::text ('title', null, ['class' => 'form-control']) }}
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                  {{ Form::label('category', 'Category', ['class'=>'required']) }}
                  {{ Form::select('category_id', $categories, null, ['class'=>'form-control form-control-lg']) }}
                  <span class="text-danger">{{ $errors->first('category') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                  {{ Form::label ('slug', 'Slug', ['class'=>'required']) }}
                  {{ Form::text ('slug', null, ['class' => 'form-control']) }}
                  <span class="text-danger">{{ $errors->first('slug') }}</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  {{ Form::label('image','Update Image') }}
                  {{ Form::file('image', ['class'=>'form-control']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  {{ Form::label('tag', 'Tags') }}
                  {{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=>'multiple']) }}
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                  {{ Form::label ('body', 'Body', ['class' => 'required']) }}
                  {{ Form::textarea ('body', null, ['class' => 'form-control wysiwyg', 'id'=>'wysiwyg']) }}
                  <span class="text-danger">{{ $errors->first('body') }}</span>
                </div>
              </div>
            </div>
        </div>
        @include('layouts.create_edit_panel_footer')
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Details / Options</div>
        <div class="panel-body">
          @if ($post->image)
            <dl class='dl-horizontal'>
              <dt>Image</dt>
              <dd>{{ Html::image("images/posts/" . $post->image, "",array('height'=>'75','width'=>'125')) }}</dd>
            </dl>
          @endif

          <dl class='dl-horizontal'>
            <dt>Created By:</dt>
            <dd>@include('layouts.author', ['model'=>$post, 'field'=>'user'])</dd>
          </dl>
        
          <dl class='dl-horizontal'>
            <dt>Created At:</dt>
            <dd>@include('layouts.dateFormat', ['model'=>$post, 'field'=>'updated_at'])</dd>
          </dl>
        
          <dl class='dl-horizontal'>
            <dt>Last Updated By:</dt>
            <dd>@include('layouts.author', ['model'=>$post, 'field'=>'modified_by'])</dd>
          </dl>
        
          <dl class='dl-horizontal'>
            <dt>Last Updated:</dt>
            <dd>@include('layouts.dateFormat', ['model'=>$post, 'field'=>'updated_at'])</dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}

@stop

@section ('scripts')
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
$('.select2-multi').select2();
// set the values
$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
</script>
@stop