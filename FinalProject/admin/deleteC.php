<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("Jurassic_Base");
include '../api/functions.php';
validateSession();

$sql = "DELETE FROM `Chickens` WHERE ID = '" . $_GET['Id']."'";
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: adminPage.php");

?>
