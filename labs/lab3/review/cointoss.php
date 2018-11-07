<?php
    session_start();
   //session_destroy();
    if(!isset($_SESSION["head"])){
        $_SESSION["head"] = 0;
        $_SESSION["tail"] = 0;
        $_SESSION["tossHistory"] = array();
    }
    $value = rand(0, 1);
    if($value == 0) {
        $_SESSION["head"]++;
        $_SESSION["tossHistory"][] = "H";
        
    }
    else {
        $_SESSION["tail"]++;
        $_SESSION["tossHistory"][] = "T";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Coin Flippling</title>
    </head>
    <body>
  
     <h2>Heads:<?php echo $_SESSION["head"]?></h2>
     <h2>Tails:<?php echo $_SESSION["tail"]?></h2>
     <h2>History: <?php 
     for($i = 0; $i < count($_SESSION["tossHistory"]); ++$i) {
        echo $_SESSION["tossHistory"][$i] . " ";
     }
     ?></h2>
    </body>
</html>