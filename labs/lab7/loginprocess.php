<?php
    include "../../inc/dbconnection.php";
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $sql = "SELECT * FROM  om_admin
    WHERE user= 'username'
    AND  password = 'password';
    "
  $tmt = $dbConn -> prepare($sql);
  
?>