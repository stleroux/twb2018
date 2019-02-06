@extends('darts.layouts.app')

@section('content')

   {!! Form::open(array('route'=>'darts.games.store'), ['class'=>'form-inline']) !!}
      {{ Form::token() }}

      <div class="panel panel-primary">
         
         <div class="panel-heading">
            <div class="panel-title">
               Create New Game - Step 1
            </div>
         </div>
         
         <div class="panel-body">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <div class="panel-title required">Select Game Type</div>
               </div>
               <div class="panel-body">
                  <div class="col-md-3">
                     <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                        {{-- {{ Form::label ('type', 'Game Type', ['class'=>'required']) }} --}}
                        {{ Form::select('type', ['301'=>'301', '501'=>'501', '701'=>'701', '1001'=>'1001', 'cricket'=>'Cricket'], null, ['placeholder'=>'Pick one...', 'class'=>'form-control']) }}
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                     </div>
                  </div>
               </div>
               <div class="panel-footer">
                  Fields marked with an<span class="required"></span> are required.
                  <span class="pull-right">
                     {{ Form::submit ('Next Step', array('class'=>'btn btn-xs btn-default')) }}
                  </span>
               </div>
            </div>
         </div>

      </div>
   {!! Form::close() !!}
@endsection
