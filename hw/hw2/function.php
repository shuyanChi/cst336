<?php Session_start();?>
<html>
<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<?php
    $charSet = array("一", "二","三","四","五"); 
    function displayArray() {
        global $charSet;
        for($i = 0; $i < count($charSet); ++$i) {
            if($i > 0 && $i < count($charSet)) {
                echo " , ";
            }
            echo $charSet[$i];
        }
        echo "<br />";
    }
    $_SESSION['characters'] = array("yi");
    array_push($_SESSION['characters'], "er", "san", "si");
    $_SESSION['characters'][] = "wu";
    shuffle($_SESSION['characters']);
    $randValue = rand(0, count($_SESSION['characters']) - 1);
    $_SESSION['EnglishWords'] = array("one", "two", "three", "four", "five");
    $arrayLength = count($_SESSION['EnglishWords']);
    $_SESSION['result'] = "";
?>
     
</html>