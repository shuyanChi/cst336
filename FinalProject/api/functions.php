<?php 
//$dbConn = startConnection('Jurassic_Base'); 
 function validateSession(){
        if (!isset($_SESSION['adminFullName'])) {
            header("Location: index.php");  //redirects users who haven't logged in 
            exit;
        }
    }
    
function QueenieandAmber() {
    global $dbConn;
    $sql = "SELECT * FROM `Memorial` WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $mybabies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $baby_img = $mybabies['Imamg'];
    $name = $mybabies['Name'];
    //print_r($mybabies);
    return $mybabies;
}


function displayAllChickens(){
    global $dbConn;
    $sql = "SELECT * FROM Chickens ORDER BY Breed ASC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    foreach ($records as $record) {
        echo "<a class='btn btn-primary' role='button' href='update.php?Id=".$record['Id']."'>Update</a>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<form action='deleteC.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='Id' value='".$record['Id']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        echo "[<a 
        onclick='openModal()' target='productModal'
        href='chickenInfo.php?Id=".$record['Id']."'>".$record['Breed']."</a>]  ";
        echo  $record['Color']   . "<br><br>";
        
    }
    
    return $records;

}

function getchickenInfo($Id) {
     global $dbConn;
    
    $sql = "SELECT * FROM Chickens WHERE Id = $Id";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    return $record;
}

 function averageLifeSpan(){
        global $dbConn;
        $sql = "SELECT AVG(Lifespan)FROM Chickens";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); 
        foreach($record as $lifespan) {
            echo $lifespan;
        }
    }
    
    function averageEggProduction(){
        global $dbConn;
        $sql = "SELECT AVG(EggProduction)FROM Chickens";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); 
        foreach($record as $egg) {
            echo $egg;
        }
    }
    
    function countWhiteChicken(){
        global $dbConn;
        $np = array(); 
        $sql = "SELECT COUNT(Color) FROM Chickens WHERE Color LIKE '%white%'";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); 
        foreach($record as $color) {
            echo $color;
        }
    }
    
    function mostEgg(){
        global $dbConn;
        $np = array(); 
        $sql = "SELECT MAX(EggProduction) AS EggProduction FROM Chickens";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); 
        foreach($record as $mostegg) {
            echo $mostegg;
        }
    }
    
    function leastEgg(){
        global $dbConn;
        $np = array(); 
        $sql = "SELECT MIN(EggProduction) AS EggProduction FROM Chickens";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); 
        foreach($record as $leastegg) {
            echo $leastegg;
        }
    }
?>