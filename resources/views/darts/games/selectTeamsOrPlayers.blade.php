@extends('darts.layouts.app')

@section('content')

      <div class="panel panel-primary">
         
         <div class="panel-heading">
            <div class="panel-title">
               Create New Game - Step 2
            </div>
         </div>
         
         <div class="panel-body">
            <div class="row">
               {!! Form::open(array('route'=>'darts.games.storeTeamsOrPlayers'), ['class'=>'form-inline']) !!}
               {{ Form::token() }}
               {{ Form::hidden('game_id', $game->id) }}
            
               <div class="col-md-5">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <div class="panel-title">N<sup>o</sup> Of Player(s) Per Team</div>
                     </div>
                     <div class="panel-body">
                        <div class="col-md-12">
                           <div class="form-group {{ $errors->has('t_players') ? 'has-error' : '' }}">
                              {{-- {{ Form::label ('t_players', 'No Of Players Per Team', ['class'=>'required']) }} --}}
                              {{ Form::select('t_players', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'], null, ['placeholder'=>'Select...', 'class'=>'form-control']) }}
                              <span class="text-danger">{{ $errors->first('t_players') }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="panel-footer">
                        &nbsp;
                        <span class="pull-right">
                           {{ Form::submit ('Next Step', array('class'=>'btn btn-xs btn-default')) }}
                        </span>
                     </div>
                  </div>
               </div>
               {{ Form::close() }}

               <div class="col-md-2">
                  <br />
                  <div class="panel panel-primary">
                     <div class="panel-body">
                        <div class="text text-center"><h1>OR</h1></div>
                     </div>
                  </div>
               </div>

               <div class="col-md-5">
                  {!! Form::open(array('route'=>'darts.games.storeTeamsOrPlayers'), ['class'=>'form-inline']) !!}
                  {{ Form::token() }}
                  {{ Form::hidden('game_id', $game->id) }}
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <div class="panel-title">N<sup>o</sup> Of Individual Player(s)</div>
                     </div>
                     <div class="panel-body">
                        <div class="col-md-12">
                           <div class="form-group {{ $errors->has('ind_players') ? 'has-error' : '' }}">
                              {{-- {{ Form::label ('ind_players', 'No of Players', ['class'=>'required']) }} --}}
                              {{ Form::select('ind_players', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'], null, ['placeholder'=>'Select...', 'class'=>'form-control']) }}
                              <span class="text-danger">{{ $errors->first('ind_players') }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="panel-footer">
                        &nbsp;
                        <span class="pull-right">
                           {{ Form::submit ('Next Step', array('class'=>'btn btn-xs btn-default')) }}
                        </span>
                     </div>
                  </div>
                  {{ Form::close() }}
               </div>
            </div>
      </div>
@endsection