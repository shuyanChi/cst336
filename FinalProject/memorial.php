<?php
    include '../inc/dbConnection.php';
    include 'api/functions.php';
    $dbConn = startConnection("Jurassic_Base");
    $myLove = QueenieandAmber();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Remembrance of My Pet Chickens</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    <body>
    </head>
    <body>
        <br />
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="memorial.php">Memorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/adminLogin.php">Admin</a>
                </li>
            </ul>
        </nav>
        <br /><br />
        <h1>Remembrance of My Pet Chickens</h1>
        <br />
        <?php
       echo "<table class='table' style='background-color: #99ccff' 'text-align: left'>";
             echo "<tr>";
                echo "<th>"."Name"."</th>";
                echo "<th>"."Breed"."</th>";
                echo "<th>"."Born"."</th>";
                echo "<th>"."Died"."</th>";
                echo "<th>"."Story"."</th>";
                echo "<th>"."Image"."</th>";
             echo "</tr>";
            foreach($myLove as $tRex) {
                echo "<tr>";
                echo "<td>".$tRex['Name']."</td>";
                echo "<td>".$tRex['Breed']."</td>";
                echo "<td>".$tRex['Born']."</td>";
                echo "<td>".$tRex['Died']."</td>";
                echo "<td style='text-align:left'>".$tRex['Story']."</td>";
                echo "<td style='height:100px; text-align: center'>".  "<img src=" .$tRex['Image'] . " width = 50px />"   ."</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <br />
      
    </body>
</html>
