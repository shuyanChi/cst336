<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("c9");
    function displayCatogories() {
        global $dbConn;
        $sql = "SELECT DISTINCT(category) FROM `p1_quotes` WHERE 1";
        $stmt = $dbConn-> prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting just one record
        //print_r($records);
        //Array ( [0] => Array ( [category] => Reflection ) [1] => Array ( [category] => Philosophy )
        //[2] => Array ( [category] => Motivation ) [3] => Array ( [category] => Humor ) [4] => Array ( [category] => Life ) )
        
         foreach($records as $record) {
            echo "<option value ='". $record['catgory']."'>".$record['category']."</option>";
        }
    }
    function displayKeyword() {
         global $dbConn;
         $namedParameters = array();
         $keyWord = $_GET["keyword"];
         //$sql = SELECT quote FROM `p1_quotes` WHERE quote LIKE '%B%'
         $sql = "SELECT quote FROM `p1_quotes` WHERE 1";
         
         if (!isset($keyWord)){
            return void;
        }
        echo "<h3>Keyword Found: </h3>";
        if (!empty($keyWord)){
            //This SQL prevents SQL INJECTION by using a named parameter
            $sql .=  " AND quote LIKE :keyWord";
            $namedParameters[':keyWord'] = "%$keyWord%";
        }
         
    }
    
      /*if (!isset($product)){
            return void;
        }
        echo "<h3>Product Found: </h3>";
        if (!empty($product)){
            //This SQL prevents SQL INJECTION by using a named parameter
            $sql .=  " AND productName LIKE :product OR productDescription LIKE :product";
            $namedParameters[':product'] = "%$product%";
        }*/
    
    
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1>Famouse Quote Finder</h1>
        <form>
        Enter Quote Keyword
        <input type = "text" name ="keyword"><br />
        Category:
        <select name = "category">
            <option value = "">-Select One-</option>
            <?= displayCatogories(); ?>
        </select> <br />
        Order:<br />
        <input type = "radio" name = "order" value = "a">A-Z</radio><br />
        <radio type = "radio" name = "order" value = "d">Z-A</radio><br />
        <input type = "submit" value = "Display Quotes!">
        </form>

    </body>
</html>