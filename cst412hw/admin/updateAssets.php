<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("cst412Assets");
include '../inc/functions.php';
validateSession();

if (isset($_GET['update-asset'])){  //user has submitted update form
    /*$address = $_GET['address'];
    $Comments = $_GET['comments'];
    $dExpired = $_GET['date-e'];
    $dPurchased = $_GET['date-p'];
    $model = $_GET['mod'];
    $phone = $_GET['phone'];
    $reDate = $_GET['r-date'];
    $webpage =  $_GET['web'];*/
    
    $AName = $_GET['name'];
    $description = $_GET['des'];
    $price =  $_GET['price'];

    $sql = "UPDATE Assets 
            SET Name = :name,
               Description = :des,
               Price = :price
               WHERE Name = " . $AName;
            
            
    $np = array(":name" => $AName, ":des" => $description,  ":price" => $price);
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "<span>Assets Values are changed!</span>";
}

if (isset($_GET['name'])) {

  $assetInfo = getAssetInfo($_GET['name']);    

  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Assets! </title>
    </head>
    <body>

        <h1> Updating a asset </h1>
        <h2><a href = "adminPage.php">Back to Admin Page</a></h2>
        <form>
           Product name: <input type="text" name="name" ><br>
           Description: <textarea name="description" cols="50" rows="4"> </textarea><br>
           Price: <input type="text" name="price" >"><br>
           <!--Set Image Url: <input type="text" name="asse-img" value=""><br> -->
           <input class = "button" type="submit" name="update-asset" value="Update Asset">
        </form>
       
    </body>
</html>