<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("Assets");

include '../inc/functions.php';
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
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Are you sure you want to delete?");
                
            }
            function openModal(){
                $('#myModal').modal("show");
            }
            
            
        </script>
    
    </head>
    <body>
        
        <h1 class="jumbotron"> ADMIN SECTION - Assets </h1>
        <form action="addAssets.php">
            <input type="submit" value="Add New Product">
        </form>

        
         <form action="logout.php">
              <input type="submit" value="Logout">
          </form>

           <br><br>
        
        <?= displayAllProducts(); ?>
        

        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Assets Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <iframe name = "productModal" width = "450" height = "250"></iframe>
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