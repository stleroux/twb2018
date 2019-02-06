@extends('layouts.app')

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

   {{-- @include('darts.inc.scoreboard') --}}
   {{-- @include('darts.inc.pad') --}}

   <div class="row">
      <div class="col-sm-12">
         @include('darts.scores.01.team_1._scorePanel')
      </div>

      <div class="col-sm-2">
         @include('darts.scores.01.panels.gameInfo')
         @include('darts.scores.01.panels.messages')
      </div>

      <div class="col-sm-4">
         @include('darts.scores.01.team_2.scorePanel')
      </div>
   </div>

   <div class="row">
      <div class="col-sm-4">
         @include('darts.scores.01.team_1.scoresheet')
         @include('darts.scores.01.team_1.possibleOuts')
      </div>

      <div class="col-sm-4">
         @include('darts.scores.01.stats.game')
         @include('darts.scores.01.stats.player')
      </div>

      <div class="col-sm-4">
         @include('darts.scores.01.team_2.scoresheet')
         @include('darts.scores.01.team_2.possibleOuts')
      </div>
   </div>

@endsection

@section('scripts')

   <script>
      $(document).ready(function() {
         $('.d1add').click(function() {
            $('#d1total').text(parseInt($('#d1total').text()) + parseInt($(this).data('amount')));
         });
         $('.d1reset').click(function() {
            $('#d1total').text(parseInt($(this).data('amount')));
         });
         $('.d2add').click(function() {
            $('#d2total').text(parseInt($('#d2total').text()) + parseInt($(this).data('amount')));
         });
         $('.d2reset').click(function() {
            $('#d2total').text(parseInt($(this).data('amount')));
         });
         $('.d3add').click(function() {
            $('#d3total').text(parseInt($('#d3total').text()) + parseInt($(this).data('amount')));
         });
         $('.d3reset').click(function() {
            $('#d3total').text(parseInt($(this).data('amount')));
         });

         $(function() {
            $("#d1total, #d2total").on("change", sum);
            function sum() {
               $("#sum").val(Number($("#d1total").val()) + Number($("#d2total").val()));
               // $("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
            }
         });
      });
   </script>

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
      $(document).ready(function () {
         window.setTimeout(function() {
            $(".alert").fadeTo(1500, 0).slideUp(1500, function(){
               $(this).remove(); 
            });
         }, 7000);
      });
   </script>
@endsection