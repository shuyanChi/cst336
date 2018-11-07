<?php 
    session_start();
    
 ?>   
<?php
   $guessAni = "";
   
   function checkSlected() {
       for($x = 0; $x < count($charSet_a); ++$x) {
          if($_POST["animals"] == $charSet_a[$x]) {
              echo "selected";
          } 
          else {
              echo "";
          }
       }
   }

   function play_a() {
       global $guessAni;
        if($_POST["animals"] == "鸡") {
            $guessAni = "chicken";
        }
        else if($_POST["animals"] == "鸭") {
            $guessAni = "duck";
        }
        else if($_POST["animals"] == "兔子") {
            $guessAni = "rabbit";
        }
         else if($_POST["animals"] == "狗") {
            $guessAni = "dog";
        }
        else {
            $guessAni == "cat";
        }
        
         if($_SESSION["randomPho"] == $guessAni) {
            echo "<h4>" . "You are right!" . "</h4>";
           $_SESSION["count_a"]++;
           echo "<br />" . "<h4>" . "You got: " . $_SESSION["count_a"] . " " . "right!" . "</h4>";

        }
        else {
            echo "<span>" . "<h4>" . "Try again!" . "</h4>" . "</span>";
            $_SESSION["count_a_r"]++;
            echo "<br />" . "<br />" . "<h4>" . "You got "  .$_SESSION["count_a_r"] ." " . "wrong!" ."</h4>";
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
      if(empty($_POST["animals"])) {
        echo "<h4>You Must select a category</h4>";
        return false;
    } 
    else {
        echo "<h2>" . "Your answers and scores" ."</h2>";
        echo "<h2>" . play_a()  . "</h2>";
        return true;
    }
    ?>
     
    <div  id = "tree">
        <img src = "img/treeblackandwhite.png" alt = "tree"/>
    </div>
    </body>
</html>