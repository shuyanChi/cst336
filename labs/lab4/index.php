<?php
    $backgroundImage = "img/sea.jpg";
    echo "<img src ='$backgroundImage' alt ='sea' title = 'sea' width = 300px />";
    if(isset($_GET["keyword"])) {
        include "api/pixabayAPI.php";
        $keyword = $_GET["keyword"];
        //echo "<h3>You searched for: " . $keyword . "</h3>";
        //shuffle($imageURLs);
        if(!empty($_GET['category']) && empty($_GET['category'])) {
            $keyword = $_GET['category'];
        }
        $imageURLs = getImageURLs($keyword, $_GET["layout"]);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
        //echo "layout: " . $_GET["layout"];
    }
    function formIsValid() {
        if(empty($_GET['keyword'])) {
            echo "<h1>You Must type a keyword or select a category</h1>";
            return false;
        }
        return true;
    }
    //print_r($_GET);
   // print_r($imageURLs);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 4: Pixabay Slideshow</title>
        <link rel = "stylesheet" href ="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel = "stylesheet" href = "css/styles.css" type = "text/css">
        <style>
        body{
            background-image: url(<?=$backgroundImage?>);
            background-size: cover;
        }
        #carouselExampleIndicators {
            width: 500px;
            margin: 0 auto;
        }
        #left{
            padding-left: 500px;
        }
        #sub {
            font-size: 2em;
            border-radius: 10%;
        }
        #input {
            border-radius: 15%;
            padding: 10px;
        }
        #orientation {
            background-color: #ffffff;
            border-radius: 15%;
            color: black;
            margin: 15px;
            padding: 15px;
            text-align: left;
        }
        #buddy {
            padding-top: 20px;
        }
        </style>
    </head>
    <body>
        <br /> <br />
        <!--HTML FORM GOES HERE!-->
        <form method = "GET">
            <div  id = "left">
            <table>
            <tr>
            <td>
            <input id = "input" type = "text" name="keyword" size = "12" placeholder = "keyword" value = "<?= $_GET['keyword']?>"/>
            <br />
            <select name = "category">
                <option value = ""> -Select One- </option>
                <option <?= ($_GET['category'] == "Sea")?" selected":"" ?>><h3>Sea</h3></option>
                <option <?= ($_GET['category'] == "Moutains")?" selected":"" ?>> Moutains </option>
                <option <?= ($_GET['category'] == "Forest")?" selected":"" ?>> Forest</option>
                <option <?= ($_GET['category'] == "Sky")?" selected":"" ?> > Sky</option>
            </select>
            </td>
            <td id = "orientation">
            <input type = "radio" name = "layout" value = "horizontal"
            <?php
                if($_GET['layout'] == "horizontal") {
                    echo "checked";
                }
            ?>
            >Horizontal <br />
            <input type = "radio" name = "layout" value = "vertical"
            <?=($_GET['layout'] == "vertical") ? "checked":""?> >Vertical
            </td>
            </tr>
            </table>
            </div>
            <br />
            <input id = "sub" type = "submit" name = "submitBtn" value = "Submit!">
        </form>
        <br />
        <!--<h1>You must type a keyword or select a category</h1>-->
        <?php
            if(isset($imageURLs) && formIsValid()){
        ?>
       
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <!--replace with forloop-->
                <?php
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
                    for($i = 1; $i < 7; ++$i) {
                        echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                        //<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    }
                ?>
            </ol>
            <div class="carousel-inner">
            <?php
                for($i = 0; $i<7; ++$i) {
                    do {
                        $randomIndex = array_rand($imageURLs);
                    }
                    while(!isset($imageURLs[$randomIndex]));
                    echo "<div class = \"carousel-item";
                   /* if($i == 0) {
                        echo " active ";
                    }*/
                    echo ($i == 0) ? " active " : "";
                    echo "\">";
                    echo "<img class = \"d-block w-100\" src =\"".$imageURLs[$randomIndex]."\" alt =\"Second slide\">";
                    echo "</div>";
                    unset($imageURLs[$randomIndex]);
                }
            ?>
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
        <?php
            }
            else {
                echo "<h1>Enter a keyword to select a category!</h1>";
            }
        ?>
        <div id = "buddy">
            <img src = "img/buddy_verified.png" />
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <br /> <br />
    </body>
</html>