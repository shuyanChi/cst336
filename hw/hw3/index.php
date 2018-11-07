<?php
    session_start();
    //session_destroy();
    include("function.php"); 
    global $char;

    if(!isset($_SESSION["randomChar"])){
        $_SESSION["count"] = 0;
        $_SESSION["count_r"] = 0;
    }
    if(!isset($_SESSION["randomPho"])){
        $_SESSION["count_a"] = 0;
        $_SESSION["count_a_r"] = 0;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <meta charset = "utf-8">
        <title>
            Learn Chinese
        </title>
    </head>
    <body>
        <h1>Learn Chinese</h1>
        <div id = "login">
            <a href = "signup.php">sign up</a>
        </div>
        <main>
           <div style="padding-left: 10px";>
               <h3><?php display($charSet); ?></h3> <br />
               <?php printChar()?>
                <br /> <br />
                <form method = "POST" action = "actionpage.php">
                    <?php
                        for($x = 0; $x < count($characters); ++$x) {
                           echo "<input type = 'radio' name = 'char'. if(isset($char) && $char == $characters[$x]) echo 'checked' . value = $characters[$x]> ". ucfirst($characters[$x]). "<br />";
                        }
                    ?>
                    <input id = "spin"  type="submit"  value = "Numbers Submit">
                </form>
            <br />
            </div>
          <div>
             <h3><?php display($charSet_a); ?></h3> <br />
             <?php printPho()?>
             <br /><br />
             <form method = "POST" action = "actionpage_a.php">
                 <select name = "animals">
                     <option value = "">-Select One-</option>
                    <option value = <?=$charSet_a[0]?>  <?=checkSlected()?>><h3><?=$charSet_a[0]?></h3></option>
                    <option value = <?=$charSet_a[1]?>  <?=checkSlected()?>><h3><?=$charSet_a[1]?></h3></option>
                    <option value = <?=$charSet_a[2]?>  <?=checkSlected()?>><h3><?=$charSet_a[2]?></h3></option>
                    <option value = <?=$charSet_a[3]?>  <?=checkSlected()?>><h3><?=$charSet_a[3]?></h3></option>
                    <option value = <?=$charSet_a[4]?>  <?=checkSlected()?>><h3><?=$charSet_a[4]?></h3></option>
                 </select>
                 <br />
                 <input id = "spin2" type = "submit" value = "Animals Submit">
               
             </form> 
          </div>
      
        </main>
        <footer>
            cst336. 2018 &copy; Chi <br />
            <strong>Disclaimer: </strong> The information in this webpage is fictious. <br />
            It is unsed for acdemic purposes only. <br />
            <img src = "../../img/csumb2-300x190.png" alt = "csumb logo" /> 
            <img src = "../../img/buddy_verified.png" alt = "buddy_verified"/>
        </footer>

    </body>
</html>
