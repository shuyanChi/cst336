<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("cst412Assets");
include '../inc/functions.php';
validateSession();
//checks whether the form was submitted
if (isset($_GET['add-asset'])) {
    $address = $_GET['address'];
    $Comments = $_GET['comments'];
    $dExpired = $_GET['date-e'];
    $dPurchased = $_GET['date-p'];
    $description =  $_GET['des'];
    $image = $_GET['asse-img'];
    $model = $_GET['mod'];
    $AName = $_GET['name'];
    $phone = $_GET['phone'];
    $price =  $_GET['price'];
    $reDate = $_GET['r-date'];
    $webpage =  $_GET['web'];
    //$Id = $_GET['ID'];
    
    /*$sql = "INSERT INTO `Assets`(`Address`, `Comments`, `DateExpired`, `DatePurchased`, `Description`, `img`, `Model`, `Name`, `Phone`, `Price`, `Retired Date`, `WebPage`) 
    VALUES (:add, :com, :dEx, :dPu, :des, :img, :mod, :name, :pnone, :price, :retired, :web)";*/
    $sql = "INSERT INTO `Assets`(`Address`, `Comments`, `DateExpired`, `DatePurchased`, `Description`, `img`, `Model`, `Name`, `Phone`, `Price`, `Retired Date`, `WebPage`) 
    VALUES (:add, :com, :dEx, :dPu, :des, :img, :mod, :name, :phone, :price, :retired, :web)";
    
    $np = array();
    $np[":add"] = $address;
    $np[":com"] = $Comments;
    $np[":dEx"] = $dExpired;
    $np[":dPu"] = $dPurchased;
    $np[":des"] = $description;
    $np[":img"] = $image;
    $np[":mod"] = $model;
    $np[":name"] = $AName;
    $np[":phone"] = $phone;
    $np[":price"] = $price;
    $np[":retired"] = $reDate;
    $np[":web"] = $webpage;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New asset was added";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Assets </title>
    </head>
    <body>
        
        <h1> Adding New Assets </h1>
        <h2><a href = "adminPage.php">Back to Admin Page</a></h2>
        
        <form action="adminPage.php">
              <input type="submit" value="Back">
          </form>
        
        <form>
           Name: <input type="text" name="name"><br />
           Model: <input type="text" name="mod"><br />
           Address: <input type="text" name="address"> <br />
           Comments: <input type="text" name="comments"><br />
           Date Expired: <input type="text" name="date-e"> <br />
           Date Purchased: <input text type="text" name="date-p"><br />
           Description: <br /><textarea name="des" cols="50" rows="4"></textarea><br />
           Phone: <input type="text" name="phone"><br />
           Price: <input type="text" name="price"><br>
           Retired Date: <input type="text" name="r-date"><br />
           WebPage: <input type="text" name="web"><br />
           Set Image Url: <input type="text" name="asse-img"><br>
           <input type="submit" name="add-asset" value="Add Asset">
        </form>

    </body>
</html>