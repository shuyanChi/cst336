<?php
session_start();
if(empty($_GET["month"]) ||empty($_GET["locations"]) ||empty($_GET["country"])||empty($_GET["order"])) {
   $err = "It can't be empty";
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

//display table
echo "<table class = 'table'>";
  for($i = 0; $i < $monthLen; $i++) {
      if($i % 7 == 0) {
          echo "<tr>";
      }
      echo "<td>";
      echo ($i + 1);
      if($i % $_GET["locations"] == 0) {
      echo "<img src = 'img/$c/$cf[$i].png' alt = '$cf[$i]' title = '$cf[$i]'>";
      }
      
      echo "</td>";
    
  }
  echo "</table>";
}

//**********sort**************
    $ac = sort($countryName);
    $dc = rsort($countryName);
    if($order == "A-Z"){
        echo $ac;
    }
    else{
        echo $dc;
    }
//*********if else ***********
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
  

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel = "stylesheet" href ="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel = "stylesheet" href = "css/styles.css" type = "text/css">
    </head>
    <body>
        <select name = "">
            <option value = "">-Select-</option>
            <option value = ""></option>
            <option value = ""></option>
            <option value = ""></option>
            <option value = ""></option>
        </select> <br />

  
        <input type = "radio" name = "" value = >Three
        <input type = "radio" name = "" value = >Four
        <input type = "radio" name = "" value = >Five
        <br />
        
        Select Country:
          <select name = "">
            <option value = "">-Select-</option>
            <option value = "">USA</option>
            <option value = "">Mexico</option>
            <option value = "">France</option>
        </select> <br />
        Visit locations in alphabetical order:
        <input type = "radio" name = "" value = "A-Z">A-Z
        <input type = "radio" name = "" value = "Z=A">Z-A
        
        <br />
        <input type = "submit" name = "submit" value = "Creat Itinerary"><br />
       <?php echo $err;?>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>