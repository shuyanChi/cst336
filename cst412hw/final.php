<?php
    for($i=1; $i < 40; $i += 2) {
        echo $i . " ";
    }
    $bestTeam = true;
    echo($bestTeam)? "Go 49ers!" : "Go Panthers!";
    
    $letters = array("A","B","C","D","E","F");
    $randLetter = rand(1,5);
    echo $randLetter;
?>