@extends('layouts.admin.main')

@section ('title','| ')

@section ('stylesheets')
  {{ Html::style('css/admin.css') }}
@stop

@section('breadcrumb')
  <li><a href="/">Home</a></li>
  <li><a href="/admin">Control Panel</a></li>
  <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
  <li>Delete Comment</li>
@stop

@section('page_top_menu')

  <div class="row">
    <div class="col-md-12">
      <div class="well well-sm clearfix">
        <div class="pull-right">
          {{--================================================================================================================================--}}
          {{-- CANCEL BUTTON                                                                                                                  --}}
          {{--================================================================================================================================--}}
          <a href="{{ route('admin.posts.show', $comment->post->id) }}" class="btn btn-default btn-xs">
            <div class="text text-left">
              @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="fa fa-ban" aria-hidden="true"></i> Cancel
              @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="fa fa-ban" aria-hidden="true"></i>
              @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}Cancel
              @endif
            </div>
          </a>
          {{--================================================================================================================================--}}
          {{-- END CANCEL BUTTON                                                                                                              --}}
          {{--================================================================================================================================--}}

          {{--================================================================================================================================--}}
          {{-- DELETE BUTTON                                                                                                                  --}}
          {{--================================================================================================================================--}}
          @ability('admin', 'admin,posts_delete,posts_delete_admin')
            <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" accept-charset="UTF-8" style="display:inline">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button
                class="btn btn-xs btn-danger"
                {{ Auth::user()->actionButtons == 2 ? 'title=Delete Comment' : '' }}
                type="button"
                data-toggle="modal"
                data-id="{{ $comment->id }}"
                data-target="#confirmDelete"
                data-title="Delete Comment"
                data-message="Are you sure you want to delete this comment?">
                  @if(Auth::user()->actionButtons == 1) {{-- Icons and Text --}}<i class="glyphicon glyphicon-trash"></i> Delete Comment
                  @elseif(Auth::user()->actionButtons == 2) {{-- Icons Only --}}<i class="glyphicon glyphicon-trash"></i>
                  @elseif(Auth::user()->actionButtons == 3) {{-- Text Only --}}Delete Comment
                  @endif
              </button>
            </form>
          @endability
          {{--================================================================================================================================--}}
          {{-- END DELETE BUTTON                                                                                                              --}}
          {{--================================================================================================================================--}}
        </div>
      </div>
    </div>
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading">Delete comment?</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-2">Name:</div>
            <div class="col-md-10">{{ $comment->name }}</div>
          </div>
          <div class="row">
            <div class="col-md-2">Email:</div>
            <div class="col-md-10">{{ $comment->email }}</div>
          </div>
          <div class="row">
            <div class="col-md-2">Comment:</div>
            <div class="col-md-10">{{ $comment->comment }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section ('scripts')
@stop
