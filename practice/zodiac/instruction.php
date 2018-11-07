<?php
function yearList() {
    for($i = 1500; $i < 20001; ++$i) {
             if($i == 1776) {
                 echo "<strong>"."USA INDEPENDENCE!"."</strong>";
             }
             
         echo "<li>";
         
         echo "year" . $i ."<br />";
         if($i % 100 == 0) {
             echo "<strong>" . "Happy New Centry" . "</strong>";
         }
         
         echo "</li>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    <h1>Chinese Zodiac Tasks</h1>
    <ul>
    <?php yearList()?>
    </ul>
    </body>
</html>