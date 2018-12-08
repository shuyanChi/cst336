<?php
    session_start();
?>
<!DOCTYPE html>
<?php
    include 'inc/dbConnection.php';
    include 'inc/functions.php';
    //include 'inc/assetsInfo.php';
    $_SESSION['temp'] = array ();
    $dbConn = startConnection('cst412Assets');  //Make sure dbConnection.php file knows about this.
    if (isset($_GET['name'])) {
        $items = filterAssets();
    }
?>
<html>
    <head>
        <title>Assets Web Site</title>
        
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <body>
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>SMALL COMPANY ASSETS</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='admin/adminLogin.php'>Admin</a></li>
                    </ul>
                </div>
            </nav>
            <br/><br/><br/>
        <h1>Asset Web site</h1>
        <div id ="set-center">
        <form>
            Manufacturer Name: <input type="text" name="name"><br />
            Purchased Price From <input type='text' name='price-from' value='' /> 
            To <input type='text' name='price-to' value='' /> <br />
            Order: <input type='radio' name='order' value='asc' /> A-Z  <input type='radio' name='order' value='desc' /> Z-A <br />
            <br>
            <input type='radio' name='order' value='desc-price' /> Price high-low<br />
            <input type='radio' name='order' value='asc-price' /> Price low-high <br />
            <input type='submit' name='search-form' id = "btn" value='Search!' /> <br />
        </form>
        </div>
        <div id = "display" style = 'height: auto;'>
        <?php
            if(!empty($_GET['name']) || (!empty($_GET['price-from']) && !empty($_GET['price-to']))) {
                foreach ($items as $value) {
                     $asset_img = $value['img'];
                    echo "<h2>" . $value['Name'] ."</h2>" . "<br />";
                    echo "<img src= '$asset_img' style = 'width: 250px; height: 200px;'>" . "<br />";
                    echo "<em>" . "ID: " . "</em>" . $value['ID'] ."<br />";
                    echo "<em>" . "Model: ". "</em>" . $value['Model'] ."<br />";
                    echo "<em>" ."Price: "."</em>" .$value['Price'] ."<br />";
                    echo "<em>" . "Address: " . "</em>" . $value['Address'] ."<br />";
                    echo "<em>" ."Phone: ". "</em>" .$value['Phone'] ."<br />";
                    echo "<em>" ."Website: ". "</em>" .$value['WebPage'] ."<br />";
                    echo "<em>" ."DatePurchased: "."</em>" .$value['DatePurchased'] ."<br />";
                    echo "<em>" ."Date Expired: "."</em>" .$value['DateExpired'] ."<br />";
                    echo "<em>" ."Retried Date: "."</em>" .$value['RetiredDate'] ."<br />";
                    echo "<em>" ."Description: " . "</em>" .$value['Description'] ."<br />";
                    echo "<em>" ."comments: "."</em>" .$value['Comments'] ."<br />";
                    
                }
            }
            else {
                echo "<h3>" . "Assets not found!". "<h3>";
            }
        ?> 
        </div>
    </body>
    <footer>
        cst412. 2018 &copy; <br />
        <strong>Disclaimer: </strong> The information in this webpage is fictious. <br />
        It is unsed for acdemic purposes only. <br />
        <img src = "../img/csumb2-300x190.png" alt = "csumb logo" /> 
    </footer>
</html>
