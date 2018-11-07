 <?php 
    SESSION_start();
    Session_destroy();
    if(!isset($_SESSION['result'])) {
        $_SESSION['result'] = "";
        $_SESSION['characters'] = "";
        $_SESSION['EnglishWords'] = "";
    }
    include("function.php"); 
 ?>
 
<!DOCTYPE html>
<html>
    <head>
     <link rel="stylesheet" type="text/css" href="css/styles.css">
     <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
     <meta charset = "utf-8">
    <title>
        Learn Chinese
    </title>
    <style>
    </style>
    </head>
    <body>
        <h1>Learn Chinese</h1>
        <div id = "login">
            Please sign up first: 
            <form>
                First name: <br />
                <input type = "text" name = "firstName" value = "Amber"> <br />
                Last name: <br />
                <input type = "text" name = "lastName" value = "T-rex"> <br />
                Pass word: <br />
                <input type = "password" name = "pwd"><br />
                <input type = "submit" value = "Sign up">
            </form>
        </div>
           <div style="padding-left: 10px";>
           <h3><?php displayArray(); ?></h3>
           <?php
                $word1 = $_SESSION['characters'];
                $word2 = $word1[$randValue];
                echo " <img id = 'image' src = 'img/".$word2.".PNG' alt = '' title = 'One' /> ";
                $word = $word2;
           ?>
        <br />
            <h3><?php displayArray(); ?></h3>
            <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <?php
                    $English = $_SESSION['EnglishWords'];
                    for($x = 0; $x < $arrayLength; ++$x) {
                        if($English[$x] == "one") {
                            echo "<input type = 'radio' name = 'char' value = $English[$x] . checked> ". ucfirst($English[$x]). "<br />";
                        }
                        else {
                            echo "<input type = 'radio' name = 'char' value = $English[$x]> ". ucfirst($English[$x]). "<br />";
                        }
                    }
                ?>
                <input id = "spin"  type="submit" name = "submit" value = "Submit">
                <?php
                     echo "<em>" . "Your guess is: " .  $_POST["char"] . "</em>";
                     //echo $word;
                     if($word == $_POST["char"]) {
                         $_SESSION['result'] = "right";
                     }
                     else {
                         $_SESSION['result'] = "wrong";
                     }
                     echo $_SESSION['result'];
                 ?>
            </form>
                <br />
        </div>
        <footer>
            cst336. 2018 &copy; Chi <br />
            <strong>Disclaimer: </strong> The information in this webpage is fictious. <br />
            It is unsed for acdemic purposes only. <br />
            <img src = "../../img/csumb2-300x190.png" alt = "csumb logo" />
        </footer>

    </body>
</html>
