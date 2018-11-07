<?php //include 'setsession.php';?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <h1>What</h1>
   <h1> My name is: <?= $_SESSION["my_name"]?></h1>
    <h1>my course is: <?= $_SESSION["course"]?></h1>
    </body>
</html>
