<?php
    // define variables and set to empty values
    $firstName = $lastName = $pwd = "";
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["firstName"])) {
            $fnameErr = "first name is required";
        } else {
           $firstName = test_input($_POST["firstName"]);
        }
        
        if (empty($_POST["lastName"])) {
            $lnameErr = "last name is required";
        } else {
            $lastName = test_input($_POST["lastName"]);
        }
        if(empty($_POST["pwd"])) {
            $pwdErr ="password is required";
        } else {
            $pwd = test_input($_POST["pwd"]);
        }
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Learn Chinese</title>
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
      <h2><a href = "index.php">Back Home Page</a><h2>
      <div id = loginpage>
            Please sign up first: 
            <form method = "POST">
                First name: <br />
                <input type = "text" name = "firstName" value = "<?php echo $firstName;?>">
                <span class="error">* <?php echo $fnameErr;?></span> 
                <br />Last name: <br />
                <input type = "text" name = "lastName" value = "<?php echo $lastName?>">
                <span class="error">* <?php echo $lnameErr;?></span> 
                <br />Pass word: <br />
                <input type = "password" name = "pwd" value ="<?php echo $pwd?>">
                <span class="error">* <?php echo $pwdErr;?></span> 
                <br /><input type = "submit" value = "Sign up">
            </form>
         
            
        </div>
        <?php
            echo "First name: " ."<br />".  $_POST["firstName"] . "<br />";
            echo "Last name: " . "<br />". $_POST["lastName"] . "<br />";
            echo "Password is: " . "<br />". $_POST["pwd"] . "<br />";
        ?>
    </body>
</html>