<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("Jurassic_Base");
include '../api/functions.php';
validateSession();
if (isset($_GET['add-chickens'])) {
    $breed = $_GET['bre'];
    $color = $_GET['col'];
    $eggProduction = $_GET['egg'];
    $history = $_GET['his'];;
    $image = $_GET['chi-img'];
    $lifespan = $_GET['lif'];
    $nature = $_GET['nat'];
    $Id = $_GET['Id'];
    $sql = "INSERT INTO Chickens(`Breed`, `Color`, `EggProduction`, `History`, `Image`, `Lifespan`, `Nature`) 
    VALUES (:bre, :col, :egg, :his, :img, :lif, :nat)";
    
    $np = array();
    $np[":bre"] = $breed;
    $np[":col"] =  $color;
    $np[":egg"] = $eggProduction;
    $np[":his"] = $history; 
    $np[":img"] = $image;
    $np[":lif"] = $lifespan;
    $np[":nat"] = $nature;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "<div id='message'> New Chicken was added </div>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Chickens </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    <body>
        
        <h1> Adding New Chickenss </h1>
        
        <form action="adminPage.php">
              <input type="submit" id="btn" value="Back">
          </form>
        
        <form>
           Breed: <input type="text" name="bre"><br /><br />
           Color: <input type="text" name="col"><br /><br />
           Egg Production: <input type="text" name="egg"> <br /><br />
           history: <input type="text" name="his"><br /><br />
           Lifespan: <input type="text" name="lif"><br /><br />
           Characteristic: <input type="text" name="nat"><br /><br />
           Set Image Url: <input type="text" name="chi-img"><br><br />
           <input type="submit" name="add-chickens" id="btn2" value="Add Chicken">
        </form>
    </body>
</html>