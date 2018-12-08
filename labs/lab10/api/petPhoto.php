<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

$sqlPho = "SELECT pictureURL FROM `pets` WHERE 1";
$stmt2 = $dbConn->prepare($sqlPho);
$stmt2->execute();
$petPho = $stmt2->fetchAll(PDO::FETCH_ASSOC); //we're expecting just one record
$length = count($petPho);
function printPhotoSlide () {
    echo "<li data-target='#carouselExampleIndicators' data-slide-to=' ".$i." '  class='active' >"."</li>";
    for($i = 1; $i < ($Length - 1); ++$i) {
        echo "<li data-target='#carouselExampleIndicators' data-slide-to=' ".$i." ' >"."</li>";
    }
      //echo "<img  id = 'reel$pos' src = 'img/$symbols.png' alt = '$symbols' title =' ".ucfirst($symbols)." ' width = '70'/>";
}

?>