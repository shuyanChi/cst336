<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
       $days = array("Nov", "Dec", "Jan", "Dec");
       print_r($days);
       echo $_POST["days"];
       echo" <table>";
        for($i = 0; $i < $_POST["days"]; ++$i) {
            if($i % 7 == 0) {
                echo "<tr>";
               // echo "<th>" . $i . "</th>";
                
            }
            echo "<th>" . ($i + 1). "</th>" ;
        }
    
        echo "</table>";
    ?>
