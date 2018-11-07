<?php session_start();
   //session_destroy();
?>
<?php
    include 'inc/functions.php';
    include 'timeElapsed.php'; 
?>


<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id = "main">
            <?php
                $start = microtime(true); 
                play();
                displayElapsedTime();
            ?>
            <div>
            <form>
                <input type ="submit" value = "Spin"/>
            </form>
             <input type="submit" value="Submit">
            </div>
        </div>
    </body>
</html> 