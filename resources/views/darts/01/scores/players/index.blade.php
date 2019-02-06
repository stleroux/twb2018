@extends('darts.layouts.app')

@section('stylesheets')
   <style>
      .hover { background-color: grey; }
      .thead tr th { color: yellow; }

      /*tr.rowcolSelected{ background-color: #222222; }*/
      td.rowcolSelected:hover{
         background-color: red;
         color: black;
         font-weight: bold;
      }
   </style>
@endsection

@section('content')

   <div class="row">
      <div class="col-xs-12">
         <div class="panel panel-primary">
            <div class="panel-heading">
               <div class="panel-title">
                  Single Player Game
                  <span class="pull-right">Game Type : {{ $game->type }}</span>
               </div>
            </div>
            
         </div>
      </div>
   </div>
   
   <div class="row">
      <div class="col-sm-4">
         @include('darts.01.scores.players.scorePanel')
      </div>

      <div class="col-sm-4">
         @include('darts.01.scores.players.gameInfo')
      </div>

      <div class="col-sm-4">
         @include('darts.01.scores.players.playerStats')
      </div>
   </div>

   <div class="row">
      <div class="col-sm-12">
         <div class="panel-group">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <div class="panel-title">Scoresheets</div>
               </div>
               <div class="panel-body">
                  @foreach(zeroOnePlayers($game) as $player)
                     @include('darts.01.scores.players.scoresheet', [$player])
                  @endforeach
               </div>
               <div class="panel-footer">
                  Footer
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection

@section('scripts')
   <script>
      $("#tbl").delegate('td','mouseover mouseleave', function(e) {
         if (e.type == 'mouseover') {
            $(this).parent().addClass("hover");
            $("colgroup").eq($(this).index()).addClass("hover");
         } else {
            $(this).parent().removeClass("hover");
            $("colgroup").eq($(this).index()).removeClass("hover");
         }
      });
   </script>

   <script type="text/javascript">
      // $(document).ready(function () {
      //    window.setTimeout(function() {
      //       $(".alert").fadeTo(1500, 0).slideUp(1500, function(){
      //          $(this).remove(); 
      //       });
      //    }, 7000);
      // });


      $(document).ready(function(){
         $('#display-success').fadeIn().delay(4000).fadeOut();
         $('#display-error').fadeIn().delay(8000).fadeOut();
         $('#display-danger').fadeIn().delay(8000).fadeOut();
      });

   </script>
@endsection