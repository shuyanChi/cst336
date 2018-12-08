<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("tp_flowers");
include '../inc/functions.php';
validateSession();

$sql = "DELETE FROM `Assets` WHERE ID = '" . $_GET['ID']."'";
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: adminPage.php");

?>
