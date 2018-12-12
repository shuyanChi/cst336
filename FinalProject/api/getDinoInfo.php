<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("Jurassic_Base");
  
    //$sql ="SEL CT * FROM pets WHERE 1";
    //$sql = "SELECT * FROM Dinosaurs WHERE Id = ".$_GET['dino_id'];
    //Array ( [Id] => 1 [Taxonomy] => Saurischia [Image] => img/herrerasaurus.jpg [Name] => Herrerasauridae [description] => Herrerasaurids are dinosaurs appearing at around 223.23 million years ago (Late Triassic).These dinosaurs became extinct by the end of the Triassic period. Herrerasaurids were small-sized (normally not more than 4 metres (13 ft) long) carnivorous basal saurischians. )
    
    $Chicken = $_GET["c-breed"];
    echo $Chicken;
    $sql = "SELECT Image FROM Dinosaurs";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<hr />";
    //echo array_values($records);
    function printDino() {
        global $records;
        $randNumb = rand(0, 4);
        echo $randNumb;
        $new_m = array();
        foreach ($records as $dino) {
          echo $dino['Image'][$randNumb]. " ";
        }
    }
    echo printDino();
   
    echo "<hr />";
    //echo json_encode($record);
?>
