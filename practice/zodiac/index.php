<?php

function yearList(){
    $zodiacSigns = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    //global $counter = 0;
    for ($i=1500; $i <= 2000; $i++) {
        for($_POST["rows"]) {
       echo "<li>  Year  $i </li>";
    
    }
}
echo  $_POST["start"] . "<br />";
echo $_POST["end"] . "<br />";

echo $_POST["rows"];
echo $_POST["cols"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

        <h1> Chinese Zodiac Tasks</h1>
        
        <ul>
          <?= yearList() ?>
        </ul>
        <form method = "POST">
            <input type = "text" name = "start" >Start
            <input type = "text" name = "end">End
            <br />
            <input type = "text" name = "rows">
            <input type = "text" name = cols>
            <input type = "submit" value = "Submit">
        </form>
        
    </body>
</html>