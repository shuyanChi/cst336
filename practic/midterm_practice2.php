<?php
include '../inc/dbConnection.php';
$dbConn = startConnection("midterm");
$sql = "SELECT town_name, population FROM `mp_town` WHERE population >= 50000 and population <= 80000";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
print_r($record);
echo "<br />";
//Array ( [town_name] => Soledad [population] => 66163 ) 
echo $record['town_name']."-" . $record['population'];


$sql2 = "SELECT town_name, population FROM `mp_town` ORDER BY population DESC";
$stmt2 = $dbConn->prepare($sql2);
$stmt2->execute();
$record2 = $stmt2->fetchAll(PDO::FETCH_ASSOC); //all records
//print_r($record2);
echo "<br />";
/*oledad-66163Array ( [0] => Array ( [town_name] => Biola [population] => 1004614 ) 
[1] => Array ( [town_name] => Easton [population] => 186239 ) 
*/
echo "<table>";
foreach($record2 as $key => $value){
    echo "<tr>";
    echo "<td>";
    echo $record2[$key]["town_name"];
    echo "</td>";
    echo "<td>";
    echo $record2[$key]["population"];
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

$sql3 = "SELECT county_name FROM mp_county WHERE  county_name LIKE 'S%'";
$stmt3 = $dbConn->prepare($sql3);
$stmt3->execute();
$record3 = $stmt3->fetchAll(PDO::FETCH_ASSOC); 
print_r($record3);
echo "<br />";
/*Array ( [0] => Array ( [county_name] => Santa Cruz ) [1] => Array ( [county_name] => San Benito ) )*/
foreach($record3 as $k => $v) {
    echo $record3[$k]['county_name']. "<br />";
}

$sql4 = "SELECT town_name, population FROM mp_town ORDER BY population ASC LIMIT 3";
$stmt4 = $dbConn->prepare($sql4);
$stmt4->execute();
$record4 = $stmt4->fetchAll(PDO::FETCH_ASSOC); 
print_r($record4);
echo "<br />";
foreach($record4 as $y => $j) {
    echo $record4[$y]["town_name"] ." ". $record4[$y]["population"] . "<br />";
}

?>