<?php 
    session_start();
    function play() {
         if($_SESSION["randomChar"] == $_POST["char"]) {
            echo "<h4>" . "You are right!" . "</h4>";
           $_SESSION["count"]++;
           echo "<h4>" . "<br />" . "You got: " . $_SESSION["count"] . " " . "right!" . "</h4>";

        }
        else {
            $_SESSION["count_r"]++;
            echo "<h4>" . "Try again!" . "</h4>";
            echo "<h4>" .  "<br />" . "You got "  .$_SESSION["count_r"] ." " . "wrong!" . "</h4>";
        }
        
        
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <title>Answer Page </title>
    </head>
    <body>
     <h2><a href = "index.php">Back Home Page</a><h2>
     <?php
        if(empty($_POST["char"])) {
          echo "<h4>You Must click a button</h4>";
          return false;
        }
        else {
          echo "<h2>Your answers and scores</h2>"; 
          echo "<h2>" . play()  . "</h2>";
          return true;
        }
     ?>
    <div  id = "tree">
        <img src = "img/treeblackandwhite.png" alt = "tree"/>
    </div>
    </body>
</html>