<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();

if (isset($_GET['updateProduct'])){  //user has submitted update form
    $productName = $_GET['productName'];
    $description = $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    $sql = "UPDATE om_product 
            SET productName= :productName,
               productDescription = :productDescription,
               price = :price,
               catId = :catId,
               productImage = :productImage
            WHERE productId = " . $_GET['productId'];
    $np = array(":productName" => $productName, ":productDescription" => $description, ":productImage" => $image, ":price" => $price, ":catId" => $catId);
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "<span>ProductValues are changed!</span>";
}

if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
         <style>
         @import url("css/styles.css");
        </style>
    </head>
    <body>

        <h1> Updating a Product </h1>
        <h2><a href = "admin.php">Back to Admin Page</a></h2>
        <form action>
            <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
           Product name: <input type="text" name="productName" value="<?=$productInfo['productName']?>"><br>
           Description: <textarea name="description" cols="50" rows="4"> <?=$productInfo['productDescription']?> </textarea><br>
           Price: <input type="text" name="price" value="<?=$productInfo['price']?>"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catId']==$productInfo['catId'])?"selected":"";
                  echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage" value="<?=$productInfo['productImage']?>"><br>
           <input class = "button" type="submit" name="updateProduct" value="Update Product">
        </form>
       
    </body>
</html>
