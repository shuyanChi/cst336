<?php
    session_start();
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("Jurassic_Base");
    include '../api/functions.php';
    validateSession();
    if (isset($_GET['Id'])) {
    
      $chickenInfo = getchickenInfo($_GET['Id']);
      //print_r($productInfo);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Chicken Info </title>
    </head>
    <body>
    
    <h3><?=$chickenInfo['Breed']?></h3>
     <?=$chickenInfo['Nature']?><br>
    <img src='<?="../".$chickenInfo['Image']?>' height = 155px />
 
    </body>
</html>
