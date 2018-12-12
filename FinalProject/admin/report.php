<?php
    include '../../inc/dbConnection.php';
    include '../api/functions.php';
    $dbConn = startConnection("Jurassic_Base");
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Jurassic Base </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    
    <body id="body-div" class="row">
        <div class="column">
        <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link active" href="adminPage.php">AdminPage</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
        </li>
        </ul>
        <div class="container">
            
            <h1>Reports</h1>
        </div>
        <!--<div class ="column">-->
            <div id="set-center-r">
                <table class="table" style='background-color: #99ccff'>  
                    <tr><th>Average Life Expectancy: <?php averageLifeSpan()?> Year </th> </tr>
                    <tr><th>Number of White Chickens: <?php countWhiteChicken()?></th></tr>
                    <tr><th>Average Egg Production: <?php averageEggProduction()?></th> </tr>
                    <tr><th>Most Egg Chicken Can Lay in a Year:  <?php mostEgg()?></th></tr>
                    <tr><th>Least Egg Chicken Can Lay in a Year: <?php leastEgg()?></th></tr>
                </table>
            </div>
        </div>
        </div>
    </body>
</html>