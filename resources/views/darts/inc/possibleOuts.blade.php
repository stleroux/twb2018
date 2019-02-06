<?php
      // $score = $_GET['score'];
      // $score = $remainingScore;
      // $finaldart = $_GET['out'] * 2;
      $finaldart = 10 * 2;

      if ($score > 170 || $score <= 1 ) {
         echo '<div class="panel panel-default">
               <div class="panel-heading">
                  <div class="panel-title">No Outs Possible</div>
               </div></div>
               ';
      } else {
         for ($firstdart=60; $firstdart >= 0; $firstdart--) {
            if (
               $firstdart <= 20 || 
               $firstdart == 50 || 
               $firstdart == 25 || 
               ($firstdart % 3 == 0) || 
               ($firstdart <= 40 && $firstdart % 2 == 0)
            ) {
               /*
               if it is less than 20 or equal to, because 20 - 1 on board, 
               if it is less than or equal to 40 and divisible by 2 because it could be a double
               if it is divisible by 3 because it could be a triple
               if it is a double or single bull, no point in checking the double for 60-51 
               */
               for ($seconddart=60; $seconddart >= 0; $seconddart--) {
                  if (
                     $seconddart <= 20 || 
                     $seconddart == 50 || 
                     $seconddart == 25 || 
                     ($seconddart % 3 == 0) || 
                     ($seconddart <= 40 && $seconddart % 2 == 0)
                     ) {
                     for ($thirddart=50; $thirddart > 0; $thirddart = $thirddart - 2) {
                        if ($thirddart == 48) {
                           $thirddart = 40;
                        }
                        $outstring = 'Double ' . ($thirddart / 2);
                        if (($thirddart + $seconddart + $firstdart) == $score && (@!in_array($seconddart . ', ' . $firstdart . ', ' . $outstring . "<br />\n", $pouts) && @!in_array($seconddart . ', ' . $firstdart . ', ' . $outstring . "<br />\n", $everyotherout))) {
                           if ($thirddart == $finaldart) {
                              $pouts[] = $firstdart . ', ' . $seconddart . ', ' . $outstring . "<br />\n";
                           } else {
                              $everyotherout[] = $firstdart . ', ' . $seconddart . ', ' . $outstring . "<br />\n";
                           }
                        }
                     }
                  }
               }
            }
         }
      }

//      if(!empty($finaldart)) {
//         if(!empty($pouts)){
//            echo '<b>Preferred Outs</b>' . "<br />\n";
//            foreach($pouts as $out) {
//               echo $out;
//            }
//            echo "<br />\n" . '<b>Every Other Out</b>' . "<br />\n";
//         } else { 
//            echo 'No preferred outs avaliable.' . "<br /><br />\n";
//         }
//      }


      if(!empty($finaldart)) {
         if(!empty($pouts)){
            echo '
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="panel-title">Preferred Outs</div>
                  </div>
                  <table class="table table-hover">
            ';
            foreach($pouts as $out) {
               echo '<tr><td>'.$out.'</td></tr>';
            }
            echo '</table></div>';
            
         } else { 
            echo '<div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="panel-title">No Preferred Outs Available</div>
                  </div></div>
                  ';
         }
      }

      if(!empty($everyotherout)) {
         echo '<div class="panel panel-default">
               <div class="panel-heading">
                  <div class="panel-title">Every Other Out</div>
               </div>
               <table class="table table-hover">';
                  foreach($everyotherout as $out) {
                     echo '<tr><td>'.$out.'</td></tr>';
                  }
      } else if(empty($pouts)){
         echo '<div class="panel panel-default">
               <div class="panel-heading">
                  <div class="panel-title">Every Other Out</div>
               </div>
               <table class="table table-hover">';
         echo '<tr><td>No outs available.</td></tr>';
      }
      echo '</table></div>';
   