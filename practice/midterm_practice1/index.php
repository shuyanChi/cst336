<?php
session_start();
$photosF = array("bordeaux", "le_havre", "lyon","montpellier","paris", "strasbourg");
$photosM = array("acapulco", "cabos", "cancun","chichenitza","huatulco", "mexico_city");
$photosU = array("chicago", "hollywood", "las_vegas","ny","washington_dc", "yosemite");
shuffle($photosU);
shuffle($photosM);
shuffle($photosF);
print_r($photosU);
/*function print_photos() {
    global $photosU;
    global $photosF;
    global $photosM;
    if($_GET["country"] == "USA") {
        $c = "USA";
        $cf = $photosU;
    }
    else if($_GET["country"] == "France") {
        $c = "France";
        $cf = $photosF;
    }
    else {
        $c = "Mexico";
        $cf = $photosM ;
    }
    //for($i = 0; $i < $_GET["locations"]; ++$i) {
        echo "<img src = 'img/$c/$cf[0].png' alt = '$cf[0]' title = '$cf[0]'>";
    //}
}*/
if(empty($_GET["month"]) ||empty($_GET["locations"]) ||empty($_GET["country"])||empty($_GET["order"])) {
   $err = "It can't be empty";
}
function displayHeader() {
    echo "<h1>".$_GET["month"]. " " ."Itinerayry" . "</h1>";
    echo "<h2>". "Vsiting" ." ". $_GET["locations"]. " " . "places in" ." ".$_GET["country"];
}
$_SESSION["month"] = $_GET["month"];
$_SESSION["locations"] = $_GET["locations"];
$_SESSION["country"] = $_GET["country"];
if(!isset($_SESSION["month"])) {
    $_SESSION["month"] = "";
    $_SESSION["locations"] = 0;
    $_SESSION["country"] = "";
    $_SESSION['subH'] = array();
}
else {
$_SESSION['subH'] .="month: " .  $_SESSION["month"] . " ". "visiting" ." ". $_SESSION["locations"] . " in" . " ". $_SESSION["country"] . "*****";
}
function displayTable() {
   global $photosU;
   global $photosF;
   global $photosM;
  if($_SESSION["month"] == "November") {
      $monthLen = 30;
  }
  else if($_SESSION["month"] == "December") {
      $monthLen = 31;
  }
  else if($_SESSION["month"] == "January") {
      $monthLen = 31;
  }
  else {
      $monthLen = 28;
  }
  
  if($_GET["country"] == "USA") {
        $c = "USA";
        $cf = $photosU;
    }
    else if($_GET["country"] == "France") {
        $c = "France";
        $cf = $photosF;
    }
    else {
        $c = "Mexico";
        $cf = $photosM ;
    }

  echo "<table class = 'table'>";
  for($i = 0; $i < $monthLen; $i++) {
      if($i % 7 == 0) {
          echo "<tr>";
      }
      echo "<td>";
      echo ($i + 1);
      for($j = 0; $j < $_GET["locations"]; ++$j) {
      if($i  == $j) {
      shuffle($cf);
      echo "this is cf: " . $cf;
      echo "<img src = 'img/$c/$cf[$j].png' alt = '$cf[$j]' title = '$cf[$j]'>";
          //echo "<img src = 'img/$c/$cf[i].png' alt = '$cf[i]' title = '$cf[i]'>";
         //echo "<img src = 'img/$c/$cf[i].png' alt = '$cf[i]' title = '$cf[i]'>";
      }
      }
      
      echo "</td>";
    
  }
  echo "</table>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Winnter Vacation Planner</title>
        <link rel = "stylesheet" href ="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel = "stylesheet" href = "css/styles.css" type = "text/css">
    </head>
    <body>
    <form>
        Select Month:
        <select name = "month">
            <option value = "">-Select-</option>
            <option value = "November">November</option>
            <option value = "December">December</option>
            <option value = "January">January</option>
            <option value = "February">February</option>
        </select> <br />
        Number of locations:
        <input type = "radio" name = "locations" value = 3>Three
        <input type = "radio" name = "locations" value = 4>Four
        <input type = "radio" name = "locations" value = 5>Five
        <br />
        
        Select Country:
          <select name = "country">
            <option value = "">-Select-</option>
            <option value = "USA">USA</option>
            <option value = "Mexico">Mexico</option>
            <option value = "France">France</option>
        </select> <br />
        Visit locations in alphabetical order:
        <input type = "radio" name = "order" value = "A-Z">A-Z
        <input type = "radio" name = "order" value = "Z=A">Z-A
        
        <br />
        <input type = "submit" name = "submit" value = "Creat Itinerary"><br />
        <?php echo $err?>
        <br />
        <?php displayHeader();?>
        <?php displayTable();?>
        <h4><?php echo $_SESSION["subH"];?></h4>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
