<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
//include 'inc/functions.php';
//include 'loginProcess.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <style>
         @import url("css/styles.css");
        </style>
    </head>
    <body>

        <h1> Ottermart - Admin Login </h1>
        
        <form method="post" action="loginProcess.php">
          Username:  <input class = "uinput" type="text" name="username"/> <br>
          Password:  <input class = "uinput" type="password" name="password"/> <br>
          <input class = "button" type="submit" value="Login">
        </form>
        <div id = "error">
            <?php echo  $_SESSION["error"]?>
        </div>
    </body>
    <footer>
        cst336. 2018 &copy; Chi <br />
        <strong>Disclaimer: </strong> The information in this webpage is fictious. <br />
        It is unsed for acdemic purposes only. <br />
        <img src = "../../img/csumb2-300x190.png" alt = "csumb logo" /> 
        <img src = "../../img/buddy_verified.png" alt = "buddy_verified"/>
    </footer>
</html>