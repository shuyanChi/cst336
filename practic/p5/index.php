<?php
chr(rand(65, 90));
echo "length: " .  $_POST["char"] . "<br />";
global $passwords;
if($_POST["length"] > 8) {
    echo "Too long";
}
else {
    for($x = 0; $x < $_POST["char"]; ++$x) {
       
        $r = chr(rand(65,90));
        $passwords = $passwords . $r;
    }
    
}
  echo "This is your password: " . $passwords;

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    <h1>Custom Password Generaor</h1>
    <form method = "POST">
        How many password? <input type = "text" name = "length">(No more than 8)<br />
        
        <em>password Length</em></br>
            <input type="radio" name="char" value = 6> 6 characters
            <input type="radio" name="char" value = 8> 8 characters
            <input type="radio" name="char" value = 10>10 characters<br />
            <input type = "checkbox" name = "digits" value = "digi">Include digits(up to 3 digits will be part of the password)<br /> <br />
            <input type = "submit" value = "Create Password!"><br /> <br />
            <input type = "submit" value = "Display Password History" >
    </form>
    </body>
</html>


