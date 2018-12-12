<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("Jurassic_Base");

$sql = "SELECT * FROM Dinosaurs WHERE Id = " . $_GET['petid'];
//SELECT * FROM Dinosaurs WHERE id= 3;
$stmt = $dbConn->prepare($sql);
$stmt -> execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($records);

?>