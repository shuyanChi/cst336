<?php
     function displaySymbol($randomValue, $pos) {
       /* if($randomValue == 0) {
            echo "<img src = 'img/seven.png' alt ='Seven' title ='Seven' width = '70'/>";
        }
        else if($randomValue == 1) {
            echo "<img src = 'img/cherry.png' alt = 'cherry' title = 'Cherry' width='70'/>";
        }
        else {
            echo "<img src = 'img/lemon.png' alt = 'lemon' title = 'lemon' width = '70'/>";
        }*/
        switch($randomValue) {
            /*case 0:
                echo "<img src = 'img/seven.png' alt = 'seven' title = 'seven' width = '70' />";
                break;
            case 1:
                echo "<img src = 'img/cherry.png' alt = 'cherry' title = 'cherry' width = '70'/>";
                break;
            case 2:
                
                echo "<img src = 'img/lemon.png' alt = 'lemon' title = 'lemon' width = '70'/>";
                break;*/
            case 0:
                $symbols = "seven";
                break;
            case 1:
                $symbols = "cherry";
                break;
            case 2:
                $symbols = "lemon";
                break;
            case 3:
                $symbols = "grapes";
                break;
        }//switch
         echo "<img  id = 'reel$pos' src = 'img/$symbols.png' alt = '$symbols' title =' ".ucfirst($symbols)." ' width = '70'/>";
    }//displaySymbols
            
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        echo "<div id = 'output'>";
        if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
           switch($randomValue1) {
               case 0: $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
               case 1:  $totalPoints = 500;
                    break;
               case 2: $totalPoints = 250;
                    break;
               case 3: $totalPoints = 900;
           } //switch
           echo "<h2>You won $totalPoints points!</h2>";
        } //if
        else {
            echo "<h3>Try Again!</h3>";
        }
        echo "</div>";
    }
    //$start = microtime(true); 
      function play() {
            //$_SESSION['totalGames']++;
            for($i = 1; $i < 4; ++$i) {
                ${"randomValue" . $i}= rand(0, 3);
                displaySymbol(${"randomValue" . $i}, $i);
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
            //$SESSION['count']++;//need this line for the timeElapsed.php to work;
        } 
        //displayElapsedTime();
?>

