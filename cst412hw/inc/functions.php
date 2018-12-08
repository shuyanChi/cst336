<?php
    $temp = array();
    $dbConn = startConnection('cst412Assets');  //Make sure dbConnection.php file knows about this.
    //$sql = "SELECT * FROM `Assets` WHERE 1 AND Name LIKE '%Epson WorkForce Printer%'";
    //$Name = $_GET['name'];
    //$sql = "SELECT * FROM `Assets` WHERE";

    function filterAssets() {
        global $dbConn;
        global $temp;
        $Name = $_GET['name'];
        $priceFrom = $_GET['price-from'];
        $priceTo = $_GET['price-to'];
        $sql = "SELECT * FROM Assets WHERE 1";
        if(!empty($Name)) {
                $sql .= " AND Name LIKE '%$Name%'";
        }
        if(!empty($priceFrom)) {
                $sql .= " AND Price >= '$priceFrom'";
            }
        if(!empty($priceTo)) {
            $sql .= " AND Price <= '$priceTo'";
        }
        if(isset($_GET['order'])) {
            if($_GET['order'] == "asc") {
                $sql .= " ORDER BY Name ASC";
            }
            else if($_GET['order'] == "desc") {
                $sql .= " ORDER BY Name DESC";
            }
            else if($_GET['order'] == "asc-price") {
                $sql .= " ORDER BY Price ASC";
            }
            else if($_GET['order'] == "desc-price") {
                $sql .= " ORDER BY Price DESC";
            }
        }
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $temp = $records;
        return $temp;
    }
    function validateSession(){
        if (!isset($_SESSION['adminFullName'])) {
            header("Location: index.php");  //redirects users who haven't logged in 
            exit;
        }
    }
    
    function displayAllProducts(){
        global $dbConn;
        $sql = "SELECT * FROM Assets ORDER BY Name";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    
        foreach ($records as $record) {
            echo "<form action='updateAssets.php'>";
            echo "<input type='hidden' name='ID' value='".$record['ID']."'>";
            echo "<button type='submit' class='btn btn-primary'>Update</button>";
            echo "</form>";
            //echo "[<a href='deleteAssets.php?name=".$record['Name']."'>Delete</a>]";
            echo "<form action='deleteAssets.php' onsubmit='return confirmDelete()'>";
            echo "<input type='hidden' name='ID' value='".$record['ID']."'>";
            echo "<button type='submit' class='btn btn-warning'>Delete</button>";
            echo "</form>";
            
            echo "<a onclick='openModal()' target='productModal'
            href='assetsInfo.php?ID=".$record['ID']."'>".$record['Name']."</a>  ";
            echo " $" . $record['Price']   . "<br><br>";
            
        }
    }
    
    
    function getAssetInfo($AName) {
        global $dbConn;
        
        $sql = "SELECT * FROM Assets WHERE ID = $AName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
        return $record;
    }
   
?>
