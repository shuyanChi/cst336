<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);

/*This SQL does NOT prevent SQL Injection (because of the single quotes)
  $sql = "SELECT * FROM om_admin
  WHERE username = '$username' 
  AND  password = '$password'";
*/
$sql = "SELECT * FROM om_admin
                 WHERE username = :username 
                 AND  password = :password ";  
                 
/*$np = array();
$np[':username'] = $username;
$np[':password'] = $password;*/

$np = array(":username"=> $username,":password"=> $password);

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

if (empty($record)) {
    
    $_SESSION["error"] =  "* Wrong username or password!!";
     header('Location: index.php');
} else {
   
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: admin.php'); //redirects to another program
    
}

?>
