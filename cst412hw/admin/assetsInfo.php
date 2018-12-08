<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("Assets");
include '../inc/functions.php';
validateSession();

if (isset($_GET['ID'])) {//id

  $AssetInfo = getAssetInfo($_GET['ID']);   //id
  print_r($AssetInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Asset Info </title>
    </head>
    <body>
    <h3><?=$AssetInfo['Name']?></h3>
    <img src='<?="../".$AssetInfo['asse-img']?>' height = 75px />
     <?=$AssetInfo['dsc']?>
     
 
    </body>
</html>