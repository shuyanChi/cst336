<html>
<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<?php
    $charSet = array("一", "二","三","四","五"); 
    $characters = array("one", "two", "three", "four", "five");
    $charSet_a = array("鸡", "猫", "狗", "兔子", "鸭");
    $characters_a = array("chicken", "cat", "dog", "rabbit", "duck");
   
    function display($charSet) {
        echo "We are learning: ";
        for($i = 0; $i < count($charSet); ++$i) {
            if($i > 0 && $i < count($charSet)) {
                echo " , ";
            }
            echo  $charSet[$i];
        }
    }
    echo "<br />" . "<br />";

    function printChar() {
        global $characters;
        $randValue = rand(0, count($characters) - 1);
        echo " <img id = 'image' src = 'img/".$characters[$randValue].".PNG' alt = 'Chinese words'  /> ";
        $_SESSION["randomChar"] = $characters[$randValue];
    }
    function printPho() {
        global $characters_a;
        $randValue_a = rand(0, count($characters_a) - 1);
        echo " <img id = 'image' src = 'img/".$characters_a[$randValue_a].".jpg' alt = 'Animails'  /> ";
        $_SESSION["randomPho"] = $characters_a[$randValue_a];
    }
   function checkSlected() {
       for($x = 0; $x < count($charSet_a); ++$x) {
          if(isset($_POST["animals"]) && $_POST["animals"] == $charSet_a[$x]){
              echo "selected";
          } 
          else {
              echo "";
          }
       }
   }
   $char = $_POST["char"];
 
 //  . if(isset($_POST['char']) && $_POST['char'] == $characters[$x]) echo "checked"; 
?>
     
</html>