<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("Jurassic_Base");
  
    //$sql ="SEL CT * FROM pets WHERE 1";
    //$sql = "SELECT * FROM Dinosaurs WHERE Id = ".$_GET['dino_id'];
    $sql = "SELECT * FROM Dinosaurs WHERE id = ".$_GET['dino_id'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    echo json_encode($record);
?>
