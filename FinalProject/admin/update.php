<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("Jurassic_Base");
include '../api/functions.php';
validateSession();

if (isset($_GET['update'])){  //user has submitted update form
    $eggProduction = $_GET['egg'];
    $lifespan = $_GET['lif'];
    $chara = $_GET['chara'];
    $Id = $_GET['id'];
    $image = $_GET['image'];
   // $sql = "UPDATE Chickens SET EggProduction = :egg, Lifespan = :lif, Nature = :cha WHERE Id = " . $Id;
    //$Id = $_GET['id'];
    $sql = "UPDATE Chickens SET EggProduction = :egg, Lifespan = :lif, Nature = :cha, Image = :img WHERE Id = " . $Id;

    
    $np = array();
    $np[":egg"] = $eggProduction; 
    $np[":lif"] = $lifespan;
    $np[":cha"] = $chara;
    $np[":img"] = $image;
   
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "<div id='message'>It's updated</div>";
    //print_r($np);
    //print_r($stmt);
}

if (isset($_GET['Id'])) {

  $chickenInfo = getchickenInfo($_GET['Id']);    
  
 // print_r($chickenInfo); //I can get all information.
    
    
}
//?rating=4 test API
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    <body>
        <div id="left-p">
        <h1> Updating</h1>
   
        <form>
           <input type="hidden" name="id" value="<?= $chickenInfo['Id']?>"><br /><br /><br />
           Egg Production: <input type="number" name="egg" value="<?= $chickenInfo['EggProduction']?>"> <br /><br /><br />
           Lifespan: <input type="number" name="lif" value="<?= $chickenInfo['Lifespan']?>"><br /><br /><br />
           Characterristic:<br /> <br />
           <textarea rows="4" cols="50" name="chara" value="<?= $chickenInfo['Nature']?>"></textarea> <br /><br />
           Set Image Url: <input type="text" name="image" value="<?=$chickenInfo['Image']?>"><br /><br />
           <input class="btn btn-primary" type="submit" name="update" value="Update">
        </form></br />
        <form action="adminPage.php">
           <input type="submit" class="btn btn-secondary" value="Logout">
        </form>
        </div>
    </body>
</html>
