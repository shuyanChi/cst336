<?php
    session_start();
?>
<?php
    include 'api/getDatabase.php';
    include 'api/functions.php';
    //include 'inc/assetsInfo.php';
    $_SESSION['temp'] = array ();
    $dbConn = startConnection('Jurassic_Base');
    if(!empty($_GET['search-form'])) {
        $chickenShow = filterData();
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Jurassic Base </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    <body>
        <script>
          var randId = Math.floor(Math.random() * 5) + 1;
	      $('document').ready(function() {
	          $('.dio').click(function() {
	              $("#container").html("<img src='img/loading.gif' />");
	              $('#petModal').modal("show");
	              $.ajax({
                    type: "GET",
                    url: "api/dinosaurs.php",
                    dataType: "json",
                    data: { "petid": randId },
                    success: function(data, status) {
                        $("#petname").html(data.Name);
                        $("#description").html(data.description);
                        //$("#petImage").attr('src', '../api' + data.Image);
                        $("#petImage").attr('src', data.Image);
                        $("#container").html("");
                        //alert(data); 
                       // attr('src', "../" + data.Image, width="115px");
                    },
	          }); // ajax closing
	          
	           //   alert($(this).attr('id'));
	          }); // petlink click
	          
	      }); // doc end
	  </script>
	  <?php $pets = aboutTurkey();?>
        
        <ul class="nav nav-pills">
            <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="memorial.php">Memorial</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin/adminLogin.php">Admin</a>
            </li>
        </ul>
        <h1>Jurassic Base</h1>
        <h2>Chickens and Turkeys are the descendants of dinosaur!</h2><br /><br />
        <hr /><br />
        <div class="row">
            <div class="column">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
            <img  class="d-block w-100" src="img2/dilophosaurusl.jpg" alt="dilophosaurus" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img2/herrerasaurusl.jpg" alt="herrerasaurus" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img2/titanosaurl.jpg" alt="titanosaur" alt="Third slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img2/Turiasaurial.jpg" alt="titanosaur" alt="Third slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img2/Heterodontosauridael.jpg" alt="titanosaur" alt="Third slide">
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
            </div>   
            
        
        <div class="column">
            <form>
                <br /><br />
                Chicken Breed: <input type="text" name="breed"><br /> <br />
                Chicken Colors: <select name='color'>
                                <option value=""> Select One</option>
                                    <?=displayColors()?>
                                 </select><br /><br />
                Egg productions: <select name='egg'>
                                 <option value=""> Select One </option>
                                 <?=displayEggProductions()?>
                                 </select> <br /><br >
                Order: <input type='radio' name='order' value='asc' /> A-Z  <input type='radio' name='order' value='desc' /> Z-A <br />
                                 <br />
                <br /><input type='submit' name='search-form' id = "btn" value='Search!' /> <br /> <br />
            </form>
           
                <span>Select a Turkey match <strong>dinosaur</strong>:</span><br /><br />
                    <select name='dino'>
                    <option value=""> Select One </option>
                    <?=displayTurkeys() ?>
                    </select> <br /><br >
                  
               <!--<button type="submit" name='match' id = '". $pet['id']. "' class="dio">Match</button><br />-->
              <button style="background-color:blue; color: white; padding:20px; border-style: hidden;" name='match' class='dio'>Match</button>
            
            <?php aboutTurkey();?>
            <h1 id="name"></h1>
            <span id="dis"></span>
            <!--<img id="d-img" src="">-->
        </div>
        </div>
           <!-- Modal -->
        <div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="petname"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div id="container"></div>
                <div>
        	      
        	      <img id = "petImage" src="">
        	      <div id="description">Description: </div>
        	      
        	      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
            <?php 
             echo "<table class='table' style='background-color: #99ccff'>";
             echo "<tr>";
                echo "<th>"."Breed"."</th>";
                echo "<th>"."Color"."</th>";
                echo "<th>"."Egg Production"."</th>";
                echo "<th>"."Photo"."</th>";
             echo "</tr>";
            foreach($chickenShow as $chicken) {
                echo "<tr>";
                echo "<td>".$chicken['Breed']."</td>";
                echo "<td>".$chicken['Color']."</td>";
                echo "<td>".$chicken['EggProduction']."</td>";
                echo "<td style='height:100px; text-align: center'>".  "<img src=" .$chicken['Image'] . " width = 50px />"   ."</td>";
                echo "</tr>";
            }
            echo "</table>";
           
            ?>
         
      

        <footer>
            <img id="set-img" src = "../img/csumb2-300x190.png" alt = "csumb logo" /><br />
             cst336. 2018 &copy; <br />
             <p><h3 class="h3"><a href="https://www.amazon.com/Daughter-T-rex-Shuyan-Chi/dp/154953761X">The Daughter of T-rex</a></h3></p>
        </footer>
       <!-- <script src="main.js"></script> -->
       
    </body>
</html>