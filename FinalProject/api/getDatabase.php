<?php

include '../inc/dbConnection.php';
$dbConn = startConnection("Jurassic_Base");
$records;
function get_AllDinosaurs() {
    global $dbConn;
    global $records;
    //$sql ="SELECT * FROM pets WHERE 1";
    $sql ="SELECT Name, Taxonomy, Id FROM Dinosaurs ORDER BY name ASC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $records;
}

?>