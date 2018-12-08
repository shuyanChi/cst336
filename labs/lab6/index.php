<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("ottermart");
    
    function displayCategories() {
        global $dbConn;
        $sql = "SELECT * FROM om_category ORDER BY catName";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        //$records = $stmt -> fetch(PDO::FETCH_ASSOC); ///fetch() only one records
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        //print_r($records);
        //echo "<hr />";
        //echo $records[2] . "<br />";//when new records are entered it would be broken
        //fetch(PDO::FETCH_ASSOC); Will get constant arr only show assoc
        //echo $records[1]["catDescription"] . "<br />";
        foreach($records as $record) {
            echo "<option value ='". $record['catId']."'>". $record["catName"]."</option>";
        }
        
    
        
    }
    
    function filterProducts() {
        global $dbConn;
        $namedParameters = array();
        $product = $_GET['productName'];
        $sql = "SELECT * FROM om_product
                WHERE 1";
        
        //This SQL works but it doesn't prevent SQL INJECTION (due to the single quotes)
        //$sql = "SELECT productName FROM om_product
        // WHERE productName LIKE '%$product%'";
        
        //This SQL prevents SQL INJECTION by using a named parameter
        if (!isset($product)){
            return void;
        }
        echo "<h3>Product Found: </h3>";
        if (!empty($product)){
            //This SQL prevents SQL INJECTION by using a named parameter
            $sql .=  " AND productName LIKE :product OR productDescription LIKE :product";
            $namedParameters[':product'] = "%$product%";
        }
        if (!empty($_GET['category'])){
            //This SQL prevents SQL INJECTION by using a named parameter
            $sql .=  " AND catId =  :category";
            $namedParameters[':category'] = $_GET['category'] ;
        }
        if (isset($_GET['orderBy'])) {
            if($_GET['orderBy'] == "name") {
               $sql .= " ORDER BY productName";
            }
            else {
               $sql .= " ORDER BY price"; 
            }
        }
        if (!empty($_GET["priceFrom"])) {
        $sql .= " AND price >= :priceFrom";
        $namedParameters[":priceFrom"] = $_GET["priceFrom"];
        }
        if (!empty($_GET["priceTo"])) {
        $sql .= " AND price <= :priceTo";
        $namedParameters[":priceTo"] = $_GET["priceTo"];
        }
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        // print_r($records);
        foreach ($records as $record) {
        echo "<a href='purchaseHistory.php?productId=".$record['productId']."'> History </a>";
        echo $record['productName']." ".$record['productDescription']." $". $record['price']."<br><br>";   
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab6: Ottermart Product Search</title>
        <link href ="css/styles.css" rel = "stylesheet" type = "text/css">
    </head>
    <body>
        <h1>Ottermart Product Search</h1>
        <form>
            Product: <input type = "text" name = "productName" placeholder = "Product keyword" /> <br /><br />
            Category: <select name = "category">
                <option value = "">-Select one-</option>
                 <?= displayCategories()?>
            </select><br /><br />
            Price: From <input type = "text" name = "priceFrom" size = "7" />
                   To   <input type = "text" name = "priceTo" size = "7" />
            <br /><br />
             Order result by:
            <br />
            <input type = "radio" name = "orderBy" value = "price" /> Price <br /><br />
            <input type = "radio" name = "orderBy" value = "name" /> Name <br /><br />
            <input type = "submit" name = "submit" value = "Search!" /> <br /><br />
        </form>
        <?php
            if(isset($_GET["productName"])){
                filterProducts();
            }
            //printHisto();
        ?>
       
<!--https://milara-lara4594.c9users.io/phpMyAdmin/db_export.php?db=ottermart -->
  </body>
  <footer>
        cst336. 2018 &copy; Chi <br />
        <strong>Disclaimer: </strong> The information in this webpage is fictious. <br />
        It is unsed for acdemic purposes only. <br />
        <img src = "../../img/csumb2-300x190.png" alt = "csumb logo" /> 
        <img src = "../../img/buddy_verified.png" alt = "buddy_verified"/>
    </footer>
</html>