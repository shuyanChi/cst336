<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    $sql = "INSERT INTO om_product (productName, productDescription, productImage,price, catId) 
            VALUES (:productName, :productDescription, :productImage, :price, :catId);";
    /*$np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":catId"] = $catId;*/
    $np = array(":productName" => $productName, ":productDescription" => $description, ":productImage" => $image, ":price" => $price, ":catId" => $catId);
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "<span>New Product was added!</span>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
         <style>
         @import url("css/styles.css");
        </style>
    </head>
    <body>
        
        <h1> Adding New Product </h1>
        <h2><a href = "admin.php">Back to Admin Page</a></h2>
        
        <form>
           Product name: <input type="text" name="productName"><br />
           Description: <br /><textarea name="description" cols="50" rows="4"></textarea><br />
           Price: <input type="text" name="price"><br />
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           
           Set Image Url: <input type="text" name="productImage"><br />
           <input class = "button" type="submit" name="addProduct" value="Add Product">
        </form>
    </body>
</html>