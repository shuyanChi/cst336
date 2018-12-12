<?php
    include '../inc/dbConnection.php';
    $dbConn = startConnection("Jurassic_Base");
    
    function filterData() {
        global $dbConn;
        if(!empty($_GET['search-form'])) {
            $chickenBreed = $_GET['breed'];
            $eggProduction = $_GET['egg'];
            echo $eggProduction;
            $chickenColor = $_GET['color'];
            $np = array();
            $sql = "SELECT * FROM Chickens WHERE 1";
            //SELECT * FROM `Chickens` WHERE 1 And Breed LIKE '%Australorp%'
            if(!empty($chickenBreed)) {
                $sql .= " AND Breed LIKE :chickenB";
                $np[':chickenB'] = "%$chickenBreed%";
            }
            if(!empty($chickenColor)) {
                $sql .= " AND Color LIKE :chickenC";
                $np[':chickenC'] = "%$chickenColor%";
            }
            if(!empty($eggProduction)) {
                $sql .= " AND EggProduction LIKE :eggC";
                $np[':eggC'] = "%$eggProduction%";
            }
            if(isset($_GET['order'])) {
                if($_GET['order'] == "asc") {
                    $sql .= " ORDER BY Breed ASC";
                }
                else if($_GET['order'] == "desc") {
                    $sql .= " ORDER BY Breed DESC";
                }
            }
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($np);
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $record;
        }
    }
    
    function aboutTurkey() {
           global $dbConn;
           if(!empty($_GET['match'])) {
                //$sql = "SELECT * FROM Dinosaurs";
                $sql = "SELECT * FROM `Dinosaurs` ORDER BY rand()";
                $stmt = $dbConn->prepare($sql);
                $stmt->execute();
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                return $record;
            }
    }
    
    function displayColors() {
        global $dbConn;
        $sql = "SELECT DISTINCT Color FROM Chickens";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        foreach($record as $rec) {
            echo "<option>" . $rec['Color'] . "</option><br/>";
        }
    }
     function displayEggProductions() {
        global $dbConn;
        $sql = "SELECT DISTINCT EggProduction FROM Chickens";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        foreach($record as $rec) {
            echo "<option>" . $rec['EggProduction'] . "</option><br/>";
        }
    }
    
    function displayTurkeys() {
        global $dbConn;
        $sql = "SELECT * FROM Turkeys";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        foreach($record as $rec) {
            echo "<option>" . $rec['Breed'] . "</option><br/>";
        }
    }
   
?>