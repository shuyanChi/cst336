<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("Jurassic_Base");

include '../api/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
            em {
                color: red;
            }
            body {
                background-image: url("../img/d-background.jpg");
                background-repeat: no-repeat;
                background-size: 100% 100%;
                margin-top: 5px;
                padding: 15px;
                height: auto;
                text-align: center;
                background-color: #f5f5f0;
                box-shadow: 2px 5px 2px  5px #003300;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <!--<link rel="stylesheet" type="text/css" href="../css/styles.css"> -->
        <script>
        
            function confirmDelete() {
                return confirm("Are you sure you want to delete?");
            }
            function openModal() {
                $('#myModal').modal("show");
            }
        </script>
    </head>
    <body>
    <div id="set-center-a">
        <h1 class="jumbotron"> ADMIN SECTION - Jurassic_Base </h1>
        <h3>Welcome <?= $_SESSION['adminFullName'] ?></h3>
        <form action="addNew.php">
            <input style='margin-left:30px;' type="submit" class="btn btn-success"  value="Add New Product">
        </form>
        <form action="report.php">
            <input type="submit" class="btn btn-info"  value="Reports">
        </form>
         <form action="logout.php">
              <input type="submit" class="btn btn-secondary" value="Logout">
          </form>
           <br><br>
        
        <?php displayAllChickens()?>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Chicken Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="productModal" width="450" height="250"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                 
    </body>
</html>