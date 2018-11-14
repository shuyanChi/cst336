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
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <meta charset = "utf-8">
        <title>
            Learn Chinese
        </title>
        <script>
            function validateForm() {
                var x = document.forms["myForm"]["fname"].value;
                if (x == "") {
                    alert("Name must be filled out");
                    return false;
                }
            }
        </script>
        <script>
            $(document).ready(function(){
                $("p").click(function(){
                    $(this).hide();
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $("input").click(function(){
                    $("#spin").css("background-color", "#0da349");
                });
            });
        </script>
    </head>
    <body>
        <h1>Learn Chinese</h1>
        <main>
           <div style="padding-left: 10px";>
               <h3><?= display($charSet)?></h3>
               <p>If you've learned all of them, please click me. I will go away!</p>
               <?php printChar()?>
                <br /> <br />
                <form name="myForm" onsubmit="return validateForm()"  method = "POST" action = "actionpage.php">
                    <?php
                        for($x = 0; $x < count($characters); ++$x) {
                           echo "<input type = 'radio' name = 'char'. if(isset($char) && $char == $characters[$x]) echo 'checked' . value = $characters[$x]> ". ucfirst($characters[$x]). "<br />";
                        }
                    ?>
                    Student Name: <input type="text" name="fname"><br />
                    <input id = "spin"  type="submit"  value = "Submit">
                </form>
            <br />
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
